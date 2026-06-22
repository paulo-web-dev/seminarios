<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Painel') · Seminários Unyflex</title>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root{
      --bg:#0A0A14; --bg2:#0d1424; --surface:rgba(255,255,255,.04); --border:rgba(0,194,255,.18);
      --cy:#00C2FF; --txt:#c8d4e8; --muted:#8194b0; --head:#fff; --orange:#FF6B35;
      --ok:#22c55e; --r:12px; --disp:'Space Grotesk',sans-serif; --body:'Inter',sans-serif;
    }
    *{box-sizing:border-box}
    body{margin:0;font-family:var(--body);background:var(--bg);color:var(--txt);line-height:1.55}
    a{color:inherit;text-decoration:none}
    h1,h2,h3{font-family:var(--disp);color:var(--head);margin:0}
    .wrap{max-width:1120px;margin:0 auto;padding:0 20px}
    /* topbar */
    .top{position:sticky;top:0;z-index:10;background:rgba(7,8,16,.85);backdrop-filter:blur(10px);border-bottom:1px solid var(--border)}
    .top__in{display:flex;align-items:center;justify-content:space-between;height:60px}
    .brand{display:flex;align-items:center;gap:10px;font-family:var(--disp);font-weight:700;letter-spacing:.04em}
    .brand .dot{width:9px;height:9px;border-radius:50%;background:var(--cy);box-shadow:0 0 12px var(--cy)}
    .brand small{color:var(--cy);font-size:12px;text-transform:uppercase;letter-spacing:.14em}
    .top form{margin:0}
    .btn{display:inline-flex;align-items:center;gap:8px;font-family:var(--disp);font-weight:600;font-size:14px;
      padding:9px 16px;border-radius:999px;border:1px solid var(--border);background:var(--surface);color:var(--txt);cursor:pointer;transition:.15s}
    .btn:hover{border-color:var(--cy);color:#fff}
    .btn--cy{background:var(--cy);color:#06223f;border-color:var(--cy)}
    .btn--sm{padding:6px 12px;font-size:13px}
    main{padding:34px 0 70px}
    .flash{background:rgba(34,197,94,.12);border:1px solid rgba(34,197,94,.4);color:#86efac;padding:12px 16px;border-radius:var(--r);margin-bottom:20px;font-size:14px}
    .card{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:22px}
  </style>
  @stack('head')
</head>
<body>
  <header class="top">
    <div class="wrap top__in">
      <a href="{{ route('admin.leads.index') }}" class="brand"><span class="dot"></span> Unyflex <small>· Painel</small></a>
      <form method="POST" action="{{ route('admin.logout') }}">@csrf
        <button class="btn btn--sm" type="submit">Sair</button>
      </form>
    </div>
  </header>
  <main class="wrap">
    @if (session('ok'))<div class="flash">{{ session('ok') }}</div>@endif
    @yield('content')
  </main>
</body>
</html>
