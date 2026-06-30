@if(!empty($items))
<nav class="crumbs" aria-label="breadcrumb">
  <ol>
    @foreach($items as $i => $c)
      <li>
        @if(!$loop->last)
          <a href="{{ $c['url'] }}">{{ $c['name'] }}</a><span class="crumbs__sep">/</span>
        @else
          <span aria-current="page">{{ \Illuminate\Support\Str::limit($c['name'], 50) }}</span>
        @endif
      </li>
    @endforeach
  </ol>
</nav>
@endif
