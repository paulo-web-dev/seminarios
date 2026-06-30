@extends('admin.layout')
@section('title', $post->exists ? 'Editar artigo' : 'Novo artigo')

@section('content')
@php $editing = $post->exists; @endphp
<div class="phead">
  <h1>{{ $editing ? 'Editar artigo' : 'Novo artigo' }}</h1>
  <a href="{{ route('admin.blog.posts.index') }}" class="btn btn--sm">← Voltar</a>
</div>

<form method="POST"
      action="{{ $editing ? route('admin.blog.posts.update', $post) : route('admin.blog.posts.store') }}"
      enctype="multipart/form-data">
  @csrf
  @if($editing) @method('PUT') @endif

  <div class="grid2">
    <div class="card">
      <div class="field">
        <label>Título *</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
      </div>
      <div class="field">
        <label>Slug (opcional — gerado do título)</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" placeholder="lgpd-redes-prefeituras">
      </div>
      <div class="field">
        <label>Resumo / excerpt</label>
        <textarea name="excerpt" style="min-height:70px" maxlength="300">{{ old('excerpt', $post->excerpt) }}</textarea>
        <span class="hint">Aparece nos cards e como fallback da meta description.</span>
      </div>

      <div class="field">
        <label>Conteúdo (HTML) *</label>
        <div class="toolbar" data-target="content">
          <button type="button" data-wrap="<h2>|</h2>">H2</button>
          <button type="button" data-wrap="<h3>|</h3>">H3</button>
          <button type="button" data-wrap="<strong>|</strong>">Negrito</button>
          <button type="button" data-wrap="<em>|</em>">Itálico</button>
          <button type="button" data-wrap="<p>|</p>">Parágrafo</button>
          <button type="button" data-wrap="<ul>\n  <li>|</li>\n</ul>">Lista</button>
          <button type="button" data-wrap='<a href="https://">|</a>'>Link</button>
          <button type="button" data-wrap="<blockquote>|</blockquote>">Citação</button>
          <button type="button" id="btnPreview">👁 Pré-visualizar</button>
        </div>
        <textarea name="content" id="content" style="min-height:340px;font-family:ui-monospace,monospace;font-size:13.5px" required>{{ old('content', $post->content) }}</textarea>
        <div class="preview" id="preview"></div>
      </div>
    </div>

    <div>
      <div class="card" style="margin-bottom:16px">
        <div class="field">
          <label>Status</label>
          <select name="status">
            <option value="draft" @selected(old('status',$post->status)==='draft')>Rascunho</option>
            <option value="published" @selected(old('status',$post->status)==='published')>Publicado</option>
          </select>
        </div>
        <div class="field">
          <label>Data de publicação (futura = agendado)</label>
          <input type="datetime-local" name="published_at"
                 value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
          <span class="hint">Status “Publicado” + data futura mantém o artigo oculto até a data.</span>
        </div>
        <div class="field">
          <label>Categoria</label>
          <select name="category_id">
            <option value="">— sem categoria —</option>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}" @selected((string)old('category_id',$post->category_id)===(string)$cat->id)>{{ $cat->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="field">
          <label>Tags (separadas por vírgula)</label>
          <input type="text" name="tags" value="{{ old('tags', $tagsValue) }}" placeholder="LGPD, prefeituras, anúncios">
        </div>
        <div class="field">
          <label>Autor</label>
          <input type="text" name="author" value="{{ old('author', $post->author ?: 'Equipe Unyflex') }}">
        </div>
      </div>

      <div class="card" style="margin-bottom:16px">
        <div class="field">
          <label>Imagem de destaque</label>
          @if($post->featuredImageUrl())
            <img src="{{ $post->featuredImageUrl() }}" alt="" style="width:100%;border-radius:10px;margin-bottom:8px">
          @endif
          <input type="file" name="featured_image" accept="image/*">
          <span class="hint">JPG/PNG/WebP até 4MB.</span>
        </div>
      </div>

      <div class="card">
        <h3 style="font-size:14px;text-transform:uppercase;letter-spacing:.08em;color:var(--muted);margin-bottom:14px">SEO</h3>
        <div class="field">
          <label>Meta title</label>
          <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}" maxlength="70">
        </div>
        <div class="field">
          <label>Meta description</label>
          <textarea name="meta_description" style="min-height:70px" maxlength="300">{{ old('meta_description', $post->meta_description) }}</textarea>
        </div>
        <div class="field">
          <label>Palavra-chave principal</label>
          <input type="text" name="focus_keyword" value="{{ old('focus_keyword', $post->focus_keyword) }}">
        </div>
      </div>
    </div>
  </div>

  <div style="margin-top:18px;display:flex;gap:12px">
    <button class="btn btn--cy" type="submit">{{ $editing ? 'Salvar alterações' : 'Criar artigo' }}</button>
    <a href="{{ route('admin.blog.posts.index') }}" class="btn">Cancelar</a>
  </div>
</form>

@push('head')<style>.preview img{max-width:100%}</style>@endpush
<script>
  // Toolbar: envolve seleção com tags
  document.querySelectorAll('.toolbar button[data-wrap]').forEach(function(btn){
    btn.addEventListener('click', function(){
      var ta = document.getElementById('content');
      var w = btn.getAttribute('data-wrap').replace(/\\n/g,'\n');
      var s = ta.selectionStart, e = ta.selectionEnd;
      var sel = ta.value.substring(s,e);
      var parts = w.split('|');
      var ins = parts[0] + sel + (parts[1]||'');
      ta.value = ta.value.substring(0,s) + ins + ta.value.substring(e);
      ta.focus();
    });
  });
  // Pré-visualização
  document.getElementById('btnPreview').addEventListener('click', function(){
    var p = document.getElementById('preview');
    p.innerHTML = document.getElementById('content').value;
    p.classList.toggle('is-on');
  });
</script>
@endsection
