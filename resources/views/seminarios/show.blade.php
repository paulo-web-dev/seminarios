@extends('layouts.seminario')

@section('body')

  {{-- ============ NAV ============ --}}
  <nav class="nav">
    <div class="wrap nav__inner">
      <div class="nav__brand">
        <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
        <span class="sep"></span>
        <span class="tag">GovSocial</span>
      </div>
      <a href="#inscricao" class="nav__cta">Garantir vaga</a>
    </div>
  </nav>

  {{-- ============ 1. HERO ============ --}}
  <header class="hero">
    <div class="hero__grid"></div>
    @if ($seminario->hero_imagem)
      <div class="hero__photo ph"><img src="{{ asset($seminario->hero_imagem) }}" alt="{{ $seminario->titulo }}"></div>
    @endif
    <div class="wrap hero__inner">
      @if ($seminario->badge_topo)<span class="badge badge--orange">{{ $seminario->badge_topo }}</span>@endif

      <h1>{!! $seminario->titulo_destaque
            ? str_replace($seminario->titulo_destaque, '<span class="cy">'.e($seminario->titulo_destaque).'</span>', e($seminario->titulo))
            : e($seminario->titulo) !!}</h1>

      @if ($seminario->subtitulo)<p class="hero__sub">{{ $seminario->subtitulo }}</p>@endif
      @if ($seminario->descricao)<p class="hero__desc">{{ $seminario->descricao }}</p>@endif

      @if (!empty($seminario->selos))
        <div class="hero__seals">
          @foreach ($seminario->selos as $selo)<span class="seal"><span class="ck">✓</span> {{ $selo }}</span>@endforeach
        </div>
      @endif

      <div class="hero__cta">
        <a href="#inscricao" class="btn btn--cyan">Garantir minha vaga <span class="arrow">→</span></a>
        @if ($seminario->modalidade)<span class="hero__meta">{{ $seminario->modalidade }}</span>@endif
      </div>

      <div class="cobrand">
        <span>Realização</span>
        <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
        <img src="{{ asset('img/logo-unypublica-white.png') }}" alt="Faculdade Unypública">
      </div>
    </div>

    {{-- Barra de destaques --}}
    <div class="hero__stats">
      <div class="wrap hero__stats-inner">
        <div class="stat"><span class="stat__num">{{ $seminario->dias->pluck('rotulo')->unique()->count() }}</span><span class="stat__lbl">Dias de imersão</span></div>
        <div class="stat"><span class="stat__num">{{ $seminario->dias->count() }}</span><span class="stat__lbl">Painéis temáticos</span></div>
        <div class="stat"><span class="stat__num">∞</span><span class="stat__lbl">Networking</span></div>
        <div class="stat"><span class="stat__num">♪</span><span class="stat__lbl">Música ao vivo</span></div>
      </div>
    </div>
  </header>

  {{-- ============ 2. POR QUE PARTICIPAR ============ --}}
  @if ($seminario->diferenciais->isNotEmpty())
    <section class="section section--alt why">
      <div class="wrap">
        <div class="sec-head">
          <span class="kicker">{{ $seminario->why_kicker }}</span>
          @if ($seminario->why_titulo)<h2>{{ $seminario->why_titulo }}</h2>@endif
          @if ($seminario->why_lead)<p>{{ $seminario->why_lead }}</p>@endif
        </div>
        <div class="cards3">
          @foreach ($seminario->diferenciais as $d)
            <article class="fcard">
              <div class="fcard__icon">@includeIf('seminarios.icons.'.$d->icone, ['size' => 26])</div>
              <h3>{{ $d->titulo }}</h3>
              <p>{{ $d->descricao }}</p>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 3. A EXPERIÊNCIA (bento) ============ --}}
  @if ($seminario->vantagens->isNotEmpty())
    <section class="section exp">
      <div class="section__grid-bg"></div>
      <div class="wrap">
        <div class="sec-head">
          <span class="kicker">{{ $seminario->exp_kicker }}</span>
          @if ($seminario->exp_titulo)<h2>{{ $seminario->exp_titulo }}</h2>@endif
          @if ($seminario->exp_lead)<p>{{ $seminario->exp_lead }}</p>@endif
        </div>
        <div class="exp-grid">
          @foreach ($seminario->vantagens as $v)
            <article class="exp-item {{ $v->destaque ? 'exp-feature' : 'exp-card' }}">
              @if ($v->foto)<img class="exp-item__bg" src="{{ asset($v->foto) }}" alt="{{ $v->titulo }}">@endif
              <span class="exp-item__overlay"></span>
              <div class="exp-item__content">
                <span class="exp-item__icon">@includeIf('seminarios.icons.'.$v->icone, ['size' => 22])</span>
                <h3>{{ $v->titulo }}</h3>
                @if ($v->descricao)<p>{{ $v->descricao }}</p>@endif
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 4. ALMOÇO MADALOSSO ============ --}}
  @if (!empty($seminario->madalosso) && !empty($seminario->madalosso['titulo']))
    @php($mad = $seminario->madalosso)
    <section class="section section--alt mad">
      <div class="section__grid-bg"></div>
      <div class="wrap mad__inner">
        <div class="mad__media ph">
          @if (!empty($mad['foto']))<img src="{{ asset($mad['foto']) }}" alt="{{ $mad['titulo'] }}">@endif
        </div>
        <div class="mad__body">
          <span class="kicker">Almoço de celebração</span>
          <h2>{{ $mad['titulo'] }}</h2>
          @if (!empty($mad['lead']))<p class="mad__lead">{{ $mad['lead'] }}</p>@endif
          @if (!empty($mad['highlights']))
            <div class="mad__list">
              @foreach ($mad['highlights'] as $h)
                <div class="mad__item">
                  <span class="tick">@include('seminarios.icons.check', ['size' => 18])</span>
                  <div>
                    <h4>{{ $h['titulo'] ?? '' }}</h4>
                    @if (!empty($h['descricao']))<p>{{ $h['descricao'] }}</p>@endif
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 5. BENEFÍCIOS ============ --}}
  @if ($seminario->beneficios->isNotEmpty())
    <section class="section beneficios">
      <div class="section__grid-bg"></div>
      <div class="wrap">
        <div class="sec-head is-center">
          <span class="kicker is-center">{{ $seminario->beneficios_kicker }}</span>
          @if ($seminario->beneficios_titulo)<h2>{{ $seminario->beneficios_titulo }}</h2>@endif
          @if ($seminario->beneficios_lead)<p>{{ $seminario->beneficios_lead }}</p>@endif
        </div>
        <div class="ben-grid">
          @foreach ($seminario->beneficios as $b)
            <article class="ben">
              <div class="ben__icon">@includeIf('seminarios.icons.'.$b->icone, ['size' => 24])</div>
              <h3>{{ $b->titulo }}</h3>
              @if ($b->descricao)<p>{{ $b->descricao }}</p>@endif
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 6. PROGRAMAÇÃO ============ --}}
  @if ($seminario->dias->isNotEmpty())
    <section class="section section--alt prog">
      <div class="section__grid-bg"></div>
      <div class="wrap">
        <div class="sec-head">
          <span class="kicker">{{ $seminario->prog_kicker }}</span>
          @if ($seminario->prog_titulo)<h2>{{ $seminario->prog_titulo }}</h2>@endif
          @if ($seminario->prog_lead)<p>{{ $seminario->prog_lead }}</p>@endif
        </div>
        <div class="prog-days">
          @foreach ($seminario->dias->groupBy('rotulo') as $rotulo => $paineis)
            <div class="day-group">
              <div class="day-group__label"><span>{{ $rotulo }}</span></div>
              <div class="day-group__panels">
                @foreach ($paineis as $painel)
                  <article class="panel">
                    <div class="panel__head">
                      <h3>{{ $painel->titulo }}</h3>
                      @if ($painel->periodo)<span class="panel__time">{{ $painel->periodo }}</span>@endif
                    </div>
                    @if (!empty($painel->topicos))
                      <ul class="panel__topics">
                        @foreach ($painel->topicos as $t)<li>{{ $t }}</li>@endforeach
                      </ul>
                    @endif
                  </article>
                @endforeach
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 7. METODOLOGIA ============ --}}
  @if ($seminario->metodologias->isNotEmpty())
    <section class="section metodologia">
      <div class="section__grid-bg"></div>
      <div class="wrap">
        <div class="sec-head">
          <span class="kicker">{{ $seminario->metodologia_kicker }}</span>
          @if ($seminario->metodologia_titulo)<h2>{{ $seminario->metodologia_titulo }}</h2>@endif
          @if ($seminario->metodologia_lead)<p>{{ $seminario->metodologia_lead }}</p>@endif
        </div>
        <div class="method-grid">
          @foreach ($seminario->metodologias as $i => $m)
            <article class="method">
              <span class="method__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
              <div>
                <h3>{{ $m->titulo }}</h3>
                @if ($m->descricao)<p>{{ $m->descricao }}</p>@endif
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 8. PARA QUEM É ============ --}}
  @if ($seminario->publicos->isNotEmpty())
    <section class="section section--alt who">
      <div class="wrap">
        <div class="sec-head is-center">
          <span class="kicker is-center">{{ $seminario->who_kicker }}</span>
          @if ($seminario->who_titulo)<h2>{{ $seminario->who_titulo }}</h2>@endif
        </div>
        <div class="who__grid">
          @foreach ($seminario->publicos as $p)
            <div class="pcard">
              <span class="pcard__ic">@includeIf('seminarios.icons.'.$p->icone, ['size' => 22])</span>
              <span>{{ $p->titulo }}</span>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 9. GALERIA / PROVA SOCIAL ============ --}}
  @if ($seminario->fotos->isNotEmpty() || $seminario->quote_texto)
    <section class="section gallery">
      <div class="section__grid-bg"></div>
      <div class="wrap">
        <div class="sec-head is-center">
          <span class="kicker is-center">{{ $seminario->galeria_kicker }}</span>
          @if ($seminario->galeria_titulo)<h2>{{ $seminario->galeria_titulo }}</h2>@endif
        </div>
        @if ($seminario->fotos->isNotEmpty())
          <div class="gallery__grid">
            @foreach ($seminario->fotos as $foto)
              <div class="gphoto ph"><img src="{{ asset($foto->caminho) }}" alt="{{ $foto->legenda }}"></div>
            @endforeach
          </div>
        @endif
        @if ($seminario->quote_texto)
          <div class="quote">
            <span class="quote__mark">“</span>
            <blockquote>{{ $seminario->quote_texto }}</blockquote>
            @if ($seminario->quote_autor)<cite>— {{ $seminario->quote_autor }}</cite>@endif
          </div>
        @endif
      </div>
    </section>
  @endif

  {{-- ============ 10. TUTORIA / PALESTRANTES ============ --}}
  @if ($seminario->palestrantes->isNotEmpty())
    <section class="section section--alt speakers">
      <div class="section__grid-bg"></div>
      <div class="wrap">
        <div class="sec-head is-center">
          <span class="kicker is-center">{{ $seminario->speakers_kicker }}</span>
          <h2>{{ $seminario->speakers_titulo }}</h2>
        </div>
        <div class="speakers__grid">
          @foreach ($seminario->palestrantes as $sp)
            <article class="scard">
              <div class="scard__photo ph">@if ($sp->foto)<img src="{{ asset($sp->foto) }}" alt="{{ $sp->nome }}">@endif</div>
              <h3>{{ $sp->nome }}</h3>
              @if ($sp->cargo)<p class="scard__role">{{ $sp->cargo }}</p>@endif
              @if ($sp->bio)<p>{{ $sp->bio }}</p>@endif
            </article>
          @endforeach
        </div>
      </div>
    </section>
  @endif

  {{-- ============ 11. INVESTIMENTO ============ --}}
  <section class="section invest" id="inscricao">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head is-center">
        @if ($seminario->invest_badge)<span class="badge badge--orange" style="margin-bottom:14px">{{ $seminario->invest_badge }}</span>@endif
        <span class="kicker is-center">{{ $seminario->invest_kicker }}</span>
        <h2>{{ $seminario->invest_titulo ?? 'Garanta sua vaga' }}</h2>
        @if ($seminario->invest_lead)<p>{{ $seminario->invest_lead }}</p>@endif
      </div>

      @if ($seminario->planos->isNotEmpty())
        <div class="plans">
          @foreach ($seminario->planos as $plano)
            <div class="plan {{ $plano->destaque ? 'plan--feature' : '' }}">
              @if ($plano->destaque)<span class="plan__tag badge badge--orange">Mais completo</span>@endif
              <div class="plan__name">{{ $plano->nome }}</div>
              <div class="plan__price">{{ $plano->preco }}</div>
              <div class="plan__period">{{ $plano->periodo }}</div>
              @if (!empty($plano->itens))
                <ul class="plan__items">
                  @foreach ($plano->itens as $item)
                    <li class="{{ ($item['incluso'] ?? false) ? 'on' : 'off' }}">
                      <span class="pi">@include('seminarios.icons.'.(($item['incluso'] ?? false) ? 'check' : 'x'), ['size' => 14])</span>
                      <span>{{ $item['label'] ?? '' }}</span>
                    </li>
                  @endforeach
                </ul>
              @endif
              <a href="#form" class="btn {{ $plano->destaque ? 'btn--cyan' : 'btn--outline' }}">{{ $plano->cta_texto }} <span class="arrow">→</span></a>
            </div>
          @endforeach
        </div>
        @if ($seminario->invest_obs)<p class="invest__foot">{{ $seminario->invest_obs }}</p>@endif
      @endif

      {{-- Formulário de inscrição --}}
      <div class="form-card" id="form">
        <h3>Fale com um consultor</h3>
        <p class="form-sub">Preencha os dados e nossa equipe entra em contato para garantir sua vaga.</p>
        <form method="POST" action="{{ route('seminarios.inscricao', $seminario) }}">
          @csrf
          <div class="form-grid">
            <div class="field col-2">
              <label for="nome">Nome completo *</label>
              <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
              @error('nome')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="email">E-mail *</label>
              <input type="email" id="email" name="email" value="{{ old('email') }}" required>
              @error('email')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="telefone">WhatsApp / Telefone</label>
              <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="(11) 90000-0000">
              @error('telefone')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="orgao">Órgão / Prefeitura</label>
              <input type="text" id="orgao" name="orgao" value="{{ old('orgao') }}">
              @error('orgao')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="field">
              <label for="cargo">Cargo / Função</label>
              <input type="text" id="cargo" name="cargo" value="{{ old('cargo') }}">
              @error('cargo')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="field col-2">
              <label for="mensagem">Mensagem (opcional)</label>
              <textarea id="mensagem" name="mensagem">{{ old('mensagem') }}</textarea>
              @error('mensagem')<span class="err">{{ $message }}</span>@enderror
            </div>
            <div class="field--hp" aria-hidden="true">
              <label for="website">Não preencha este campo</label>
              <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn--cyan">{{ $seminario->cta_texto }} <span class="arrow">→</span></button>
          </div>
        </form>
      </div>
    </div>
  </section>

  {{-- ============ 12. FOOTER ============ --}}
  <footer class="footer">
    <div class="wrap footer__inner">
      <div class="footer__brand">
        <div class="footer__brands">
          <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
          <img src="{{ asset('img/logo-unypublica-white.png') }}" alt="Faculdade Unypública">
        </div>
        <p>{{ $seminario->titulo }}. {{ $seminario->subtitulo }} Realização: Unyflex Digital · Faculdade Unypública.</p>
      </div>
      <div class="footer__links">
        <a href="#">Política de Privacidade</a>
        <a href="#">Contato</a>
        <a href="#">Instagram</a>
      </div>
      <p class="footer__legal">
        Seus dados são tratados conforme a Lei Geral de Proteção de Dados (LGPD nº 13.709/2018),
        utilizados exclusivamente para fins de inscrição e comunicação sobre o evento.
        © {{ date('Y') }} Unyflex Digital. Todos os direitos reservados.
      </p>
    </div>
  </footer>

@endsection
