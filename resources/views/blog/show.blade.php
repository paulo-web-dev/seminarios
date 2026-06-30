@extends('layouts.blog')

@section('content')
<article class="bpost">
  <header class="bpost__head">
    <div class="bwrap bpost__head-in">
      @include('blog.partials.breadcrumbs', ['items' => $seo['breadcrumbs'] ?? []])
      @if($post->category)
        <a href="{{ route('blog.category', $post->category) }}" class="bpost__cat">{{ $post->category->name }}</a>
      @endif
      <h1>{{ $post->title }}</h1>
      <div class="bpost__meta">
        <span>{{ $post->author ?: 'Equipe Unyflex' }}</span>
        <span>·</span>
        <span>{{ optional($post->published_at)->translatedFormat('d \d\e F \d\e Y') }}</span>
        <span>·</span>
        <span>{{ $post->reading_time }} min de leitura</span>
      </div>
    </div>
  </header>

  @if($post->featuredImageUrl())
    <div class="bwrap"><img class="bpost__cover" src="{{ $post->featuredImageUrl() }}" alt="{{ $post->title }}" loading="lazy"></div>
  @endif

  <div class="bwrap bpost__layout">
    <div class="bpost__content">
      {!! $post->content !!}

      @if($post->tags->count())
        <div class="bpost__tags">
          @foreach($post->tags as $tag)
            <a href="{{ route('blog.tag', $tag) }}">#{{ $tag->name }}</a>
          @endforeach
        </div>
      @endif

      {{-- CTA do seminário --}}
      <div class="bpost__seminar">
        <span class="bside__kicker">Leve isso para a prática</span>
        <h3>Seminário · Gestão de Mídias Sociais no Setor Público</h3>
        <p>Quatro dias de imersão presencial sobre operação de redes, publicidade institucional e LGPD — em Curitiba, de 18 a 21 de agosto de 2026.</p>
        <a href="{{ route('govsocial') }}" class="bbtn bbtn--cyan">Garantir minha vaga <span>→</span></a>
      </div>
    </div>
  </div>

  @if($relacionados->count())
  <section class="brelated">
    <div class="bwrap">
      <h2>Continue lendo</h2>
      <div class="brelated__grid">
        @foreach($relacionados as $post)
          @include('blog.partials.card', ['post' => $post])
        @endforeach
      </div>
    </div>
  </section>
  @endif
</article>
@endsection
