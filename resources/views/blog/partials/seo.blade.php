@php
  $title = $seo['title'] ?? 'Blog GovSocial — Unyflex';
  $desc  = $seo['description'] ?? 'Comunicação pública, LGPD e mídias sociais para o setor público.';
  $canonical = $seo['canonical'] ?? url()->current();
  $ogType = $seo['og_type'] ?? 'website';
  $image  = $seo['image'] ?? asset('img/logo-unyflex-white.png');
@endphp
<title>{{ $title }}</title>
<meta name="description" content="{{ $desc }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index, follow, max-image-preview:large">

{{-- Open Graph --}}
<meta property="og:site_name" content="Unyflex · Blog GovSocial">
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="{{ $ogType }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $desc }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $image }}">
@isset($seo['published_time'])<meta property="article:published_time" content="{{ $seo['published_time'] }}">@endisset
@isset($seo['modified_time'])<meta property="article:modified_time" content="{{ $seo['modified_time'] }}">@endisset

{{-- Twitter Cards --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $desc }}">
<meta name="twitter:image" content="{{ $image }}">

{{-- JSON-LD --}}
@isset($seo['jsonld'])
  @foreach($seo['jsonld'] as $ld)
<script type="application/ld+json">{!! json_encode($ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
  @endforeach
@endisset
