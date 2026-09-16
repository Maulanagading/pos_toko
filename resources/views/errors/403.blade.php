<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak | POS Barokah Mart</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #f0f4f8 0%, #e2e8f0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }
        .error-card {
            background: #ffffff;
            padding: 48px 36px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            text-align: center;
            max-width: 440px;
            width: 100%;
            transition: transform 0.2s ease;
        }
        .error-card:hover {
            transform: translateY(-2px);
        }
        .icon-circle {
            width: 80px;
            height: 80px;
            background: #fef2f2;
            color: #ef4444;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px auto;
        }
        .icon-circle svg {
            width: 40px;
            height: 40px;
        }
        .badge {
            display: inline-block;
            background: #fee2e2;
            color: #dc2626;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            padding: 5px 14px;
            border-radius: 9999px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }
        h1 {
            color: #1e293b;
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 10px;
        }
        p {
            color: #64748b;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 28px;
        }
        .btn-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: #4f46e5;
            color: #ffffff;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.25);
            transition: all 0.2s ease;
        }
        .btn-home:hover {
            background: #4338ca;
            box-shadow: 0 6px 16px rgba(79, 70, 229, 0.35);
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="icon-circle">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
        </div>
        <span class="badge">Error 403 • Akses Ditolak</span>
        <h1>Akses Terbatas</h1>
        <p>{{ $message ?? 'Maaf, Anda tidak memiliki izin atau hak akses untuk membuka halaman ini.' }}</p>
        <a href="/dashboard" class="btn-home">
            <svg style="width: 18px; height: 18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>
</body>
</html>
