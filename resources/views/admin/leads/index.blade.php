@extends('admin.layout')
@section('title', 'Leads')

@push('head')
<style>
  .head{display:flex;flex-wrap:wrap;align-items:flex-end;justify-content:space-between;gap:16px;margin-bottom:22px}
  .head h1{font-size:26px}
  .head .sub{color:var(--muted);font-size:14px;margin-top:4px}
  .filters{display:flex;flex-wrap:wrap;gap:10px;margin-bottom:20px}
  .filters input[type=text]{padding:10px 14px;border-radius:999px;border:1px solid var(--border);
    background:var(--surface);color:#fff;font-size:14px;min-width:230px}
  .chips{display:flex;flex-wrap:wrap;gap:8px}
  .chip{padding:7px 14px;border-radius:999px;border:1px solid var(--border);background:var(--surface);
    font-family:var(--disp);font-size:13px;color:var(--txt)}
  .chip.on{background:var(--cy);color:#06223f;border-color:var(--cy)}
  .chip b{opacity:.7;font-weight:600}
  .tbl{width:100%;border-collapse:collapse;font-size:14px}
  .tbl th{ text-align:left;font-family:var(--disp);font-size:12px;text-transform:uppercase;letter-spacing:.08em;
    color:var(--muted);padding:0 14px 12px;border-bottom:1px solid var(--border)}
  .tbl td{padding:14px;border-bottom:1px solid rgba(255,255,255,.06);vertical-align:top}
  .tbl tr:hover td{background:rgba(255,255,255,.02)}
  .nm{color:#fff;font-weight:600}
  .muted{color:var(--muted)}
  .st{display:inline-block;padding:3px 10px;border-radius:999px;font-size:12px;font-family:var(--disp);font-weight:600}
  .st-novo{background:rgba(0,194,255,.14);color:var(--cy)}
  .st-contatado{background:rgba(250,204,21,.14);color:#fde047}
  .st-inscrito{background:rgba(34,197,94,.14);color:#86efac}
  .st-descartado{background:rgba(148,163,184,.12);color:#94a3b8}
  .pg{display:flex;gap:6px;margin-top:22px}
  .empty{text-align:center;color:var(--muted);padding:60px 20px}
  @media(max-width:680px){ .hide-sm{display:none} }
</style>
@endpush

@section('content')
  <div class="head">
    <div>
      <h1>Leads capturados</h1>
      <div class="sub">{{ $total }} contato(s) no total</div>
    </div>
    <input form="filtros" type="text" name="q" value="{{ $q }}" placeholder="Buscar por nome, e-mail, órgão…">
  </div>

  <form id="filtros" method="GET" action="{{ route('admin.leads.index') }}" class="filters">
    @if ($q)<input type="hidden" name="q" value="{{ $q }}">@endif
    <div class="chips">
      <a href="{{ route('admin.leads.index', array_filter(['q'=>$q])) }}" class="chip {{ $status ? '' : 'on' }}">Todos <b>{{ $total }}</b></a>
      @foreach (['novo'=>'Novos','contatado'=>'Contatados','inscrito'=>'Inscritos','descartado'=>'Descartados'] as $key => $label)
        <a href="{{ route('admin.leads.index', array_filter(['status'=>$key,'q'=>$q])) }}"
           class="chip {{ $status === $key ? 'on' : '' }}">{{ $label }} <b>{{ $counts[$key] ?? 0 }}</b></a>
      @endforeach
    </div>
  </form>

  <div class="card" style="padding:8px 8px 4px">
    @if ($leads->isEmpty())
      <div class="empty">Nenhum lead encontrado.</div>
    @else
      <table class="tbl">
        <thead>
          <tr>
            <th>Contato</th>
            <th class="hide-sm">Órgão</th>
            <th class="hide-sm">Origem</th>
            <th>Status</th>
            <th class="hide-sm">Data</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($leads as $lead)
            <tr>
              <td>
                <div class="nm">{{ $lead->nome }}</div>
                <div class="muted">{{ $lead->email }}</div>
                @if ($lead->telefone)<div class="muted">{{ $lead->telefone }}</div>@endif
              </td>
              <td class="hide-sm">
                {{ $lead->orgao ?: '—' }}
                @if ($lead->cargo)<div class="muted">{{ $lead->cargo }}</div>@endif
              </td>
              <td class="hide-sm muted">{{ $lead->origem ?: '—' }}</td>
              <td><span class="st st-{{ $lead->status }}">{{ ucfirst($lead->status) }}</span></td>
              <td class="hide-sm muted">{{ optional($lead->created_at)->format('d/m/Y H:i') }}</td>
              <td><a href="{{ route('admin.leads.show', $lead) }}" class="btn btn--sm">Ver</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  <div class="pg">{{ $leads->links() }}</div>
@endsection
