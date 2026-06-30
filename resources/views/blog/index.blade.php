@extends('layouts.blog')

@section('content')
<header class="bhero">
  <div class="bwrap">
    @include('blog.partials.breadcrumbs', ['items' => $seo['breadcrumbs'] ?? []])
    <h1>{{ $tituloPagina ?? 'Blog GovSocial' }}</h1>
    @if(!empty($subtitulo))<p class="bhero__sub">{{ $subtitulo }}</p>@endif

    <form method="GET" action="{{ route('blog.index') }}" class="bsearch">
      <input type="search" name="q" value="{{ $busca }}" placeholder="Buscar artigos (LGPD, anúncios, crise...)">
      <button type="submit">Buscar</button>
    </form>
  </div>
</header>

<div class="bwrap blayout">
  <main class="blist">
    @if($busca)
      <p class="blist__info">Resultados para <strong>“{{ $busca }}”</strong> — {{ $posts->total() }} artigo(s).</p>
    @endif

    @forelse($posts as $post)
      @include('blog.partials.card', ['post' => $post])
    @empty
      <div class="bempty">
        <h3>Nenhum artigo por aqui ainda.</h3>
        <p>Em breve publicaremos conteúdos sobre LGPD, publicidade institucional e operação de redes públicas.</p>
      </div>
    @endforelse

    <div class="bpag">{{ $posts->links() }}</div>
  </main>

  <aside class="bside">
    <div class="bside__box">
      <h3>Categorias</h3>
      <ul class="bside__cats">
        @foreach($categories as $cat)
          <li><a href="{{ route('blog.category', $cat) }}">{{ $cat->name }} <span>{{ $cat->posts_count }}</span></a></li>
        @endforeach
      </ul>
    </div>

    @if($populares->count())
    <div class="bside__box">
      <h3>Mais lidos</h3>
      <ul class="bside__pop">
        @foreach($populares as $p)
          <li><a href="{{ route('blog.show', $p) }}">{{ $p->title }}</a></li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="bside__cta">
      <span class="bside__kicker">Seminário presencial</span>
      <strong>Gestão de Mídias Sociais no Setor Público</strong>
      <p>Operação, Publicidade e LGPD — 18 a 21 de agosto, Curitiba.</p>
      <a href="{{ route('govsocial') }}" class="bbtn bbtn--cyan">Quero participar <span>→</span></a>
    </div>
  </aside>
</div>
@endsection
