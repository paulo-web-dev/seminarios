@extends('admin.layout')
@section('title', $tag->exists ? 'Editar tag' : 'Nova tag')
@section('content')
@php $editing = $tag->exists; @endphp
<div class="phead">
  <h1>{{ $editing ? 'Editar tag' : 'Nova tag' }}</h1>
  <a href="{{ route('admin.blog.tags.index') }}" class="btn btn--sm">← Voltar</a>
</div>
<form method="POST" action="{{ $editing ? route('admin.blog.tags.update',$tag) : route('admin.blog.tags.store') }}">
  @csrf @if($editing)@method('PUT')@endif
  <div class="card" style="max-width:520px">
    <div class="field"><label>Nome *</label><input type="text" name="name" value="{{ old('name',$tag->name) }}" required></div>
    <div class="field"><label>Slug (opcional)</label><input type="text" name="slug" value="{{ old('slug',$tag->slug) }}"></div>
    <button class="btn btn--cy">{{ $editing ? 'Salvar' : 'Criar' }}</button>
  </div>
</form>
@endsection
