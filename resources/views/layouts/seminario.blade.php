<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', $seminario->meta_title ?? $seminario->titulo ?? 'Gestão de Mídias Sociais no Setor Público · Unyflex')</title>
  <meta name="description" content="@yield('description', $seminario->meta_description ?? $seminario->descricao ?? 'Imersão presencial de quatro dias em operação de redes sociais, publicidade institucional e LGPD para equipes de comunicação do setor público.')">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1168799437651546');
    fbq('track', 'PageView');
    </script>
  {{-- Paleta: usa a do banco quando o seminário é carregado; senão, o padrão GovSocial.
       O govsocial.css consome estas variáveis (--ciano, --laranja, --azul, --dark...). --}}
  <style>
    :root {
      --azul: {{ $paleta['primary'] ?? '#0D3B7A' }};
      --azul-900: {{ $paleta['primary900'] ?? '#061f43' }};
      --ciano: {{ $paleta['secondary'] ?? '#00C2FF' }};
      --ciano-600: {{ $paleta['secondary600'] ?? '#00a3d6' }};
      --laranja: {{ $paleta['accent'] ?? '#FF6B35' }};
      --dark: {{ $paleta['dark'] ?? '#0A0A14' }};
      --light: {{ $paleta['light'] ?? '#F4F6FA' }};
      --text: {{ $paleta['text'] ?? '#1C1C2E' }};
      --muted: {{ $paleta['muted'] ?? '#6B7280' }};
      --white: #FFFFFF;
    }
  </style>

  <link rel="stylesheet" href="{{ asset('css/govsocial.css') }}">
  @stack('head')
</head>
<body>
  @yield('body')
  @stack('scripts')
</body>
</html>
