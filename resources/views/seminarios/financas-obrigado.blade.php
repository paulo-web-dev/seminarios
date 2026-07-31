@extends('layouts.financas')

@section('title', 'Inscrição recebida · Seminário Finanças Municipais')
@section('description', 'Recebemos sua inscrição no Seminário Finanças Municipais. Nossa equipe entra em contato em breve.')

@section('body')
  <main class="thanks">
    <div class="thanks__grid"></div>
    <div class="thanks__inner">
      <div class="thanks__check">@includeIf('seminarios.icons.check', ['size' => 34])</div>
      <h1>{{ $nome ? 'Obrigado, '.\Illuminate\Support\Str::of($nome)->trim()->explode(' ')->first().'!' : 'Inscrição recebida!' }}</h1>
      <p>Recebemos seus dados para o <strong>Seminário Finanças Municipais</strong> (20 a 23 de outubro de 2026, Centro de Curitiba). Nossa equipe entra em contato pelo WhatsApp para garantir sua vaga.</p>
      <a href="{{ route('financas') }}" class="btn btn--cyan">Voltar para a página do seminário <span class="arrow">→</span></a>
    </div>
  </main>
@endsection
