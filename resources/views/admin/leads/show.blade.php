@extends('admin.layout')
@section('title', 'Lead · '.$lead->nome)

@push('head')
<style>
  .back{color:var(--muted);font-size:14px;display:inline-block;margin-bottom:18px}
  .back:hover{color:var(--cy)}
  .grid{display:grid;grid-template-columns:1fr;gap:18px}
  @media(min-width:820px){ .grid{grid-template-columns:1.4fr 1fr} }
  h1{font-size:26px;margin-bottom:4px}
  .role{color:var(--muted);font-size:14px;margin-bottom:22px}
  .dl{display:grid;grid-template-columns:1fr;gap:0}
  .dl div{display:flex;justify-content:space-between;gap:18px;padding:12px 0;border-bottom:1px solid rgba(255,255,255,.07)}
  .dl dt{color:var(--muted);font-family:var(--disp);font-size:13px}
  .dl dd{margin:0;color:#fff;text-align:right;word-break:break-word}
  .msg{margin-top:16px;background:rgba(0,0,0,.25);border:1px solid var(--border);border-radius:12px;padding:14px;color:var(--txt);font-size:14px;white-space:pre-wrap}
  .st-form{display:flex;flex-wrap:wrap;gap:8px;margin-top:10px}
  .st-form button{background:var(--surface);border:1px solid var(--border);color:var(--txt);
    font-family:var(--disp);font-size:13px;padding:9px 14px;border-radius:999px;cursor:pointer}
  .st-form button.cur{background:var(--cy);color:#06223f;border-color:var(--cy)}
  .extra{font-size:13px}
  .extra div{display:flex;justify-content:space-between;gap:14px;padding:8px 0;border-bottom:1px solid rgba(255,255,255,.06)}
  .extra dt{color:var(--muted)} .extra dd{margin:0;color:#fff;text-align:right;word-break:break-all;max-width:60%}
  .sec-t{font-family:var(--disp);font-size:13px;text-transform:uppercase;letter-spacing:.1em;color:var(--cy);margin:0 0 10px}
</style>
@endpush

@section('content')
  <a href="{{ url()->previous() }}" class="back">← Voltar</a>

  <div class="grid">
    <div class="card">
      <h1>{{ $lead->nome }}</h1>
      <div class="role">{{ $lead->cargo ?: 'Cargo não informado' }} @if($lead->orgao)· {{ $lead->orgao }}@endif</div>

      <dl class="dl">
        <div><dt>E-mail</dt><dd>{{ $lead->email }}</dd></div>
        <div><dt>WhatsApp</dt><dd>{{ $lead->telefone ?: '—' }}</dd></div>
        <div><dt>Órgão / Prefeitura</dt><dd>{{ $lead->orgao ?: '—' }}</dd></div>
        <div><dt>Cargo</dt><dd>{{ $lead->cargo ?: '—' }}</dd></div>
        <div><dt>Seminário</dt><dd>{{ optional($lead->seminario)->titulo ?: '—' }}</dd></div>
        <div><dt>Origem</dt><dd>{{ $lead->origem ?: '—' }}</dd></div>
        <div><dt>Recebido em</dt><dd>{{ optional($lead->created_at)->format('d/m/Y H:i') }}</dd></div>
      </dl>

      @if ($lead->mensagem)
        <div class="msg">{{ $lead->mensagem }}</div>
      @endif

      <p class="sec-t" style="margin-top:24px">Status</p>
      <form method="POST" action="{{ route('admin.leads.status', $lead) }}" class="st-form">
        @csrf @method('PATCH')
        @foreach (['novo'=>'Novo','contatado'=>'Contatado','inscrito'=>'Inscrito','descartado'=>'Descartado'] as $key => $label)
          <button type="submit" name="status" value="{{ $key }}" class="{{ $lead->status === $key ? 'cur' : '' }}">{{ $label }}</button>
        @endforeach
      </form>
    </div>

    <div class="card">
      <p class="sec-t">Dados de captura</p>
      @php($e = $lead->extra ?? [])
      <dl class="extra">
        <div><dt>IP</dt><dd>{{ $e['ip'] ?? '—' }}</dd></div>
        <div><dt>Dispositivo</dt><dd>{{ $e['dispositivo'] ?? '—' }}</dd></div>
        <div><dt>Página</dt><dd>{{ $e['pagina_url'] ?? '—' }}</dd></div>
        <div><dt>Referência</dt><dd>{{ $e['referer'] ?? '—' }}</dd></div>
        @if (!empty($e['utm']))
          @foreach ($e['utm'] as $k => $v)
            <div><dt>{{ strtoupper(str_replace('utm_','',$k)) }}</dt><dd>{{ $v }}</dd></div>
          @endforeach
        @endif
      </dl>
    </div>
  </div>
@endsection
