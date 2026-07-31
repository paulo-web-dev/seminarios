<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Seminário Finanças Municipais · Tesouraria e Contabilidade · Unyflex')</title>
  <meta name="description" content="@yield('description', 'Imersão presencial de quatro dias em finanças municipais: tesouraria, contabilidade, arrecadação, conciliação bancária e Reforma Tributária — com IA e conciliação em tempo real, no Centro de Curitiba.')">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  {{-- Paleta dourada do Seminário Finanças Municipais (consumida pelo financas.css). --}}
  <style>
    :root {
      --azul:         {{ $paleta['primary']      ?? '#7A5518' }};
      --azul-900:     {{ $paleta['primary900']   ?? '#1A1207' }};
      --ciano:        {{ $paleta['secondary']    ?? '#F2A016' }};
      --ciano-600:    {{ $paleta['secondary600'] ?? '#DF7C0B' }};
      --laranja:      {{ $paleta['accent']       ?? '#E1913A' }};
      --dark:         {{ $paleta['dark']         ?? '#141109' }};
      --light:        {{ $paleta['light']        ?? '#F6EEE1' }};
      --text:         {{ $paleta['text']         ?? '#241B0E' }};
      --muted:        {{ $paleta['muted']        ?? '#8A7B62' }};
      --white: #FFFFFF;
    }
  </style>

  <link rel="stylesheet" href="{{ asset('css/financas.css') }}">
  @stack('head')
</head>
<body>
  @yield('body')
  @stack('scripts')
</body>
</html>
