@extends('admin.layout')
@section('title', $category->exists ? 'Editar categoria' : 'Nova categoria')
@section('content')
@php $editing = $category->exists; @endphp
<div class="phead">
  <h1>{{ $editing ? 'Editar categoria' : 'Nova categoria' }}</h1>
  <a href="{{ route('admin.blog.categories.index') }}" class="btn btn--sm">← Voltar</a>
</div>
<form method="POST" action="{{ $editing ? route('admin.blog.categories.update',$category) : route('admin.blog.categories.store') }}">
  @csrf @if($editing)@method('PUT')@endif
  <div class="card" style="max-width:620px">
    <div class="field">
      <label>Nome *</label>
      <input type="text" name="name" value="{{ old('name',$category->name) }}" required>
    </div>
    <div class="field">
      <label>Slug (opcional)</label>
      <input type="text" name="slug" value="{{ old('slug',$category->slug) }}">
    </div>
    <div class="field">
      <label>Descrição</label>
      <textarea name="description" maxlength="500">{{ old('description',$category->description) }}</textarea>
      <span class="hint">Usada como meta description da página da categoria.</span>
    </div>
    <button class="btn btn--cy">{{ $editing ? 'Salvar' : 'Criar' }}</button>
  </div>
</form>
@endsection
