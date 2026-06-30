@extends('admin.layout')
@section('title', 'Posts')

@section('content')
<div class="phead">
  <h1>Artigos do blog</h1>
  <a href="{{ route('admin.blog.posts.create') }}" class="btn btn--cy">+ Novo artigo</a>
</div>

<form method="GET" class="card" style="margin-bottom:18px;display:flex;gap:12px;flex-wrap:wrap;align-items:end">
  <div class="field" style="margin:0;flex:1;min-width:200px">
    <label>Buscar por título</label>
    <input type="text" name="q" value="{{ $q }}" placeholder="ex.: LGPD">
  </div>
  <div class="field" style="margin:0">
    <label>Status</label>
    <select name="status">
      <option value="">Todos</option>
      <option value="published" @selected($status==='published')>Publicados</option>
      <option value="draft" @selected($status==='draft')>Rascunhos</option>
    </select>
  </div>
  <button class="btn" type="submit">Filtrar</button>
</form>

<div class="card">
  <table>
    <thead><tr><th>Título</th><th>Categoria</th><th>Status</th><th>Publicação</th><th>Views</th><th></th></tr></thead>
    <tbody>
      @forelse($posts as $post)
        <tr>
          <td style="max-width:340px">{{ $post->title }}</td>
          <td class="muted">{{ optional($post->category)->name ?: '—' }}</td>
          <td>
            @if($post->status==='published')<span class="pill pill--pub">Publicado</span>
            @else<span class="pill pill--draft">Rascunho</span>@endif
          </td>
          <td class="muted">{{ optional($post->published_at)->format('d/m/Y H:i') ?: '—' }}</td>
          <td class="muted">{{ $post->views }}</td>
          <td>
            <div class="row-actions">
              <a class="btn btn--sm" href="{{ route('admin.blog.posts.edit', $post) }}">Editar</a>
              <form method="POST" action="{{ route('admin.blog.posts.destroy', $post) }}" onsubmit="return confirm('Excluir este artigo?')">
                @csrf @method('DELETE')
                <button class="btn btn--sm btn--danger" type="submit">Excluir</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr><td colspan="6" class="muted" style="text-align:center;padding:30px">Nenhum artigo ainda.</td></tr>
      @endforelse
    </tbody>
  </table>
  <div class="pag">{{ $posts->links() }}</div>
</div>
@endsection
