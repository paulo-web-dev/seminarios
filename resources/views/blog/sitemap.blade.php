<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>{{ url('/') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>{{ route('govsocial') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{ route('blog.index') }}</loc>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
  </url>
  @foreach($posts as $post)
  <url>
    <loc>{{ route('blog.show', $post) }}</loc>
    <lastmod>{{ optional($post->updated_at)->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  @endforeach
  @foreach($categories as $cat)
  <url>
    <loc>{{ route('blog.category', $cat) }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.5</priority>
  </url>
  @endforeach
  @foreach($tags as $tag)
  <url>
    <loc>{{ route('blog.tag', $tag) }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.3</priority>
  </url>
  @endforeach
</urlset>
