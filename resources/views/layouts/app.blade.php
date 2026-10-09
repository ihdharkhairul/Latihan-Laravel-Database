<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | LaporBanjir</title>

    <style>
        :root {
            --bg: #f5f8fa;
            --surface: #ffffff;
            --line: #e3e9ee;
            --text: #27343f;
            --muted: #6c7c8a;
            --accent: #5b94b5;
            --accent-hover: #4a809f;
            --accent-soft: #eaf3f8;
            --radius: 10px;

            /* Ganti link gambar latar di sini */
            --bg-image: url('https://i.pinimg.com/1200x/0c/fe/0d/0cfe0dd30f6b52732ed272f9587442db.jpg');
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif;
            font-size: 15px;
            line-height: 1.55;
            color: var(--text);
            background:
                linear-gradient(rgba(245, 248, 250, 0.21), rgba(245, 248, 250, .92)),
                var(--bg-image) center / cover no-repeat fixed,
                var(--bg);
        }

        /* ---------- Header ---------- */
        header {
            background: rgba(255, 255, 255, .92);
            border-bottom: 1px solid var(--line);
        }
        .header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            max-width: 960px;
            margin: 0 auto;
            padding: 14px 24px;
        }
        .brand { font-size: 17px; font-weight: 600; letter-spacing: -.01em; }
        .brand small {
            display: block;
            font-size: 12px;
            font-weight: 400;
            color: var(--muted);
            letter-spacing: 0;
        }

        nav { display: flex; gap: 4px; }
        nav a {
            color: var(--muted);
            text-decoration: none;
            font-size: 14px;
            padding: 7px 14px;
            border-radius: 8px;
            transition: background .15s, color .15s;
        }
        nav a:hover { background: var(--bg); color: var(--text); }
        nav a.active { background: var(--accent-soft); color: var(--accent-hover); font-weight: 500; }

        /* ---------- Konten ---------- */
        main {
            flex: 1;
            width: 100%;
            max-width: 960px;
            margin: 0 auto;
            padding: 44px 24px 56px;
        }

        .panel {
            max-width: 480px;
            margin: 0 auto;
            padding: 32px;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius);
        }
        .panel-wide { max-width: 720px; }

        h1, h2 { font-weight: 600; letter-spacing: -.015em; line-height: 1.25; }
        h1 { font-size: 24px; margin-bottom: 6px; }
        h2 { font-size: 24px; }
        .subtitle { color: var(--muted); margin-bottom: 26px; }

        /* ---------- Form ---------- */
        .field { margin-bottom: 18px; }
        .field label { display: block; font-size: 13.5px; font-weight: 500; margin-bottom: 6px; }
        .field input {
            width: 100%;
            padding: 10px 12px;
            font-family: inherit;
            font-size: 15px;
            color: var(--text);
            background: var(--surface);
            border: 1px solid #d5dde4;
            border-radius: 8px;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .field input::placeholder { color: #a7b4bf; }
        .field input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(91, 148, 181, .18);
        }
        .error-text { display: block; margin-top: 5px; font-size: 13px; color: #b94a48; }

        .btn {
            display: inline-block;
            margin-top: 6px;
            padding: 10px 22px;
            font-family: inherit;
            font-size: 14.5px;
            font-weight: 500;
            color: #fff;
            background: var(--accent);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background .15s;
        }
        .btn:hover { background: var(--accent-hover); }
        .btn-block { width: 100%; }
        .link-back { color: var(--accent-hover); font-size: 14.5px; text-decoration: none; }
        .link-back:hover { text-decoration: underline; }

        /* ---------- Konfirmasi ---------- */
        .detail {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 0;
            border-bottom: 1px solid var(--line);
        }
        .detail:last-of-type { border-bottom: none; }
        .detail span { color: var(--muted); font-size: 14px; }
        .detail strong { font-weight: 500; text-align: right; }

        /* ---------- Alert ---------- */
        .alert { padding: 11px 14px; margin: 18px 0 8px; font-size: 14px; border-radius: 8px; }
        .alert-success { background: #eef7f1; color: #2f6b4a; }
        .alert-error   { background: #fbeeee; color: #9b3d3d; }

        /* ---------- Daftar & Kartu ---------- */
        .page-head { margin-bottom: 26px; text-align: center; }
        .page-head .subtitle { margin: 6px 0 0; }
        .grid { display: flex; flex-wrap: wrap; justify-content: center; gap: 16px; }

        .laporan-card {
            padding: 20px;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            width: 290px;
        }
        .card-top { display: flex; justify-content: space-between; align-items: flex-start; gap: 10px; margin-bottom: 12px; }
        .card-top h3 { font-size: 16px; font-weight: 600; line-height: 1.35; }
        .meta { display: flex; justify-content: space-between; gap: 12px; font-size: 14px; color: var(--muted); padding: 3px 0; }
        .meta b { color: var(--text); font-weight: 500; text-align: right; }

        .badge { padding: 2px 10px; font-size: 12px; font-weight: 500; border-radius: 999px; white-space: nowrap; }
        .badge-waspada { color: #7d6511; background: #fbf3d3; }
        .badge-siaga   { color: #9a5316; background: #fde9d4; }
        .badge-awas    { color: #a13c3c; background: #fbe0e0; }

        .empty { width: 100%; padding: 40px 0; text-align: center; color: var(--muted); }

        /* ---------- Tabel ---------- */
        .table-wrap {
            overflow-x: auto;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius);
        }
        table { width: 100%; border-collapse: collapse; font-size: 14.5px; }
        th, td { padding: 12px 18px; text-align: left; }
        th {
            font-size: 12.5px;
            font-weight: 500;
            color: var(--muted);
            background: #fafcfd;
            border-bottom: 1px solid var(--line);
        }
        td { border-bottom: 1px solid var(--line); }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #fafcfd; }

        /* ---------- Footer ---------- */
        footer { padding: 20px; text-align: center; font-size: 13px; color: var(--muted); }

        @media (max-width: 600px) {
            .header-inner { padding: 12px 16px; }
            main { padding: 28px 16px 40px; }
            .panel { padding: 24px 20px; }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-inner">
            <div class="brand">
                LaporBanjir
                <small>BPBD Kabupaten Bandung</small>
            </div>
            <nav>
                <a href="{{ route('banjir.form') }}" class="{{ request()->routeIs('banjir.form') ? 'active' : '' }}">Form Laporan</a>
                <a href="{{ route('banjir.daftar') }}" class="{{ request()->routeIs('banjir.daftar') ? 'active' : '' }}">Daftar Laporan</a>
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; 2026 LaporBanjir &middot; BPBD Kabupaten Bandung
    </footer>

</body>
</html>