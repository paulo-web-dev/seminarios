@extends('layouts.seminario')

@section('title', 'Inscrição recebida — '.$seminario->titulo)

@section('body')
  <main class="thanks">
    <div class="thanks__grid"></div>
    <div class="thanks__inner">
      <div class="thanks__check">
        @include('seminarios.icons.check', ['size' => 34])
      </div>
      <h1>Inscrição recebida{{ $nome ? ', '.\Illuminate\Support\Str::of($nome)->before(' ') : '' }}!</h1>
      <p>
        Recebemos seus dados para o seminário <strong>{{ $seminario->titulo }}</strong>.
        Nossa equipe entrará em contato em breve com as próximas etapas e a confirmação da sua vaga.
      </p>
      <a href="{{ route('seminarios.show', $seminario) }}" class="btn btn--cyan">
        Voltar ao seminário <span class="arrow">→</span>
      </a>
    </div>
  </main>
@endsection
