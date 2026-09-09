<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthAndRoleTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('POS Barokah Mart');
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@barokahmart.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@barokahmart.test',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@barokahmart.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $response = $this->from('/login')->post('/login', [
            'email' => 'admin@barokahmart.test',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
    }

    public function test_authenticated_users_are_redirected_away_from_login_screen(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect(route('dashboard'));
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/login');
    }

    public function test_admin_can_access_admin_routes(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($admin)->get('/categories')->assertStatus(200);
        $this->actingAs($admin)->get('/products')->assertStatus(200);
        $this->actingAs($admin)->get('/reports/sales')->assertStatus(200);
        $this->actingAs($admin)->get('/users')->assertStatus(200);
        $this->actingAs($admin)->get('/pos')->assertStatus(200);
    }

    public function test_cashier_can_access_pos_route(): void
    {
        $kasir = User::factory()->create([
            'role' => 'kasir',
        ]);

        $this->actingAs($kasir)->get('/pos')->assertStatus(200);
    }

    public function test_cashier_cannot_access_admin_routes_and_receives_403_forbidden(): void
    {
        $kasir = User::factory()->create([
            'role' => 'kasir',
        ]);

        $response = $this->actingAs($kasir)->get('/categories');
        $response->assertStatus(403);
        $response->assertSee('Akses Ditolak');

        $this->actingAs($kasir)->get('/products')->assertStatus(403);
        $this->actingAs($kasir)->get('/reports/sales')->assertStatus(403);
        $this->actingAs($kasir)->get('/users')->assertStatus(403);
    }
}
