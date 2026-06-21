<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', $seminario->meta_title ?? $seminario->titulo)</title>
  <meta name="description" content="@yield('description', $seminario->meta_description ?? $seminario->descricao)">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Paleta vinda do banco (cada seminário pode ter a sua) --}}
  <style>
    :root {
      --azul: {{ $paleta['primary'] }};
      --azul-900: {{ $paleta['primary900'] }};
      --ciano: {{ $paleta['secondary'] }};
      --ciano-600: {{ $paleta['secondary600'] }};
      --laranja: {{ $paleta['accent'] }};
      --dark: {{ $paleta['dark'] }};
      --light: {{ $paleta['light'] }};
      --text: {{ $paleta['text'] }};
      --muted: {{ $paleta['muted'] }};
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
