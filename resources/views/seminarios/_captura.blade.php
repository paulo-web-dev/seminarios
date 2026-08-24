{{--
  ============================================================
  BLOCO DE CAPTURA REUTILIZÁVEL — isca do Finanças Municipais
  (programação completa em PDF + modelo de justificativa p/ empenho)

  Usado 3x na LP: hero, fim da ementa e fim dos professores.
  Parâmetros do @include:
    $anchor  → id/âncora do bloco (ex.: 'form', 'form-2', 'form-3')
    $pfx     → prefixo dos ids dos campos (evita id duplicado entre os 3 blocos)
    $titulo  → título do bloco
    $sub     → subtítulo/promessa

  Envio: POST nativo do Laravel para a rota financas.inscricao (com @csrf e
  validação). No SUCESSO, o controller deve redirecionar para
  route('financas.obrigado') — de onde o Pixel dispara o Lead e onde o lead
  recebe o link da programação (isca). As 6 UTMs + fbclid são preenchidas por
  JS no submit (ver script no fim da financas.blade.php).
  ============================================================
--}}
@php($pfx = $pfx ?? 'x')
<div class="form-card cap-card" id="{{ $anchor ?? 'form' }}">
  <h3>{{ $titulo ?? 'Receba a programação completa' }}</h3>
  <p class="form-sub">{{ $sub ?? 'Programação completa em PDF + modelo pronto de justificativa para empenho. Enviamos no seu e-mail e WhatsApp.' }}</p>

  <form class="cap-form" method="POST" action="{{ route('financas.inscricao') }}">
    @csrf
    {{-- origem do lead + seminário (para CRM e para o redirect de obrigado) --}}
    <input type="hidden" name="lp_form_id" value="lp-financas-{{ $pfx }}">
    <input type="hidden" name="seminario_slug" value="financas-municipais">
    {{-- UTMs + fbclid: preenchidas por JS no submit --}}
    <input type="hidden" name="utm_source"   value="{{ old('utm_source') }}">
    <input type="hidden" name="utm_medium"   value="{{ old('utm_medium') }}">
    <input type="hidden" name="utm_campaign" value="{{ old('utm_campaign') }}">
    <input type="hidden" name="utm_id"       value="{{ old('utm_id') }}">
    <input type="hidden" name="utm_term"     value="{{ old('utm_term') }}">
    <input type="hidden" name="utm_content"  value="{{ old('utm_content') }}">
    <input type="hidden" name="fbclid"       value="{{ old('fbclid') }}">

    <div class="form-grid">
      <div class="field col-2">
        <label for="nome_{{ $pfx }}">Nome completo *</label>
        <input type="text" id="nome_{{ $pfx }}" name="nome" value="{{ old('nome') }}" required>
        @error('nome')<span class="err">{{ $message }}</span>@enderror
      </div>
      <div class="field">
        <label for="cargo_{{ $pfx }}">Cargo / Função *</label>
        <input type="text" id="cargo_{{ $pfx }}" name="cargo" value="{{ old('cargo') }}" required>
        @error('cargo')<span class="err">{{ $message }}</span>@enderror
      </div>
      <div class="field">
        <label for="orgao_{{ $pfx }}">Órgão / Município *</label>
        <input type="text" id="orgao_{{ $pfx }}" name="orgao" value="{{ old('orgao') }}" required>
        @error('orgao')<span class="err">{{ $message }}</span>@enderror
      </div>
      <div class="field">
        <label for="tel_{{ $pfx }}">WhatsApp *</label>
        <input type="text" id="tel_{{ $pfx }}" name="telefone" value="{{ old('telefone') }}"
               class="cap-tel" placeholder="(41) 90000-0000" inputmode="tel" maxlength="15" required>
        @error('telefone')<span class="err">{{ $message }}</span>@enderror
      </div>
      <div class="field">
        <label for="email_{{ $pfx }}">E-mail *</label>
        <input type="email" id="email_{{ $pfx }}" name="email" value="{{ old('email') }}" required>
        @error('email')<span class="err">{{ $message }}</span>@enderror
      </div>
      {{-- honeypot anti-spam --}}
      <div class="field--hp" aria-hidden="true">
        <label for="website_{{ $pfx }}">Não preencha este campo</label>
        <input type="text" id="website_{{ $pfx }}" name="website" tabindex="-1" autocomplete="off">
      </div>
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn--cyan">Receber a programação completa <span class="arrow">→</span></button>
    </div>
    <p class="cap-fine">Programação completa + modelo de justificativa para empenho · sem custo</p>
  </form>
</div>
