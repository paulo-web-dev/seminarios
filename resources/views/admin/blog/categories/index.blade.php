@extends('admin.layout')
@section('title', 'Categorias')
@section('content')
<div class="phead">
  <h1>Categorias</h1>
  <a href="{{ route('admin.blog.categories.create') }}" class="btn btn--cy">+ Nova categoria</a>
</div>
<div class="card">
  <table>
    <thead><tr><th>Nome</th><th>Slug</th><th>Artigos</th><th></th></tr></thead>
    <tbody>
      @forelse($categories as $cat)
        <tr>
          <td>{{ $cat->name }}</td>
          <td class="muted">{{ $cat->slug }}</td>
          <td class="muted">{{ $cat->posts_count }}</td>
          <td>
            <div class="row-actions">
              <a class="btn btn--sm" href="{{ route('admin.blog.categories.edit', $cat) }}">Editar</a>
              <form method="POST" action="{{ route('admin.blog.categories.destroy', $cat) }}" onsubmit="return confirm('Excluir categoria?')">
                @csrf @method('DELETE')<button class="btn btn--sm btn--danger">Excluir</button>
              </form>
            </div>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="muted" style="text-align:center;padding:26px">Nenhuma categoria.</td></tr>
      @endforelse
    </tbody>
  </table>
  <div class="pag">{{ $categories->links() }}</div>
</div>
@endsection
