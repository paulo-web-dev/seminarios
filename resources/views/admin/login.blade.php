<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Entrar · Painel Seminários</title>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    :root{--cy:#00C2FF;--border:rgba(0,194,255,.2);--surface:rgba(255,255,255,.04)}
    *{box-sizing:border-box}
    body{margin:0;min-height:100vh;display:flex;align-items:center;justify-content:center;padding:24px;
      font-family:'Inter',sans-serif;color:#c8d4e8;
      background:radial-gradient(1200px 600px at 50% -10%,#0a2f63 0%,#05060d 60%,#0A0A14 100%)}
    .box{width:100%;max-width:380px;background:var(--surface);border:1px solid var(--border);border-radius:18px;padding:34px 30px;
      box-shadow:0 20px 60px rgba(0,0,0,.5)}
    .brand{display:flex;align-items:center;gap:10px;font-family:'Space Grotesk',sans-serif;font-weight:700;letter-spacing:.04em;color:#fff;margin-bottom:6px}
    .brand .dot{width:9px;height:9px;border-radius:50%;background:var(--cy);box-shadow:0 0 12px var(--cy)}
    h1{font-family:'Space Grotesk',sans-serif;font-size:22px;color:#fff;margin:14px 0 4px}
    p.sub{color:#8194b0;font-size:14px;margin:0 0 24px}
    label{font-family:'Space Grotesk',sans-serif;font-size:13px;display:block;margin-bottom:6px}
    input{width:100%;padding:12px 14px;border-radius:10px;border:1px solid rgba(255,255,255,.14);
      background:rgba(0,0,0,.3);color:#fff;font-size:15px;margin-bottom:16px}
    input:focus{outline:none;border-color:var(--cy);box-shadow:0 0 0 3px rgba(0,194,255,.18)}
    .row{display:flex;align-items:center;gap:8px;margin-bottom:20px;font-size:14px}
    .row input{width:auto;margin:0}
    button{width:100%;padding:13px;border:0;border-radius:999px;background:var(--cy);color:#06223f;
      font-family:'Space Grotesk',sans-serif;font-weight:600;font-size:15px;cursor:pointer}
    button:hover{filter:brightness(1.07)}
    .err{background:rgba(255,107,53,.12);border:1px solid rgba(255,107,53,.4);color:#ffb59b;
      padding:10px 13px;border-radius:10px;font-size:13.5px;margin-bottom:18px}
  </style>
</head>
<body>
  <div class="box">
    <div class="brand"><span class="dot"></span> UNYFLEX</div>
    <h1>Painel de leads</h1>
    <p class="sub">Acesse para acompanhar as inscrições.</p>

    @if ($errors->any())
      <div class="err">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
      @csrf
      <label for="email">E-mail</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

      <label for="password">Senha</label>
      <input type="password" id="password" name="password" required>

      <div class="row">
        <input type="checkbox" id="remember" name="remember" value="1">
        <label for="remember" style="margin:0">Manter conectado</label>
      </div>

      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
