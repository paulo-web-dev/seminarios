@extends('admin.layout')
@section('title', 'Tags')
@section('content')
<div class="phead">
  <h1>Tags</h1>
  <a href="{{ route('admin.blog.tags.create') }}" class="btn btn--cy">+ Nova tag</a>
</div>
<div class="card">
  <table>
    <thead><tr><th>Nome</th><th>Slug</th><th>Artigos</th><th></th></tr></thead>
    <tbody>
      @forelse($tags as $tag)
        <tr>
          <td>{{ $tag->name }}</td>
          <td class="muted">{{ $tag->slug }}</td>
          <td class="muted">{{ $tag->posts_count }}</td>
          <td>
            <div class="row-actions">
              <a class="btn btn--sm" href="{{ route('admin.blog.tags.edit', $tag) }}">Editar</a>
              <form method="POST" action="{{ route('admin.blog.tags.destroy', $tag) }}" onsubmit="return confirm('Excluir tag?')">
                @csrf @method('DELETE')<button class="btn btn--sm btn--danger">Excluir</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="muted" style="text-align:center;padding:26px">Nenhuma tag.</td></tr>
      @endforelse
    </tbody>
  </table>
  <div class="pag">{{ $tags->links() }}</div>
</div>
@endsection
