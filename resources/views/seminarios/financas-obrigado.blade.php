@extends('layouts.financas')

@section('title', 'Inscrição recebida · Seminário Finanças Municipais')
@section('description', 'Recebemos sua inscrição no Seminário Finanças Municipais. Nossa equipe entra em contato em breve.')

@push('head')
  {{-- ============ META PIXEL (base: init + PageView) ============
       Base próprio desta página, para o evento Lead abaixo funcionar mesmo
       que o layout não carregue o Pixel. Mantenha o base em UM lugar só por
       página — aqui já basta. --}}
  <!-- Meta Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1168799437651546');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1168799437651546&ev=PageView&noscript=1"/></noscript>
  <!-- End Meta Pixel Code -->
@endpush

@section('body')
  <main class="thanks">
    <div class="thanks__grid"></div>
    <div class="thanks__inner">
      <div class="thanks__check">@includeIf('seminarios.icons.check', ['size' => 34])</div>
      <h1>{{ $nome ? 'Obrigado, '.\Illuminate\Support\Str::of($nome)->trim()->explode(' ')->first().'!' : 'Inscrição recebida!' }}</h1>
      <p>Recebemos seus dados para o <strong>Seminário Finanças Municipais</strong> (20 a 23 de outubro de 2026, Centro de Curitiba). Nossa equipe entra em contato pelo WhatsApp para garantir sua vaga.</p>
      <a href="{{ route('financas') }}" class="btn btn--cyan">Voltar para a página do seminário <span class="arrow">→</span></a>
    </div>
  </main>
@endsection

@push('scripts')
  {{-- ============ META PIXEL · EVENTO LEAD ============
       Conversão da inscrição — dispara SÓ nesta página de obrigado.
       O redirect de sucesso cai aqui sem PII na URL, então é seguro. --}}
  <script>fbq('track', 'Lead');</script>
@endpush