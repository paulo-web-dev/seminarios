@extends('layouts.financas')

@section('title', 'Seminário Finanças Municipais · Tesouraria e Contabilidade · 20 a 23 de outubro · Curitiba')
@section('description', 'Imersão presencial de quatro dias em finanças municipais: tesouraria, contabilidade, arrecadação, conciliação bancária, tecnologia e Reforma Tributária. 20 a 23 de outubro de 2026, no Centro de Curitiba. Realização Unyflex.')


@push('head')
  {{-- ============ META PIXEL (base: init + PageView) ============
       Injetado no <head> do layout via @stack('head'). Carrega nesta LP.
       O evento "Lead" (conversão) NÃO fica aqui — fica na página de obrigado. --}}
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
    .sec-cta{display:flex;justify-content:center;margin-top:44px}
    .sec-cta .btn{min-width:264px;justify-content:center}
    @media(max-width:560px){.sec-cta .btn{width:100%}}
    .hero__emblem{height:72px;width:auto;margin-bottom:18px;filter:drop-shadow(0 8px 18px rgba(0,0,0,.5))}
    .panel__time{color:var(--ciano)}
    /* Hero visual: foto de fundo mais presente + scrim para legibilidade */
    .hero__photo{opacity:.30}
    .hero__scrim{position:absolute;inset:0;pointer-events:none;
      background:linear-gradient(92deg, rgba(12,10,6,.90) 0%, rgba(12,10,6,.66) 44%, rgba(12,10,6,.30) 100%),
                 linear-gradient(180deg, rgba(12,10,6,.15) 60%, rgba(12,10,6,.72) 100%)}
    /* Vitrine de fotos reais dos eventos anteriores */
    .hero__shots{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:32px;max-width:720px}
    .hero__shots figure{position:relative;margin:0;border-radius:14px;overflow:hidden;
      border:1px solid rgba(242,160,22,.38);aspect-ratio:16/10;
      box-shadow:0 16px 36px rgba(0,0,0,.5)}
    .hero__shots img{width:100%;height:100%;object-fit:cover;transition:transform .5s var(--ease-out)}
    .hero__shots figure:hover img{transform:scale(1.06)}
    .hero__shots figcaption{position:absolute;left:0;right:0;bottom:0;padding:20px 12px 9px;
      font-family:var(--font-display);font-weight:600;font-size:12.5px;color:#fff;
      background:linear-gradient(180deg,transparent,rgba(12,10,6,.88))}
    .hero__shots-lbl{display:block;margin:26px 0 0;font-family:var(--font-display);font-weight:600;
      font-size:12px;text-transform:uppercase;letter-spacing:.14em;color:var(--ciano)}
    @media(max-width:600px){
      .hero__shots{grid-template-columns:1fr 1fr;gap:10px}
      .hero__shots figure:last-child{grid-column:1 / -1;aspect-ratio:16/9}
    }
  </style>

  {{-- ============ NAV ============ --}}
  <nav class="nav">
    <div class="wrap nav__inner">
      <div class="nav__brand">
        <img src="{{ asset('img/seminarios/financas/emblem.png') }}" alt="Finanças Municipais" style="height:30px">
        <span class="sep"></span>
        <span class="tag">Seminário Finanças Municipais</span>
      </div>
      <a href="#form" class="nav__cta">Garantir vaga</a>
    </div>
  </nav>

  {{-- ============ 1. HERO ============ --}}
  <header class="hero">
    <div class="hero__grid"></div>
    <div class="hero__photo ph">
      <img src="{{ asset('img/seminarios/financas/img-evento-cheio.jpg') }}" alt="Seminário Finanças Municipais">
    </div>
    <div class="hero__scrim"></div>
    <div class="wrap hero__inner">
      <img class="hero__emblem" src="{{ asset('img/seminarios/financas/emblem.png') }}" alt="Seminário Finanças Municipais">
      <span class="badge badge--orange">Imersão presencial · 20 a 23 de outubro · Vagas limitadas</span>

      <h1><span class="cy">Finanças</span> Municipais</h1>

      <p class="hero__sub">Sincronização híbrida na Tesouraria e Contabilidade</p>
      <p class="hero__desc">Quatro dias de imersão para o financeiro municipal dominar tesouraria, contabilidade, arrecadação e conciliação — do empenho ao pagamento, com tecnologia, segurança e a Reforma Tributária aplicadas à realidade das prefeituras.</p>

      <div class="hero__seals">
        <span class="seal"><span class="ck">✓</span> Certificação reconhecida pelo MEC</span>
        <span class="seal"><span class="ck">✓</span> Material didático incluso</span>
        <span class="seal"><span class="ck">✓</span> No Centro de Curitiba</span>
      </div>

      <div class="hero__cta">
        <a href="#form" class="btn btn--cyan">Garantir minha vaga <span class="arrow">→</span></a>
        <span class="hero__meta">Presencial · 20 a 23 de outubro de 2026 · Centro de Curitiba/PR</span>
      </div>

      <div class="cobrand">
        <span>Realização</span>
        <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
        <img src="{{ asset('img/logo-unypublica-white.png') }}" alt="Faculdade Unypública">
      </div>

      <span class="hero__shots-lbl">Como são os nossos seminários</span>
      <div class="hero__shots">
        <figure>
          <img src="{{ asset('img/seminarios/financas/img-networking.jpg') }}" alt="Networking entre participantes">
          <figcaption>Networking de alto nível</figcaption>
        </figure>
        <figure>
          <img src="{{ asset('img/seminarios/financas/img-coffee-break.jpg') }}" alt="Coffee break gourmet">
          <figcaption>Coffee gourmet</figcaption>
        </figure>
        <figure>
          <img src="{{ asset('img/seminarios/financas/img-coquetel.jpg') }}" alt="Coquetel de boas-vindas">
          <figcaption>Coquetel</figcaption>
        </figure>
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
        <a href="#form" class="btn btn--cyan">Quero participar dessa imersão <span class="arrow">→</span></a>
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
        <a href="#form" class="btn btn--cyan">Garantir minha vaga na imersão <span class="arrow">→</span></a>
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
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.gift', ['size' => 24])</div>
          <h3>Brindes exclusivos</h3>
          <p>Itens personalizados do evento entregues no credenciamento.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.award', ['size' => 24])</div>
          <h3>Certificação reconhecida pelo MEC</h3>
          <p>Certificado emitido pela Faculdade Unypública.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.star', ['size' => 24])</div>
          <h3>Mentoria</h3>
          <p>Acompanhamento dos docentes durante toda a imersão.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.users-group', ['size' => 24])</div>
          <h3>Docentes especialistas</h3>
          <p>Profissionais com atuação real nas finanças públicas municipais.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.coffee', ['size' => 24])</div>
          <h3>Coffee break gourmet</h3>
          <p>Pausas com café e gastronomia entre os painéis.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.graduation', ['size' => 24])</div>
          <h3>Um semestre de EAD</h3>
          <p>Acesso a um semestre de ensino a distância na Faculdade Unypública.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.file', ['size' => 24])</div>
          <h3>Materiais em PDF</h3>
          <p>Apostilas, checklists e templates prontos para a rotina do financeiro.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.package', ['size' => 24])</div>
          <h3>Kit personalizado</h3>
          <p>Kit do participante com os materiais do seminário.</p>
        </article>
      </div>
      <div class="sec-cta">
        <a href="#form" class="btn btn--cyan">Quero todos esses benefícios <span class="arrow">→</span></a>
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
              <div class="panel__head">
                <h3>Abertura · A Nova Gestão Financeira: Desafios e Oportunidades</h3>
                <span class="panel__time">Paulo Feijó · 14h–15h20</span>
              </div>
              <ul class="panel__topics">
                <li>Panorama econômico e o impacto nas receitas municipais para 2026.</li>
                <li>A transição para a Reforma Tributária: o que muda na rotina do financeiro.</li>
              </ul>
            </article>
            <article class="panel">
              <div class="panel__head">
                <h3>Integração Multifacetária nas Finanças do Município</h3>
                <span class="panel__time">Paulo Feijó · 15h40–17h</span>
              </div>
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
              <div class="panel__head">
                <h3>Operação Tesouraria — Do Empenho ao Pagamento</h3>
                <span class="panel__time">Marcia Del Valle · 14h–17h</span>
              </div>
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
              <div class="panel__head">
                <h3>Conciliação Bancária e Controle de Disponibilidades</h3>
                <span class="panel__time">Nilson Tognato · 09h–12h</span>
              </div>
              <ul class="panel__topics">
                <li>Técnica de conciliação diária: identificando divergências em tempo real.</li>
                <li>Gestão de contas específicas e convênios: como não misturar recursos vinculados.</li>
                <li>Aplicações financeiras e rendimentos: segurança e rentabilidade pública.</li>
                <li>O fechamento do caixa: ferramentas práticas para bater com a contabilidade.</li>
                <li>Exercício rápido: “Encontre o erro na conciliação”.</li>
              </ul>
            </article>
            <article class="panel">
              <div class="panel__head">
                <h3>Tecnologia e Inovação no Setor Financeiro</h3>
                <span class="panel__time">Marcelo Zimmer · 14h–17h</span>
              </div>
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
              <div class="panel__head">
                <h3>Encerramento · Soft Skills e Orientações Estratégicas</h3>
                <span class="panel__time">Éderson Paz · 09h–11h</span>
              </div>
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
      <div class="sec-cta">
        <a href="#form" class="btn btn--cyan">Garantir minha vaga <span class="arrow">→</span></a>
      </div>
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
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.chart', ['size' => 22])</span>
          <span>Tesoureiros municipais</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.file', ['size' => 22])</span>
          <span>Contadores públicos</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.shield-check', ['size' => 22])</span>
          <span>Controladores internos</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.award', ['size' => 22])</span>
          <span>Secretários de Finanças</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.users-group', ['size' => 22])</span>
          <span>Equipes de arrecadação</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.star', ['size' => 22])</span>
          <span>Gestores públicos e prefeituras</span>
        </div>
      </div>
      <div class="sec-cta">
        <a href="#form" class="btn btn--cyan">É pra mim — quero me inscrever <span class="arrow">→</span></a>
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
        — Participante de edição anterior, Secretaria de Finanças Municipal
      </div>
      <div class="sec-cta">
        <a href="#form" class="btn btn--cyan">Quero fazer parte da próxima edição <span class="arrow">→</span></a>
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
        border:1px solid rgba(242,160,22,.16);border-radius:16px;overflow:hidden;
        transition:transform .35s ease,border-color .35s ease,box-shadow .35s ease}
      .docentes .doc-card:hover{transform:translateY(-6px);border-color:rgba(242,160,22,.55);box-shadow:0 24px 50px rgba(0,0,0,.45)}
      .docentes .doc-card__media{position:relative;aspect-ratio:4/5;overflow:hidden}
      .docentes .doc-card__media img{width:100%;height:100%;object-fit:cover;
        filter:grayscale(100%) contrast(1.03) brightness(.9);
        transition:filter .45s ease,transform .6s ease}
      .docentes .doc-card:hover .doc-card__media img{filter:none;transform:scale(1.05)}
      .docentes .doc-card__media::after{content:"";position:absolute;inset:0;
        background:linear-gradient(180deg,rgba(14,11,6,0) 42%,rgba(14,11,6,.9) 100%)}
      .docentes .doc-card__idx{position:absolute;top:11px;left:12px;z-index:2;
        font-family:'Bricolage Grotesque',sans-serif;font-size:12px;font-weight:700;letter-spacing:.1em;
        color:#F2A016;background:rgba(14,11,6,.5);backdrop-filter:blur(4px);
        padding:3px 9px;border-radius:999px;border:1px solid rgba(242,160,22,.3)}
      .docentes .doc-card__name{position:absolute;left:14px;right:14px;bottom:13px;z-index:2}
      .docentes .doc-card__name h3{font-family:'Bricolage Grotesque',sans-serif;color:#fff;
        font-size:18px;line-height:1.14;margin:0 0 4px}
      .docentes .doc-card__role{display:inline-block;font-size:11px;text-transform:uppercase;
        letter-spacing:.12em;color:#F2A016;font-weight:600}
      .docentes .doc-card__body{padding:15px 15px 18px;display:flex;flex-direction:column;gap:9px}
      .docentes .doc-q{position:relative;margin:0;padding-left:18px;font-size:13px;line-height:1.42;color:#E7DFD0}
      .docentes .doc-q::before{content:"";position:absolute;left:0;top:6px;width:7px;height:7px;
        background:#F2A016;transform:rotate(45deg)}
      .docentes .doc-badge{position:absolute;top:11px;right:12px;z-index:2;font-family:'Bricolage Grotesque',sans-serif;
        font-size:10.5px;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:#1A1207;
        background:linear-gradient(160deg,#F8C23E,#EC9711);padding:4px 10px;border-radius:999px}
    </style>

    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Corpo docente</span>
        <h2>Quem vai te ensinar</h2>
        <p>Especialistas que operam, na prática, as finanças municipais — da nova gestão financeira e arrecadação à tesouraria, conciliação bancária, tecnologia e liderança.</p>
      </div>

      <div class="doc-grid">

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">01</span>
            <span class="doc-badge">Destaque</span>
            <img src="{{ asset('img/seminarios/financas/doc-paulofeijo.jpg') }}" alt="Paulo Feijó" loading="lazy">
            <div class="doc-card__name">
              <h3>Paulo Feijó</h3>
              <span class="doc-card__role">Nova Gestão Financeira</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">Abertura do seminário · Reforma Tributária</p>
            <p class="doc-q">Panorama econômico e receitas municipais para 2026</p>
            <p class="doc-q">Governança e integração do financeiro do município</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">02</span>
            <img src="{{ asset('img/seminarios/financas/doc-marcia.jpg') }}" alt="Marcia Del Valle" loading="lazy">
            <div class="doc-card__name">
              <h3>Marcia Del Valle</h3>
              <span class="doc-card__role">Tesouraria &amp; Pagamentos</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">Operação de tesouraria do empenho ao pagamento</p>
            <p class="doc-q">Restos a pagar e cronograma de desembolso</p>
            <p class="doc-q">Processos e documentos para Tribunais de Contas</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">03</span>
            <img src="{{ asset('img/seminarios/financas/doc-nilson.jpg') }}" alt="Nilson Tognato" loading="lazy">
            <div class="doc-card__name">
              <h3>Nilson Tognato</h3>
              <span class="doc-card__role">Conciliação Bancária</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">Conciliação diária e controle de disponibilidades</p>
            <p class="doc-q">Recursos vinculados, convênios e aplicações</p>
            <p class="doc-q">Fechamento de caixa junto à contabilidade</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">04</span>
            <img src="{{ asset('img/seminarios/financas/doc-marcelo.jpg') }}" alt="Marcelo Zimmer" loading="lazy">
            <div class="doc-card__name">
              <h3>Marcelo Zimmer</h3>
              <span class="doc-card__role">Tecnologia &amp; Inovação</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">IA aplicada à tesouraria e combate ao retrabalho</p>
            <p class="doc-q">Segurança cibernética e prevenção a fraudes</p>
            <p class="doc-q">Dashboards e processo de pagamentos 100% digital</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">05</span>
            <img src="{{ asset('img/seminarios/financas/doc-eder.jpg') }}" alt="Éderson Paz" loading="lazy">
            <div class="doc-card__name">
              <h3>Éderson Paz</h3>
              <span class="doc-card__role">Soft Skills &amp; Estratégia</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">De executor a analista de dados: o novo perfil</p>
            <p class="doc-q">Compliance e liderança sob pressão financeira</p>
            <p class="doc-q">ROI de automação e upskilling da equipe</p>
          </div>
        </article>

      </div>
      <div class="sec-cta">
        <a href="#form" class="btn btn--cyan">Aprender com esses especialistas <span class="arrow">→</span></a>
      </div>
    </div>
  </section>

  {{-- ============ 9. INVESTIMENTO ============ --}}
  <section class="section invest" id="inscricao">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="badge badge--orange" style="margin-bottom:14px">Vagas limitadas</span>
        <span class="kicker is-center">Investimento</span>
        <h2>Escolha o plano ideal</h2>
        <p>Três formatos de participação para você aproveitar a imersão do seu jeito.</p>
      </div>

      <div class="plans">

        <div class="plan">
          <div class="plan__name">Plano 01</div>
          <div class="plan__price">R$ 3.300</div>
          <div class="plan__period">por participante</div>
          <ul class="plan__items">
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Acesso aos 4 dias de imersão</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Material didático em PDF</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Certificado reconhecido pelo MEC</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Coffee breaks gourmet</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Coquetel de encerramento</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Almoço de networking</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Kit personalizado + brindes</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Mentoria individual com os docentes</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Um semestre de EAD na Faculdade Unypública</span></li>
          </ul>
          <a href="#form" class="btn btn--outline">Falar com um consultor <span class="arrow">→</span></a>
        </div>

        <div class="plan">
          <div class="plan__name">Plano 02</div>
          <div class="plan__price">R$ 3.600</div>
          <div class="plan__period">por participante</div>
          <ul class="plan__items">
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Acesso aos 4 dias de imersão</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Material didático em PDF</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Certificado reconhecido pelo MEC</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Coffee breaks gourmet</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Coquetel de encerramento</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Almoço de networking</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Kit personalizado + brindes</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Mentoria individual com os docentes</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Um semestre de EAD na Faculdade Unypública</span></li>
          </ul>
          <a href="#form" class="btn btn--outline">Falar com um consultor <span class="arrow">→</span></a>
        </div>

        <div class="plan plan--feature">
          <span class="plan__tag badge badge--orange">Mais completo</span>
          <div class="plan__name">Plano 03</div>
          <div class="plan__price">R$ 3.900</div>
          <div class="plan__period">por participante</div>
          <ul class="plan__items">
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Acesso aos 4 dias de imersão</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Material didático em PDF</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Certificado reconhecido pelo MEC</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Coffee breaks gourmet</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Coquetel de encerramento</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Almoço de networking</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Kit personalizado + brindes</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Mentoria individual com os docentes</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Um semestre de EAD na Faculdade Unypública</span></li>
          </ul>
          <a href="#form" class="btn btn--cyan">Falar com um consultor <span class="arrow">→</span></a>
        </div>

      </div>
      <p class="invest__foot">Parcelamento facilitado e condições especiais para grupos e órgãos públicos. Fale com um consultor.</p>

      {{-- Formulário de inscrição --}}
      <div class="form-card" id="form">
        <h3>Fale com um consultor</h3>
        <p class="form-sub">Preencha os dados e nossa equipe entra em contato para garantir sua vaga.</p>

        <form id="form-inscricao" method="POST" action="{{ route('financas.inscricao') }}">
          @csrf

          {{-- Identifica esta LP e o seminário para o CRM/automação e para o redirect de obrigado. --}}
          <input type="hidden" name="lp_form_id" value="lp-financas">
          <input type="hidden" name="seminario_slug" value="financas-municipais">

          {{-- UTMs + fbclid (preenchidas por JS no submit). --}}
          <input type="hidden" name="utm_source"   id="utm_source">
          <input type="hidden" name="utm_medium"   id="utm_medium">
          <input type="hidden" name="utm_campaign" id="utm_campaign">
          <input type="hidden" name="utm_id"       id="utm_id">
          <input type="hidden" name="utm_term"     id="utm_term">
          <input type="hidden" name="utm_content"  id="utm_content">
          <input type="hidden" name="fbclid"       id="fbclid">

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
              <label for="telefone">WhatsApp *</label>
              <input type="text" id="telefone" name="telefone" value="{{ old('telefone') }}"
                     placeholder="(41) 90000-0000" inputmode="tel" maxlength="15" required>
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
            <div class="field--hp" aria-hidden="true">
              <label for="website">Não preencha este campo</label>
              <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn--cyan">Garantir minha vaga <span class="arrow">→</span></button>
          </div>
        </form>
      </div>
    </div>
  </section>

  {{-- ============ 10. FOOTER ============ --}}
  <footer class="footer">
    <div class="wrap">
      <div class="sec-cta" style="margin-top:0;margin-bottom:38px">
        <a href="#form" class="btn btn--cyan">Garantir minha vaga <span class="arrow">→</span></a>
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

  {{-- ============ MÁSCARA DO WHATSAPP ============ --}}
  <script>
    (function () {
      var tel = document.getElementById('telefone');
      if (!tel) return;
      function mascaraWhats(valor) {
        valor = valor.replace(/\D/g, '').slice(0, 11);
        valor = valor.replace(/(\d{2})(\d)/, '($1) $2');
        valor = valor.replace(/(\d{5})(\d)/, '$1-$2');
        return valor;
      }
      tel.addEventListener('input', function () { this.value = mascaraWhats(this.value); });
      tel.value = mascaraWhats(tel.value);
    })();
  </script>

{{-- ============ UTMs → CAMPOS OCULTOS DO FORM ============ --}}
<script>
  (function () {
    var form = document.getElementById('form-inscricao');
    if (!form) return;
    var CAMPOS = ['utm_source','utm_medium','utm_campaign','utm_id','utm_term','utm_content','fbclid'];
    form.addEventListener('submit', function () {
      var params = new URLSearchParams(window.location.search);
      CAMPOS.forEach(function (chave) {
        var input = document.getElementById(chave);
        if (input) input.value = params.get(chave) || '';
      });
    });
  })();
</script>

@endsection  