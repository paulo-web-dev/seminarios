<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @include('blog.partials.seo', ['seo' => $seo ?? []])

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --azul:#0D3B7A; --azul-900:#061f43; --ciano:#00C2FF; --ciano-600:#00a3d6;
      --laranja:#FF6B35; --dark:#0A0A14; --text:#1C1C2E; --muted:#6B7280; --white:#fff;
    }
  </style>

  <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
  @stack('head')
</head>
<body class="blog">

  <nav class="bnav">
    <div class="bwrap bnav__inner">
      <a href="{{ route('blog.index') }}" class="bnav__brand">
        <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
        <span class="bnav__tag">Blog GovSocial</span>
      </a>
      <div class="bnav__links">
        <a href="{{ route('blog.index') }}">Artigos</a>
        <a href="{{ route('govsocial') }}" class="bnav__cta">Conheça o seminário <span>→</span></a>
      </div>
    </div>
  </nav>

  @yield('content')

  <footer class="bfooter">
    <div class="bwrap bfooter__inner">
      <div>
        <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex" class="bfooter__logo">
        <p>Conteúdo para quem comunica o setor público com segurança jurídica e resultado.
           Realização: Unyflex Digital · Faculdade Unypública.</p>
      </div>
      <div class="bfooter__cta">
        <span>Quer dominar isso na prática?</span>
        <a href="{{ route('govsocial') }}" class="bbtn bbtn--cyan">Seminário GovSocial <span>→</span></a>
      </div>
    </div>
    <div class="bwrap bfooter__legal">
      Os conteúdos têm caráter informativo e não substituem orientação jurídica formal.
      © {{ date('Y') }} Unyflex Digital. Todos os direitos reservados.
    </div>
  </footer>

</body>
</html>
