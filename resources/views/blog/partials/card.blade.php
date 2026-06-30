<article class="pcard">
  <a href="{{ route('blog.show', $post) }}" class="pcard__media">
    @if($post->featuredImageUrl())
      <img src="{{ $post->featuredImageUrl() }}" alt="{{ $post->title }}" loading="lazy">
    @else
      <span class="pcard__ph">GovSocial</span>
    @endif
  </a>
  <div class="pcard__body">
    @if($post->category)
      <a href="{{ route('blog.category', $post->category) }}" class="pcard__cat">{{ $post->category->name }}</a>
    @endif
    <h2 class="pcard__title"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h2>
    <p class="pcard__excerpt">{{ \Illuminate\Support\Str::limit($post->excerpt, 130) }}</p>
    <div class="pcard__meta">
      <span>{{ optional($post->published_at)->translatedFormat('d M Y') }}</span>
      <span>·</span>
      <span>{{ $post->reading_time }} min de leitura</span>
    </div>
  </div>
</article>
