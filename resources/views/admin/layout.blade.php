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
    .top{position:sticky;top:0;z-index:10;background:rgba(7,8,16,.85);backdrop-filter:blur(10px);border-bottom:1px solid var(--border)}
    .top__in{display:flex;align-items:center;justify-content:space-between;height:60px;gap:18px}
    .brand{display:flex;align-items:center;gap:10px;font-family:var(--disp);font-weight:700;letter-spacing:.04em}
    .brand .dot{width:9px;height:9px;border-radius:50%;background:var(--cy);box-shadow:0 0 12px var(--cy)}
    .brand small{color:var(--cy);font-size:12px;text-transform:uppercase;letter-spacing:.14em}
    .nav{display:flex;gap:6px;flex:1}
    .nav a{font-family:var(--disp);font-weight:600;font-size:13.5px;padding:7px 13px;border-radius:999px;color:var(--muted)}
    .nav a:hover{color:#fff;background:var(--surface)}
    .nav a.is-active{color:#06223f;background:var(--cy)}
    .top form{margin:0}
    .btn{display:inline-flex;align-items:center;gap:8px;font-family:var(--disp);font-weight:600;font-size:14px;
      padding:9px 16px;border-radius:999px;border:1px solid var(--border);background:var(--surface);color:var(--txt);cursor:pointer;transition:.15s}
    .btn:hover{border-color:var(--cy);color:#fff}
    .btn--cy{background:var(--cy);color:#06223f;border-color:var(--cy)}
    .btn--sm{padding:6px 12px;font-size:13px}
    .btn--danger{border-color:rgba(239,68,68,.4);color:#fca5a5}
    .btn--danger:hover{border-color:#ef4444;color:#fff}
    main{padding:34px 0 70px}
    .flash{background:rgba(34,197,94,.12);border:1px solid rgba(34,197,94,.4);color:#86efac;padding:12px 16px;border-radius:var(--r);margin-bottom:20px;font-size:14px}
    .errbox{background:rgba(239,68,68,.1);border:1px solid rgba(239,68,68,.4);color:#fca5a5;padding:12px 16px;border-radius:var(--r);margin-bottom:20px;font-size:14px}
    .card{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:22px}
    .phead{display:flex;align-items:center;justify-content:space-between;gap:14px;margin-bottom:22px;flex-wrap:wrap}
    .phead h1{font-size:24px}
    table{width:100%;border-collapse:collapse;font-size:14px}
    th,td{text-align:left;padding:11px 12px;border-bottom:1px solid rgba(255,255,255,.07)}
    th{font-family:var(--disp);color:var(--muted);font-size:12px;text-transform:uppercase;letter-spacing:.08em}
    .pill{font-size:11.5px;padding:3px 10px;border-radius:999px;font-weight:600}
    .pill--pub{background:rgba(34,197,94,.15);color:#86efac}
    .pill--draft{background:rgba(148,163,184,.15);color:#cbd5e1}
    .field{margin-bottom:16px}
    .field label{display:block;font-family:var(--disp);font-size:13px;color:var(--muted);margin-bottom:6px}
    .field input[type=text],.field input[type=email],.field input[type=number],.field input[type=datetime-local],
    .field select,.field textarea{width:100%;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.14);
      border-radius:10px;padding:11px 13px;color:#fff;font-size:15px;font-family:var(--body)}
    .field textarea{resize:vertical;min-height:120px}
    .field .hint{font-size:12px;color:var(--muted);margin-top:5px}
    .field .err{color:#fca5a5;font-size:12.5px;margin-top:5px;display:block}
    .grid2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
    @media(max-width:680px){.grid2{grid-template-columns:1fr}}
    .toolbar{display:flex;flex-wrap:wrap;gap:6px;margin-bottom:8px}
    .toolbar button{font-family:var(--disp);font-size:12.5px;font-weight:600;padding:5px 10px;border-radius:8px;
      border:1px solid var(--border);background:var(--surface);color:var(--txt);cursor:pointer}
    .toolbar button:hover{border-color:var(--cy);color:#fff}
    .preview{margin-top:10px;background:#0b1222;border:1px solid var(--border);border-radius:12px;padding:18px;display:none}
    .preview.is-on{display:block}
    .preview h2{font-size:20px;margin:18px 0 8px;color:#fff}
    .preview h3{font-size:17px;margin:14px 0 6px;color:#eaf2fb}
    .preview p{margin:0 0 12px}
    .preview ul,.preview ol{padding-left:20px;margin:0 0 12px}
    .muted{color:var(--muted)}
    .row-actions{display:flex;gap:8px;align-items:center}
    .pag{margin-top:18px}
    .pag nav{display:flex;gap:6px}
    .pag svg{width:16px;height:16px}
  </style>
  @stack('head')
</head>
<body>
  <header class="top">
    <div class="wrap top__in">
      <a href="{{ route('admin.home') }}" class="brand"><span class="dot"></span> Unyflex <small>· Painel</small></a>
      <nav class="nav">
        <a href="{{ route('admin.leads.index') }}" class="{{ request()->routeIs('admin.leads.*') ? 'is-active' : '' }}">Leads</a>
        <a href="{{ route('admin.blog.posts.index') }}" class="{{ request()->routeIs('admin.blog.posts.*') ? 'is-active' : '' }}">Posts</a>
        <a href="{{ route('admin.blog.categories.index') }}" class="{{ request()->routeIs('admin.blog.categories.*') ? 'is-active' : '' }}">Categorias</a>
        <a href="{{ route('admin.blog.tags.index') }}" class="{{ request()->routeIs('admin.blog.tags.*') ? 'is-active' : '' }}">Tags</a>
      </nav>
      <form method="POST" action="{{ route('admin.logout') }}">@csrf
        <button class="btn btn--sm" type="submit">Sair</button>
      </form>
    </div>
  </header>
  <main class="wrap">
    @if (session('ok'))<div class="flash">{{ session('ok') }}</div>@endif
    @if ($errors->any())
      <div class="errbox">
        <strong>Confira os campos:</strong>
        <ul style="margin:6px 0 0 18px">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif
    @yield('content')
  </main>
</body>
</html>
