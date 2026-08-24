@extends('layouts.financas')

@section('title', 'Seminário Finanças Municipais · Programação completa + modelo de empenho · Curitiba')
@section('description', 'Sua tesouraria e sua contabilidade não fecham? Receba a programação completa em PDF + o modelo pronto de justificativa para inscrição via nota de empenho. Imersão presencial, 20 a 23 de outubro de 2026, em Curitiba.')

@push('head')
  {{-- ============ META PIXEL (base: init + PageView) ============ --}}
  <!-- Meta Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1168799437651546');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1168799437651546&ev=PageView&noscript=1"/></noscript>
  <!-- End Meta Pixel Code -->
@endpush

@section('body')

  <style>
    html{scroll-behavior:smooth}
    .sec-cta{display:flex;justify-content:center;margin-top:44px}
    .sec-cta .btn{min-width:280px;justify-content:center}
    @media(max-width:560px){.sec-cta .btn{width:100%}}
    .panel__time{color:var(--ciano)}
    /* Hero visual */
    .hero__photo{opacity:.26}
    .hero__scrim{position:absolute;inset:0;pointer-events:none;
      background:linear-gradient(92deg, rgba(12,10,6,.92) 0%, rgba(12,10,6,.72) 46%, rgba(12,10,6,.42) 100%),
                 linear-gradient(180deg, rgba(12,10,6,.15) 55%, rgba(12,10,6,.78) 100%)}
    /* Linha de data/local/carga (padrão AD-P4) */
    .hero__event{display:inline-flex;align-items:center;gap:12px;margin-top:16px;
      font-family:var(--font-display);font-weight:700;font-size:18px;color:var(--ciano);letter-spacing:.01em}
    .hero__event .sep{width:5px;height:5px;border-radius:50%;background:var(--muted);flex:none}
    /* Selos + badge de empenho */
    .hero__seals{flex-wrap:wrap;gap:10px}
    .seal--empenho{background:linear-gradient(160deg,#F8C23E,#EC9711)!important;color:#20160A!important;
      border-color:transparent!important;font-weight:800}
    .seal--empenho .ck{color:#20160A!important}
    /* Card de captura (reaproveita .form-card do financas.css) */
    .cap-card{max-width:660px;margin-top:26px}
    .cap-card h3{font-family:var(--font-display)}
    .cap-fine{font-size:12.5px;color:var(--muted);text-align:center;margin-top:12px}
    /* Seção de captura no meio da página */
    .cap-sec .wrap{max-width:780px}
    .cap-sec .cap-card{margin:0 auto}
    /* Bloco de "valores na programação" (investimento sem preço) */
    .invest-note{max-width:720px;margin:0 auto;text-align:center}
  </style>

  {{-- ============ NAV ============ --}}
  <nav class="nav">
    <div class="wrap nav__inner">
      <div class="nav__brand">
        <img src="{{ asset('img/seminarios/financas/emblem.png') }}" alt="Finanças Municipais" style="height:30px">
        <span class="sep"></span>
        <span class="tag">Seminário Finanças Municipais</span>
      </div>
      <a href="#form" class="nav__cta">Receber a programação</a>
    </div>
  </nav>

  {{-- ============ 1. HERO (captura acima da dobra) ============ --}}
  <header class="hero">
    <div class="hero__grid"></div>
    <div class="hero__photo ph">
      <img src="{{ asset('img/seminarios/financas/img-evento-cheio.jpg') }}" alt="Seminário Finanças Municipais">
    </div>
    <div class="hero__scrim"></div>
    <div class="wrap hero__inner">
      <span class="badge badge--orange">Imersão presencial · 20 a 23 de outubro · Vagas limitadas</span>

      <h1>Sua <span class="cy">tesouraria</span> e sua <span class="cy">contabilidade</span> não fecham?</h1>

      <p class="hero__sub">Sincronização híbrida na Tesouraria e Contabilidade</p>
      <p class="hero__desc">Quatro dias de imersão para o financeiro municipal bater o caixa com a contabilidade — do empenho ao pagamento, com a Reforma Tributária e a tecnologia aplicadas à realidade da sua prefeitura.</p>

      <p class="hero__event">
        <span>20/10</span><span class="sep"></span><span>Curitiba/PR</span><span class="sep"></span><span>17h de carga horária</span>
      </p>

      <div class="hero__seals">
        <span class="seal seal--empenho"><span class="ck">✓</span> Aceitamos nota de empenho</span>
        <span class="seal"><span class="ck">✓</span> Certificação reconhecida pelo MEC</span>
        <span class="seal"><span class="ck">✓</span> Material didático incluso</span>
      </div>

      {{-- FORMULÁRIO DE CAPTURA #1 (hero) --}}
      @include('seminarios._captura', [
        'anchor' => 'form', 'pfx' => 'h',
        'titulo' => 'Receba a programação completa',
        'sub' => 'Programação completa em PDF + modelo pronto de justificativa para empenho — o material que você leva ao gestor. Enviamos no seu e-mail e WhatsApp.',
      ])

      <div class="cobrand">
        <span>Realização</span>
        <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
        <img src="{{ asset('img/logo-unypublica-white.png') }}" alt="Faculdade Unypública">
      </div>
    </div>

    {{-- Barra de destaques --}}
    <div class="hero__stats">
      <div class="wrap hero__stats-inner">
        <div class="stat"><span class="stat__num">4</span><span class="stat__lbl">Dias de imersão</span></div>
        <div class="stat"><span class="stat__num">6</span><span class="stat__lbl">Painéis temáticos</span></div>
        <div class="stat"><span class="stat__num">5</span><span class="stat__lbl">Especialistas</span></div>
        <div class="stat"><span class="stat__num">✓</span><span class="stat__lbl">Certificado MEC</span></div>
      </div>
    </div>
  </header>

  {{-- ============ 2. POR QUE PARTICIPAR ============ --}}
  <section class="section section--alt why">
    <div class="wrap">
      <div class="sec-head">
        <span class="kicker">Por que participar</span>
        <h2>Uma imersão pensada para a realidade do financeiro municipal</h2>
        <p>Tesouraria, contabilidade e arrecadação falando a mesma língua. Aqui você aprende a operar as finanças do município com segurança, eficiência e conformidade — do empenho ao pagamento.</p>
      </div>
      <div class="cards3">
        <article class="fcard">
          <div class="fcard__icon">@includeIf('seminarios.icons.chart', ['size' => 26])</div>
          <h3>Do empenho ao pagamento</h3>
          <p>Operação de tesouraria com checklists de segurança, cronograma de desembolso e gestão de restos a pagar, prontos para auditorias e Tribunais de Contas.</p>
        </article>
        <article class="fcard">
          <div class="fcard__icon">@includeIf('seminarios.icons.target', ['size' => 26])</div>
          <h3>Reforma Tributária</h3>
          <p>O que muda na rotina do financeiro municipal, o impacto nas receitas para 2026 e a governança necessária para a transição.</p>
        </article>
        <article class="fcard">
          <div class="fcard__icon">@includeIf('seminarios.icons.shield-check', ['size' => 26])</div>
          <h3>IA e conciliação em tempo real</h3>
          <p>Automação amiga, dashboards de indicadores, segurança cibernética e conciliação bancária diária para bater o caixa com a contabilidade.</p>
        </article>
      </div>
      <div class="sec-cta">
        <a href="#form-2" class="btn btn--cyan">Receber a programação <span class="arrow">→</span></a>
      </div>
    </div>
  </section>

  {{-- ============ 3. A EXPERIÊNCIA (bento) ============ --}}
  <section class="section exp">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head">
        <span class="kicker">A Experiência</span>
        <h2>Muito além de uma sala de aula</h2>
        <p>Quatro dias de conteúdo técnico de alto nível em um ambiente preparado para grandes encontros — com networking entre tesourarias, gastronomia e momentos para celebrar.</p>
      </div>
      <div class="exp-grid">
        <article class="exp-item exp-feature">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/financas/img-show.jpg') }}" alt="Imersão presencial de alto nível">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.star', ['size' => 22])</span>
            <h3>Imersão presencial de alto nível</h3>
            <p>Aulas em um espaço preparado para grandes apresentações, com estrutura de palco, som e iluminação profissionais — no coração de Curitiba.</p>
          </div>
        </article>
        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/financas/img-networking.jpg') }}" alt="Almoço com networking">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.utensils', ['size' => 22])</span>
            <h3>Almoço com networking</h3>
            <p>Troque experiências com tesoureiros, contadores e controladores de outras prefeituras.</p>
          </div>
        </article>
        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/financas/img-coquetel.jpg') }}" alt="Coquetel de boas-vindas">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.glass', ['size' => 22])</span>
            <h3>Coquetel de boas-vindas</h3>
            <p>Um brinde de abertura para começar a imersão criando conexões.</p>
          </div>
        </article>
        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/financas/img-tutoria.jpg') }}" alt="Tutoria com os especialistas">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.graduation', ['size' => 22])</span>
            <h3>Tutoria com os especialistas</h3>
            <p>Acesso direto às referências da área para tirar dúvidas da sua tesouraria.</p>
          </div>
        </article>
        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/financas/img-musica.jpg') }}" alt="Coffee com música ao vivo">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.coffee', ['size' => 22])</span>
            <h3>Coffee com música ao vivo</h3>
            <p>Pausas com café gourmet e música ao vivo entre os painéis.</p>
          </div>
        </article>
      </div>
      <div class="sec-cta">
        <a href="#form-2" class="btn btn--cyan">Receber a programação <span class="arrow">→</span></a>
      </div>
    </div>
  </section>

  {{-- ============ 4. BENEFÍCIOS ============ --}}
  <section class="section beneficios">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Benefícios</span>
        <h2>Tudo o que está incluso na sua inscrição</h2>
        <p>Uma experiência completa, do conteúdo técnico à certificação.</p>
      </div>
      <div class="ben-grid">
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.gift', ['size' => 24])</div><h3>Brindes exclusivos</h3><p>Itens personalizados do evento entregues no credenciamento.</p></article>
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.award', ['size' => 24])</div><h3>Certificação reconhecida pelo MEC</h3><p>Certificado emitido pela Faculdade Unypública.</p></article>
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.star', ['size' => 24])</div><h3>Mentoria</h3><p>Acompanhamento dos docentes durante toda a imersão.</p></article>
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.users-group', ['size' => 24])</div><h3>Docentes especialistas</h3><p>Profissionais com atuação real nas finanças públicas municipais.</p></article>
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.coffee', ['size' => 24])</div><h3>Coffee break gourmet</h3><p>Pausas com café e gastronomia entre os painéis.</p></article>
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.graduation', ['size' => 24])</div><h3>Um semestre de EAD</h3><p>Acesso a um semestre de ensino a distância na Faculdade Unypública.</p></article>
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.file', ['size' => 24])</div><h3>Materiais em PDF</h3><p>Apostilas, checklists e templates prontos para a rotina do financeiro.</p></article>
        <article class="ben"><div class="ben__icon">@includeIf('seminarios.icons.package', ['size' => 24])</div><h3>Kit personalizado</h3><p>Kit do participante com os materiais do seminário.</p></article>
      </div>
      <div class="sec-cta">
        <a href="#form-2" class="btn btn--cyan">Receber a programação <span class="arrow">→</span></a>
      </div>
    </div>
  </section>

  {{-- ============ 5. PROGRAMAÇÃO ============ --}}
  <section class="section section--alt prog">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head">
        <span class="kicker">Programação</span>
        <h2>A ementa, painel por painel</h2>
        <p>De 20 a 23 de outubro de 2026 — cinco especialistas conduzem a jornada completa: da nova gestão financeira à tesouraria e conciliação bancária, com tecnologia, segurança e soft skills.</p>
      </div>
      <div class="prog-days">
        <div class="day-group">
          <div class="day-group__label"><span>20/10</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head"><h3>Abertura · A Nova Gestão Financeira: Desafios e Oportunidades</h3><span class="panel__time">Paulo Feijó · 14h–15h20</span></div>
              <ul class="panel__topics">
                <li>Panorama econômico e o impacto nas receitas municipais para 2026.</li>
                <li>A transição para a Reforma Tributária: o que muda na rotina do financeiro.</li>
              </ul>
            </article>
            <article class="panel">
              <div class="panel__head"><h3>Integração Multifacetária nas Finanças do Município</h3><span class="panel__time">Paulo Feijó · 15h40–17h</span></div>
              <ul class="panel__topics">
                <li>Falar a mesma língua é fundamental: Tesouraria, Contabilidade e Tributação.</li>
                <li>Governança e planejamento: eficiência, eficácia e proteção.</li>
              </ul>
            </article>
          </div>
        </div>
        <div class="day-group">
          <div class="day-group__label"><span>21/10</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head"><h3>Operação Tesouraria — Do Empenho ao Pagamento</h3><span class="panel__time">Marcia Del Valle · 14h–17h</span></div>
              <ul class="panel__topics">
                <li>Checklists de segurança: o que conferir antes de apertar o botão de “pagar”.</li>
                <li>Cronograma mensal de desembolso: evitando o sufoco de fim de mês.</li>
                <li>Gestão de restos a pagar e despesas de exercícios anteriores.</li>
                <li>Organização de processos e documentos para auditorias e Tribunais de Contas.</li>
                <li>Laboratório do Erro: “O empenho que não foi pago”.</li>
              </ul>
            </article>
          </div>
        </div>
        <div class="day-group">
          <div class="day-group__label"><span>22/10</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head"><h3>Conciliação Bancária e Controle de Disponibilidades</h3><span class="panel__time">Nilson Tognato · 09h–12h</span></div>
              <ul class="panel__topics">
                <li>Técnica de conciliação diária: identificando divergências em tempo real.</li>
                <li>Gestão de contas específicas e convênios: como não misturar recursos vinculados.</li>
                <li>Aplicações financeiras e rendimentos: segurança e rentabilidade pública.</li>
                <li>O fechamento do caixa: ferramentas práticas para bater com a contabilidade.</li>
                <li>Exercício rápido: “Encontre o erro na conciliação”.</li>
              </ul>
            </article>
            <article class="panel">
              <div class="panel__head"><h3>Tecnologia e Inovação no Setor Financeiro</h3><span class="panel__time">Daniel Bueno · 14h–17h</span></div>
              <ul class="panel__topics">
                <li>Inteligência Artificial aplicada: automação amiga e combate ao retrabalho.</li>
                <li>Segurança cibernética na Tesouraria: prevenção a fraudes e ataques bancários.</li>
                <li>Dashboards de indicadores: saúde financeira em gráficos.</li>
                <li>O fim do papel: processo 100% digital no fluxo de pagamentos.</li>
                <li>Sessão de compromisso: “O que vou implementar na minha tesouraria?”.</li>
              </ul>
            </article>
          </div>
        </div>
        <div class="day-group">
          <div class="day-group__label"><span>23/10</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head"><h3>Encerramento · Soft Skills e Orientações Estratégicas</h3><span class="panel__time">Éderson Paz · 09h–11h</span></div>
              <ul class="panel__topics">
                <li>O perfil dos novos operadores: de executor a analista de dados.</li>
                <li>Lifelong Learning e Upskilling: habilidades como fator de eficiência e risco zero.</li>
                <li>Compliance e blindagem dos envolvidos.</li>
                <li>Liderança e gestão de conflitos em ambientes sob pressão financeira.</li>
                <li>Como convencer o gestor a investir em automação — case com ROI calculado.</li>
              </ul>
            </article>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- ============ CAPTURA #2 (fim da ementa) ============ --}}
  <section class="section section--alt cap-sec">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      @include('seminarios._captura', [
        'anchor' => 'form-2', 'pfx' => 'e',
        'titulo' => 'Gostou da ementa? Receba a programação completa',
        'sub' => 'Todos os painéis em PDF + o modelo pronto de justificativa para empenho — no seu e-mail e WhatsApp.',
      ])
    </div>
  </section>

  {{-- ============ 6. PARA QUEM É ============ --}}
  <section class="section who">
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Para quem é</span>
        <h2>Feito para quem opera as finanças do município</h2>
      </div>
      <div class="who__grid">
        <div class="pcard"><span class="pcard__ic">@includeIf('seminarios.icons.chart', ['size' => 22])</span><span>Tesoureiros municipais</span></div>
        <div class="pcard"><span class="pcard__ic">@includeIf('seminarios.icons.file', ['size' => 22])</span><span>Contadores públicos</span></div>
        <div class="pcard"><span class="pcard__ic">@includeIf('seminarios.icons.shield-check', ['size' => 22])</span><span>Controladores internos</span></div>
        <div class="pcard"><span class="pcard__ic">@includeIf('seminarios.icons.award', ['size' => 22])</span><span>Secretários de Finanças</span></div>
        <div class="pcard"><span class="pcard__ic">@includeIf('seminarios.icons.users-group', ['size' => 22])</span><span>Equipes de arrecadação</span></div>
        <div class="pcard"><span class="pcard__ic">@includeIf('seminarios.icons.star', ['size' => 22])</span><span>Gestores públicos e prefeituras</span></div>
      </div>
      <div class="sec-cta">
        <a href="#form-3" class="btn btn--cyan">Receber a programação <span class="arrow">→</span></a>
      </div>
    </div>
  </section>

  {{-- ============ 7. GALERIA / PROVA SOCIAL ============ --}}
  <section class="section section--alt gallery">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Galeria</span>
        <h2>Como são os seminários da Unyflex</h2>
      </div>
      <div class="gallery__grid">
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/financas/img-palco.jpg') }}" alt="Apresentação no palco"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/financas/img-musica.jpg') }}" alt="Música ao vivo"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/financas/img-networking.jpg') }}" alt="Networking entre participantes"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/financas/img-coquetel.jpg') }}" alt="Coquetel"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/financas/img-coffee-break.jpg') }}" alt="Coffee break"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/financas/img-tutoria.jpg') }}" alt="Tutoria com os docentes"></div>
      </div>
      <div class="quote">
        <span class="quote__mark">“</span>
        <blockquote>Saí com checklists prontos e um plano para reorganizar a tesouraria e a conciliação da prefeitura. Valeu cada minuto.</blockquote>
        <cite>— Participante de edição anterior, Secretaria de Finanças Municipal</cite>
      </div>
      <div class="sec-cta">
        <a href="#form-3" class="btn btn--cyan">Receber a programação <span class="arrow">→</span></a>
      </div>
    </div>
  </section>

  {{-- ============ 8. DOCENTES ============ --}}
  <section class="section docentes">
    <div class="section__grid-bg"></div>
    <style>
      .docentes .doc-grid{display:grid;gap:20px;grid-template-columns:repeat(2,1fr);margin-top:46px}
      @media(min-width:680px){.docentes .doc-grid{grid-template-columns:repeat(3,1fr)}}
      @media(min-width:1024px){.docentes .doc-grid{grid-template-columns:repeat(3,1fr);gap:18px}}
      .docentes .doc-card{position:relative;display:flex;flex-direction:column;background:rgba(255,255,255,.04);
        border:1px solid rgba(242,160,22,.16);border-radius:16px;overflow:hidden;transition:transform .35s ease,border-color .35s ease,box-shadow .35s ease}
      .docentes .doc-card:hover{transform:translateY(-6px);border-color:rgba(242,160,22,.55);box-shadow:0 24px 50px rgba(0,0,0,.45)}
      .docentes .doc-card__media{position:relative;aspect-ratio:4/5;overflow:hidden}
      .docentes .doc-card__media img{width:100%;height:100%;object-fit:cover;filter:grayscale(100%) contrast(1.03) brightness(.9);transition:filter .45s ease,transform .6s ease}
      .docentes .doc-card:hover .doc-card__media img{filter:none;transform:scale(1.05)}
      .docentes .doc-card__media::after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,rgba(14,11,6,0) 42%,rgba(14,11,6,.9) 100%)}
      .docentes .doc-card__idx{position:absolute;top:11px;left:12px;z-index:2;font-family:'Bricolage Grotesque',sans-serif;font-size:12px;font-weight:700;letter-spacing:.1em;color:#F2A016;background:rgba(14,11,6,.5);backdrop-filter:blur(4px);padding:3px 9px;border-radius:999px;border:1px solid rgba(242,160,22,.3)}
      .docentes .doc-card__name{position:absolute;left:14px;right:14px;bottom:13px;z-index:2}
      .docentes .doc-card__name h3{font-family:'Bricolage Grotesque',sans-serif;color:#fff;font-size:18px;line-height:1.14;margin:0 0 4px}
      .docentes .doc-card__role{display:inline-block;font-size:11px;text-transform:uppercase;letter-spacing:.12em;color:#F2A016;font-weight:600}
      .docentes .doc-card__body{padding:15px 15px 18px;display:flex;flex-direction:column;gap:9px}
      .docentes .doc-q{position:relative;margin:0;padding-left:18px;font-size:13px;line-height:1.42;color:#E7DFD0}
      .docentes .doc-q::before{content:"";position:absolute;left:0;top:6px;width:7px;height:7px;background:#F2A016;transform:rotate(45deg)}
      .docentes .doc-badge{position:absolute;top:11px;right:12px;z-index:2;font-family:'Bricolage Grotesque',sans-serif;font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#1A1207;background:linear-gradient(160deg,#F8C23E,#EC9711);padding:4px 10px;border-radius:999px}
    </style>
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Corpo docente</span>
        <h2>Quem vai te ensinar</h2>
        <p>Especialistas que operam, na prática, as finanças municipais — da nova gestão financeira e arrecadação à tesouraria, conciliação bancária, tecnologia e liderança.</p>
      </div>
      <div class="doc-grid">
        <article class="doc-card">
          <div class="doc-card__media"><span class="doc-card__idx">01</span><span class="doc-badge">Destaque</span>
            <img src="{{ asset('img/seminarios/financas/doc-paulofeijo.jpg') }}" alt="Paulo Feijó" loading="lazy">
            <div class="doc-card__name"><h3>Paulo Feijó</h3><span class="doc-card__role">Nova Gestão Financeira</span></div></div>
          <div class="doc-card__body">
            <p class="doc-q">Abertura do seminário · Reforma Tributária</p>
            <p class="doc-q">Panorama econômico e receitas municipais para 2026</p>
            <p class="doc-q">Governança e integração do financeiro do município</p></div>
        </article>
        <article class="doc-card">
          <div class="doc-card__media"><span class="doc-card__idx">02</span>
            <img src="{{ asset('img/seminarios/financas/doc-marcia.jpg') }}" alt="Marcia Del Valle" loading="lazy">
            <div class="doc-card__name"><h3>Marcia Del Valle</h3><span class="doc-card__role">Tesouraria &amp; Pagamentos</span></div></div>
          <div class="doc-card__body">
            <p class="doc-q">Operação de tesouraria do empenho ao pagamento</p>
            <p class="doc-q">Restos a pagar e cronograma de desembolso</p>
            <p class="doc-q">Processos e documentos para Tribunais de Contas</p></div>
        </article>
        <article class="doc-card">
          <div class="doc-card__media"><span class="doc-card__idx">03</span>
            <img src="{{ asset('img/seminarios/financas/doc-nilson.jpg') }}" alt="Nilson Tognato" loading="lazy">
            <div class="doc-card__name"><h3>Nilson Tognato</h3><span class="doc-card__role">Conciliação Bancária</span></div></div>
          <div class="doc-card__body">
            <p class="doc-q">Conciliação diária e controle de disponibilidades</p>
            <p class="doc-q">Recursos vinculados, convênios e aplicações</p>
            <p class="doc-q">Fechamento de caixa junto à contabilidade</p></div>
        </article>
        <article class="doc-card">
          <div class="doc-card__media"><span class="doc-card__idx">04</span>
            <img src="{{ asset('img/seminarios/financas/doc-daniel.jpg') }}" alt="Daniel Bueno" loading="lazy">
            <div class="doc-card__name"><h3>Daniel Bueno</h3><span class="doc-card__role">Tecnologia &amp; Inovação</span></div></div>
          <div class="doc-card__body">
            <p class="doc-q">IA aplicada à tesouraria e combate ao retrabalho</p>
            <p class="doc-q">Segurança cibernética e prevenção a fraudes</p>
            <p class="doc-q">Dashboards e processo de pagamentos 100% digital</p></div>
        </article>
        <article class="doc-card">
          <div class="doc-card__media"><span class="doc-card__idx">05</span>
            <img src="{{ asset('img/seminarios/financas/doc-eder.jpg') }}" alt="Éderson Paz" loading="lazy">
            <div class="doc-card__name"><h3>Éderson Paz</h3><span class="doc-card__role">Soft Skills &amp; Estratégia</span></div></div>
          <div class="doc-card__body">
            <p class="doc-q">De executor a analista de dados: o novo perfil</p>
            <p class="doc-q">Compliance e liderança sob pressão financeira</p>
            <p class="doc-q">ROI de automação e upskilling da equipe</p></div>
        </article>
      </div>
    </div>
  </section>

  {{-- ============ CAPTURA #3 (fim dos professores) ============ --}}
  <section class="section cap-sec">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      @include('seminarios._captura', [
        'anchor' => 'form-3', 'pfx' => 'd',
        'titulo' => 'Leve a programação ao seu gestor',
        'sub' => 'Programação completa em PDF + modelo pronto de justificativa para empenho — o material que formaliza a inscrição via nota de empenho.',
      ])
    </div>
  </section>

  {{-- ============ 9. INVESTIMENTO (sem preço na primeira exposição) ============ --}}
  <section class="section invest" id="inscricao">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head is-center invest-note">
        <span class="badge badge--orange" style="margin-bottom:14px">Aceitamos nota de empenho</span>
        <span class="kicker is-center">Investimento</span>
        <h2>Valores e condições de empenho na programação completa</h2>
        <p>Enviamos a tabela de planos, as condições de parcelamento e o modelo pronto de justificativa para empenho no material completo — direto no seu e-mail e WhatsApp. Um consultor acompanha o processo pelo WhatsApp depois.</p>
      </div>
      <div class="sec-cta">
        <a href="#form" class="btn btn--cyan">Receber a programação <span class="arrow">→</span></a>
      </div>
    </div>
  </section>

  {{-- ============ 10. FOOTER ============ --}}
  <footer class="footer">
    <div class="wrap">
      <div class="sec-cta" style="margin-top:0;margin-bottom:38px">
        <a href="#form" class="btn btn--cyan">Receber a programação <span class="arrow">→</span></a>
      </div>
    </div>
    <div class="wrap footer__inner">
      <div class="footer__brand">
        <div class="footer__brands">
          <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
          <img src="{{ asset('img/logo-unypublica-white.png') }}" alt="Faculdade Unypública">
        </div>
        <p>Seminário Finanças Municipais · Sincronização híbrida na Tesouraria e Contabilidade. Realização: Unyflex Digital · Faculdade Unypública.</p>
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

  {{-- ============ MÁSCARA WHATSAPP (todos os campos .cap-tel) ============ --}}
  <script>
    (function () {
      function mascaraWhats(v){
        v = v.replace(/\D/g,'').slice(0,11);
        v = v.replace(/(\d{2})(\d)/,'($1) $2');
        v = v.replace(/(\d{5})(\d)/,'$1-$2');
        return v;
      }
      document.querySelectorAll('.cap-tel').forEach(function(tel){
        tel.addEventListener('input', function(){ this.value = mascaraWhats(this.value); });
        tel.value = mascaraWhats(tel.value);
      });
    })();
  </script>

  {{-- ============ UTMs → CAMPOS OCULTOS (todos os formulários .cap-form) ============ --}}
  <script>
    (function () {
      var CAMPOS = ['utm_source','utm_medium','utm_campaign','utm_id','utm_term','utm_content','fbclid'];
      document.querySelectorAll('.cap-form').forEach(function (form) {
        form.addEventListener('submit', function () {
          var params = new URLSearchParams(window.location.search);
          CAMPOS.forEach(function (chave) {
            var input = form.querySelector('[name="' + chave + '"]');
            if (input) input.value = params.get(chave) || '';
          });
        });
      });
    })();
  </script>

@endsection
