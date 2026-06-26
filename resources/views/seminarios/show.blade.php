@extends('layouts.seminario')

{{--
  ============================================================
  GovSocial — Landing 100% ESTÁTICA
  Todo o conteúdo está chumbado direto aqui no HTML.
  Para editar: mude os textos/preços direto nas tags abaixo.
  (Não depende mais de $seminario nem do banco.)
  Imagens apontam para public/img/seminarios/govsocial/ — ajuste
  os nomes dos arquivos para os que você realmente tem.
  ============================================================
--}}

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
    <div class="hero__photo ph">
      <img src="{{ asset('img/seminarios/govsocial/img-evento-cheio.jpg') }}" alt="Gestão de Mídias Sociais no Setor Público">
    </div>
    <div class="wrap hero__inner">
      <span class="badge badge--orange">Imersão presencial · 25 a 28 de agosto · Vagas limitadas</span>

      <h1>Gestão de <span class="cy">Mídias Sociais</span> no Setor Público</h1>

      <p class="hero__sub">Operação, Publicidade e LGPD</p>
      <p class="hero__desc">Quatro dias de imersão para quem comunica o setor público dominar a operação de redes sociais, a publicidade institucional e a conformidade com a LGPD — com aplicação prática na realidade de órgãos e prefeituras.</p>

      <div class="hero__seals">
        <span class="seal"><span class="ck">✓</span> Certificação reconhecida pelo MEC</span>
        <span class="seal"><span class="ck">✓</span> Material didático incluso</span>
        <span class="seal"><span class="ck">✓</span> Networking com gestores públicos</span>
      </div>

      <div class="hero__cta">
        <a href="#inscricao" class="btn btn--cyan">Garantir minha vaga <span class="arrow">→</span></a>
        <span class="hero__meta">Presencial · 25 a 28 de agosto de 2026</span>
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
        <div class="stat"><span class="stat__num">4</span><span class="stat__lbl">Dias de imersão</span></div>
        <div class="stat"><span class="stat__num">6</span><span class="stat__lbl">Painéis temáticos</span></div>
        <div class="stat"><span class="stat__num">∞</span><span class="stat__lbl">Networking</span></div>
        <div class="stat"><span class="stat__num">♪</span><span class="stat__lbl">Música ao vivo</span></div>
      </div>
    </div>
  </header>

  {{-- ============ 2. POR QUE PARTICIPAR ============ --}}
  <section class="section section--alt why">
    <div class="wrap">
      <div class="sec-head">
        <span class="kicker">Por que participar</span>
        <h2>Uma imersão pensada para a realidade do setor público</h2>
        <p>Comunicação pública tem regras próprias. Aqui você aprende a operar redes sociais institucionais com segurança jurídica, eficiência e resultado.</p>
      </div>
      <div class="cards3">
        <article class="fcard">
          <div class="fcard__icon">@includeIf('seminarios.icons.compass', ['size' => 26])</div>
          <h3>Conformidade com a LGPD</h3>
          <p>Trate dados de cidadãos com base legal, consentimento e transparência, sem expor o órgão a riscos.</p>
        </article>
        <article class="fcard">
          <div class="fcard__icon">@includeIf('seminarios.icons.presentation', ['size' => 26])</div>
          <h3>Publicidade institucional</h3>
          <p>Domine as regras de impulsionamento e contratação de mídia no setor público, do planejamento à prestação de contas.</p>
        </article>
        <article class="fcard">
          <div class="fcard__icon">@includeIf('seminarios.icons.users-group', ['size' => 26])</div>
          <h3>Operação na prática</h3>
          <p>Calendário editorial, fluxo de aprovação, atendimento ao cidadão e métricas que importam para a gestão.</p>
        </article>
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
        <p>Quatro dias de conteúdo de alto nível em um ambiente preparado para grandes encontros — com networking, gastronomia e momentos para celebrar.</p>
      </div>
      <div class="exp-grid">

        <article class="exp-item exp-feature">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/govsocial/img-show.jpg') }}" alt="Aula em ambiente de shows">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.star', ['size' => 22])</span>
            <h3>Aula em ambiente de shows</h3>
            <p>Aulas em um espaço preparado para grandes apresentações, com estrutura de palco, som e iluminação profissionais.</p>
          </div>
        </article>

        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/govsocial/img-networking.jpg') }}" alt="Almoço com networking">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.utensils', ['size' => 22])</span>
            <h3>Almoço com networking</h3>
            <p>Almoço exclusivo para trocar experiências com colegas de outros órgãos.</p>
          </div>
        </article>

        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/govsocial/img-coquetel.jpg') }}" alt="Coquetel de boas-vindas">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.glass', ['size' => 22])</span>
            <h3>Coquetel de boas-vindas</h3>
            <p>Um brinde de abertura para começar a imersão criando conexões.</p>
          </div>
        </article>

        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/govsocial/img-tutoria.jpg') }}" alt="Tutoria exclusiva">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.graduation', ['size' => 22])</span>
            <h3>Tutoria exclusiva</h3>
            <p>Acesso direto às maiores referências do mercado para tirar dúvidas reais.</p>
          </div>
        </article>

        <article class="exp-item exp-card">
          <img class="exp-item__bg" src="{{ asset('img/seminarios/govsocial/img-musica.jpg') }}" alt="Coffee com música ao vivo">
          <span class="exp-item__overlay"></span>
          <div class="exp-item__content">
            <span class="exp-item__icon">@includeIf('seminarios.icons.coffee', ['size' => 22])</span>
            <h3>Coffee com música ao vivo</h3>
            <p>Pausas com café gourmet e música ao vivo entre os painéis.</p>
          </div>
        </article>

      </div>
    </div>
  </section>

  {{-- ============ 4. ALMOÇO MADALOSSO ============ --}}
  {{-- <section class="section section--alt mad">
    <div class="section__grid-bg"></div>
    <div class="wrap mad__inner">
      <div class="mad__media ph">
        <img src="{{ asset('img/seminarios/govsocial/img-almoco.jpg') }}" alt="Almoço no Restaurante Madalosso">
      </div>
      <div class="mad__body">
        <span class="kicker">Almoço de celebração</span>
        <h2>Almoço de encerramento no Restaurante Madalosso</h2>
        <p class="mad__lead">Fechamos a imersão com um almoço no maior restaurante da América Latina, em Santa Felicidade (Curitiba) — um rodízio italiano completo em um ambiente histórico.</p>
        <div class="mad__list">
          <div class="mad__item">
            <span class="tick">@includeIf('seminarios.icons.check', ['size' => 18])</span>
            <div>
              <h4>Ambiente tradicional</h4>
              <p>Um dos restaurantes mais emblemáticos do país, referência em gastronomia italiana.</p>
            </div>
          </div>
          <div class="mad__item">
            <span class="tick">@includeIf('seminarios.icons.check', ['size' => 18])</span>
            <div>
              <h4>Rodízio italiano completo</h4>
              <p>Massas, carnes e pratos típicos servidos à vontade.</p>
            </div>
          </div>
          <div class="mad__item">
            <span class="tick">@includeIf('seminarios.icons.check', ['size' => 18])</span>
            <div>
              <h4>Confraternização</h4>
              <p>Um momento de networking e celebração com todos os participantes.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  {{-- ============ 5. BENEFÍCIOS ============ --}}
  <section class="section beneficios">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Benefícios</span>
        <h2>Tudo o que está incluso na sua inscrição</h2>
        <p>Uma experiência completa, do conteúdo à certificação.</p>
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
          <p>Profissionais com atuação real no setor público.</p>
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
          <p>Apostilas, modelos e templates prontos para usar.</p>
        </article>
        <article class="ben">
          <div class="ben__icon">@includeIf('seminarios.icons.package', ['size' => 24])</div>
          <h3>Kit personalizado</h3>
          <p>Kit do participante com os materiais do seminário.</p>
        </article>
      </div>
    </div>
  </section>

  {{-- ============ 6. PROGRAMAÇÃO ============ --}}
  <section class="section section--alt prog">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head">
        <span class="kicker">Programação</span>
        <h2>Seis painéis, do operacional ao estratégico</h2>
        <p>De 25 a 28 de agosto de 2026 — quatro dias com a jornada completa: operação, conteúdo, publicidade, LGPD e estratégia.</p>
      </div>
      <div class="prog-days">

        <div class="day-group">
          <div class="day-group__label"><span>Ter · 25/08</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head">
                <h3>Abertura · O dia a dia das mídias sociais no setor público sob a LGPD</h3>
                <span class="panel__time">14h às 17h</span>
              </div>
              <ul class="panel__topics">
                <li>Como a proteção de dados transforma as rotinas de publicação, engajamento e monitoramento governamental.</li>
                <li>Riscos práticos na operação de redes sociais e a responsabilidade técnica do gestor de conteúdo.</li>
              </ul>
            </article>
          </div>
        </div>

        <div class="day-group">
          <div class="day-group__label"><span>Qua · 26/08</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head">
                <h3>Gestão de plataformas, acessos e anúncios</h3>
                <span class="panel__time">9h às 12h</span>
              </div>
              <ul class="panel__topics">
                <li>Configuração segura e operação de tráfego pago na publicidade institucional.</li>
                <li>Gerenciamento de acessos (Meta Business Suite, Google Ads): níveis de permissão e segurança de contas.</li>
                <li>Pixels e APIs de conversão em portais públicos: limites da coleta de dados comportamentais.</li>
                <li>Segmentação de público em campanhas pagas: uso ético de listas de e-mails, telefones e lookalike.</li>
                <li>Termos de uso das plataformas vs. LGPD: o que aceitar e configurar nas ferramentas.</li>
                <li>Relatórios de performance e exportação de leads: armazenamento seguro de planilhas e métricas.</li>
              </ul>
            </article>
            <article class="panel">
              <div class="panel__head">
                <h3>Rotina de produção de conteúdo e cobertura de eventos</h3>
                <span class="panel__time">14h às 17h</span>
              </div>
              <ul class="panel__topics">
                <li>Execução prática de captura, edição e publicação de imagens e dados.</li>
                <li>Protocolo de campo: coleta de autorizações de imagem em tempo real (eventos, inaugurações, mutirões).</li>
                <li>Uso de banco de dados de terceiros: cuidados ao repostar fotos de cidadãos ou marcar perfis pessoais.</li>
                <li>Publicação de dados de servidores e terceiros: limites da divulgação de nomes, cargos e salários em posts.</li>
                <li>Imagens de crianças e vulneráveis: técnicas de descaracterização e desfoque.</li>
                <li>Arquivamento digital: onde e como guardar os originais e os respectivos termos de consentimento.</li>
              </ul>
            </article>
          </div>
        </div>

        <div class="day-group">
          <div class="day-group__label"><span>Qui · 27/08</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head">
                <h3>Atendimento direto e moderação de comunidades</h3>
                <span class="panel__time">9h às 12h</span>
              </div>
              <ul class="panel__topics">
                <li>Operação de SAC digital, respostas e moderação de comentários.</li>
                <li>Fluxo de atendimento via Direct, WhatsApp Business e Messenger: triagem e segurança das mensagens.</li>
                <li>Scripts de atendimento: como solicitar dados adicionais (CPF, RG) com segurança.</li>
                <li>Moderação de comentários expostos: protocolo para ocultar ou excluir dados pessoais de usuários.</li>
                <li>Integração entre a equipe de mídias sociais e a Ouvidoria oficial (Fala.BR / e-OUV).</li>
                <li>Automatização e chatbots: regras de LGPD para fluxos automáticos de respostas.</li>
              </ul>
            </article>
            <article class="panel">
              <div class="panel__head">
                <h3>Gestão de crises, incidentes e ferramentas de terceiros</h3>
                <span class="panel__time">14h às 17h</span>
              </div>
              <ul class="panel__topics">
                <li>Monitoramento de menções, uso de softwares de agendamento e segurança.</li>
                <li>Configuração segura de plataformas de agendamento e monitoramento (mLabs, Buzzmonitor, Sprinklr).</li>
                <li>Monitoramento de termos e social listening: limites da coleta de postagens públicas de cidadãos.</li>
                <li>Protocolo &ldquo;perfil hackeado&rdquo; ou &ldquo;vazamento de dados&rdquo;: passos imediatos para conter o incidente.</li>
                <li>Links encurtados, QR Codes e landing pages: auditoria de segurança antes do lançamento.</li>
                <li>Checklist de conformidade: auditoria semanal das configurações de privacidade das contas oficiais.</li>
              </ul>
            </article>
          </div>
        </div>

        <div class="day-group">
          <div class="day-group__label"><span>Sex · 28/08</span></div>
          <div class="day-group__panels">
            <article class="panel">
              <div class="panel__head">
                <h3>Encerramento · Workshop: Manual Prático de Sobrevivência Digital</h3>
                <span class="panel__time">9h às 11h</span>
              </div>
              <ul class="panel__topics">
                <li>Manual prático de sobrevivência digital para o comunicador público — guia de bolso operacional para equipes de comunicação governamental.</li>
                <li>Estudo de casos reais de erros operacionais nas redes, debate com os agentes e encerramento.</li>
              </ul>
            </article>
          </div>
        </div>

      </div>
    </div>
  </section>

  {{-- ============ 7. METODOLOGIA ============ --}}
  {{-- <section class="section metodologia">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head">
        <span class="kicker">Metodologia</span>
        <h2>Como você vai aprender</h2>
        <p>Uma abordagem prática, do conceito à aplicação no seu órgão.</p>
      </div>
      <div class="method-grid">
        <article class="method">
          <span class="method__num">01</span>
          <div>
            <h3>Aulas práticas</h3>
            <p>Conteúdo direto ao ponto, com exercícios e demonstrações reais.</p>
          </div>
        </article>
        <article class="method">
          <span class="method__num">02</span>
          <div>
            <h3>Estudos de caso reais</h3>
            <p>Exemplos de órgãos e prefeituras para aprender com situações concretas.</p>
          </div>
        </article>
        <article class="method">
          <span class="method__num">03</span>
          <div>
            <h3>Modelos e templates</h3>
            <p>Materiais prontos para aplicar na rotina assim que voltar ao trabalho.</p>
          </div>
        </article>
        <article class="method">
          <span class="method__num">04</span>
          <div>
            <h3>Tutoria individual</h3>
            <p>Espaço para tirar dúvidas específicas da sua realidade com os docentes.</p>
          </div>
        </article>
        <article class="method">
          <span class="method__num">05</span>
          <div>
            <h3>Aplicação no seu órgão</h3>
            <p>Plano de ação para implementar o que foi aprendido no setor público.</p>
          </div>
        </article>
      </div>
    </div>
  </section> --}}

  {{-- ============ 8. PARA QUEM É ============ --}}
  <section class="section section--alt who">
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Para quem é</span>
        <h2>Feito para quem comunica o setor público</h2>
      </div>
      <div class="who__grid">
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.users-group', ['size' => 22])</span>
          <span>Assessores de comunicação</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.presentation', ['size' => 22])</span>
          <span>Social media de órgãos públicos</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.file', ['size' => 22])</span>
          <span>Servidores de gabinete</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.star', ['size' => 22])</span>
          <span>Equipes de imprensa</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.compass', ['size' => 22])</span>
          <span>Agências que atendem o setor público</span>
        </div>
        <div class="pcard">
          <span class="pcard__ic">@includeIf('seminarios.icons.award', ['size' => 22])</span>
          <span>Gestores de marketing institucional</span>
        </div>
      </div>
    </div>
  </section>

  {{-- ============ 9. GALERIA / PROVA SOCIAL ============ --}}
  <section class="section gallery">
    <div class="section__grid-bg"></div>
    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Galeria</span>
        <h2>Como foram as edições anteriores</h2>
      </div>
      <div class="gallery__grid">
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/govsocial/img-palco.jpg') }}" alt="Apresentação no palco"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/govsocial/img-musica.jpg') }}" alt="Música ao vivo"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/govsocial/img-networking.jpg') }}" alt="Networking entre participantes"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/govsocial/img-coquetel.jpg') }}" alt="Coquetel"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/govsocial/img-coffee-break.jpg') }}" alt="Coffee break"></div>
        <div class="gphoto ph"><img src="{{ asset('img/seminarios/govsocial/img-tutoria.jpg') }}" alt="Tutoria com os docentes"></div>
      </div>
      <div class="quote">
        <span class="quote__mark">“</span>
        <blockquote>Saí com um plano claro para reorganizar as redes da prefeitura e muito mais segurança em relação à LGPD. Valeu cada minuto.</blockquote>
        <cite>— Participante de edição anterior, Assessoria de Comunicação Municipal</cite>
      </div>
    </div>
  </section>

  {{-- ============ 10. DOCENTES ============ --}}
  <section class="section section--alt docentes">
    <div class="section__grid-bg"></div>

    <style>
      .docentes .doc-grid{display:grid;gap:20px;grid-template-columns:repeat(2,1fr);margin-top:46px}
      @media(min-width:680px){.docentes .doc-grid{grid-template-columns:repeat(3,1fr)}}
      @media(min-width:1024px){.docentes .doc-grid{grid-template-columns:repeat(5,1fr);gap:16px}}
      .docentes .doc-card{position:relative;display:flex;flex-direction:column;background:rgba(255,255,255,.04);
        border:1px solid rgba(0,194,255,.16);border-radius:16px;overflow:hidden;
        transition:transform .35s ease,border-color .35s ease,box-shadow .35s ease}
      .docentes .doc-card:hover{transform:translateY(-6px);border-color:rgba(0,194,255,.55);box-shadow:0 24px 50px rgba(0,0,0,.45)}
      .docentes .doc-card__media{position:relative;aspect-ratio:4/5;overflow:hidden}
      .docentes .doc-card__media img{width:100%;height:100%;object-fit:cover;
        filter:grayscale(100%) contrast(1.03) brightness(.9);
        transition:filter .45s ease,transform .6s ease}
      .docentes .doc-card:hover .doc-card__media img{filter:none;transform:scale(1.05)}
      .docentes .doc-card__media::after{content:"";position:absolute;inset:0;
        background:linear-gradient(180deg,rgba(7,8,16,0) 42%,rgba(7,8,16,.9) 100%)}
      .docentes .doc-card__idx{position:absolute;top:11px;left:12px;z-index:2;
        font-family:'Space Grotesk',sans-serif;font-size:12px;font-weight:700;letter-spacing:.1em;
        color:#00C2FF;background:rgba(7,8,16,.5);backdrop-filter:blur(4px);
        padding:3px 9px;border-radius:999px;border:1px solid rgba(0,194,255,.3)}
      .docentes .doc-card__name{position:absolute;left:14px;right:14px;bottom:13px;z-index:2}
      .docentes .doc-card__name h3{font-family:'Space Grotesk',sans-serif;color:#fff;
        font-size:18px;line-height:1.14;margin:0 0 4px}
      .docentes .doc-card__role{display:inline-block;font-size:11px;text-transform:uppercase;
        letter-spacing:.12em;color:#00C2FF;font-weight:600}
      .docentes .doc-card__body{padding:15px 15px 18px;display:flex;flex-direction:column;gap:9px}
      .docentes .doc-q{position:relative;margin:0;padding-left:18px;font-size:13px;line-height:1.42;color:#c8d4e8}
      .docentes .doc-q::before{content:"";position:absolute;left:0;top:6px;width:7px;height:7px;
        background:#00C2FF;transform:rotate(45deg)}
    </style>

    <div class="wrap">
      <div class="sec-head is-center">
        <span class="kicker is-center">Corpo docente</span>
        <h2>Quem vai te ensinar</h2>
        <p>Especialistas que constroem, na prática, a comunicação e a conformidade do setor público — da operação de redes e da publicidade institucional à proteção de dados.</p>
      </div>

      <div class="doc-grid">

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">01</span>
            <img src="{{ asset('img/seminarios/govsocial/doc-jasson.jpg') }}" alt="Jasson Goulart" loading="lazy">
            <div class="doc-card__name">
              <h3>Jasson Goulart</h3>
              <span class="doc-card__role">Comunicação &amp; Mídia</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">Mais de 30 anos comunicando com o público de Curitiba</p>
            <p class="doc-q">Vivência de TV, rádio e comunicação popular</p>
            <p class="doc-q">Escuta ativa e linguagem que aproxima instituição e cidadão</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">02</span>
            <img src="{{ asset('img/seminarios/govsocial/doc-michelle.jpg') }}" alt="Michelle Stival" loading="lazy">
            <div class="doc-card__name">
              <h3>Michelle Stival</h3>
              <span class="doc-card__role">Comunicação Pública</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">Coordena as redes do Legislativo curitibano (Instagram, TikTok, X e YouTube)</p>
            <p class="doc-q">Modelo de comunicação pública replicado por câmaras de todo o país</p>
            <p class="doc-q">Seis vezes premiada (Sangue Bom · Sindijor-PR)</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">03</span>
            <img src="{{ asset('img/seminarios/govsocial/doc-cassio.jpg') }}" alt="Cassio Ferreira" loading="lazy">
            <div class="doc-card__name">
              <h3>Cassio Ferreira</h3>
              <span class="doc-card__role">Branding &amp; Estratégia</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">Ex-Diretor de Comunicação Digital da Prefeitura de Curitiba</p>
            <p class="doc-q">+600% de audiência e 30 milhões de impressões/mês na gestão pública</p>
            <p class="doc-q">Fundador do Busão Curitiba (700 mil+ seguidores)</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">04</span>
            <img src="{{ asset('img/seminarios/govsocial/doc-giovani.jpg') }}" alt="Giovani de Capri" loading="lazy">
            <div class="doc-card__name">
              <h3>Giovani de Capri</h3>
              <span class="doc-card__role">Oratória &amp; Liderança</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">22+ anos formando líderes de alto desempenho</p>
            <p class="doc-q">Especialista em oratória e em falar em público com autoridade</p>
            <p class="doc-q">Formação Dale Carnegie e FGV em desenvolvimento humano</p>
          </div>
        </article>

        <article class="doc-card">
          <div class="doc-card__media">
            <span class="doc-card__idx">05</span>
            <img src="{{ asset('img/seminarios/govsocial/doc-mayara.jpg') }}" alt="Mayara Pastor" loading="lazy">
            <div class="doc-card__name">
              <h3>Mayara Pastor</h3>
              <span class="doc-card__role">LGPD &amp; Proteção de Dados</span>
            </div>
          </div>
          <div class="doc-card__body">
            <p class="doc-q">Advogada e especialista em LGPD (ESMAFE-PR)</p>
            <p class="doc-q">Lead Implementer ISO/IEC 27701 e membro do Comitê ABNT</p>
            <p class="doc-q">Compliance, relatórios de impacto e governança de privacidade</p>
          </div>
        </article>

      </div>
    </div>
  </section>

  {{-- ============ 11. INVESTIMENTO ============ --}}
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
            <li class="on"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Coquetel de encerramento</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Almoço no Restaurante Madalosso</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Kit personalizado + brindes</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Mentoria e exclusiva individual com os docentes</span></li>
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
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Almoço no Restaurante Madalosso</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Kit personalizado + brindes</span></li>
            <li class="off"><span class="pi">@includeIf('seminarios.icons.x', ['size' => 14])</span><span>Mentoria e exclusiva individual com os docentes</span></li>
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
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Almoço no Restaurante Madalosso</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Kit personalizado + brindes</span></li>
            <li class="on"><span class="pi">@includeIf('seminarios.icons.check', ['size' => 14])</span><span>Mentoria e exclusiva individual com os docentes</span></li>
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

        {{-- AJUSTE o action abaixo para o endpoint que recebe a inscrição --}}
        <form method="POST" action="/seminarios/gestao-midias-sociais-setor-publico/inscricao">
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
            {{-- Honeypot anti-spam. Obs.: o nome "website" costuma sofrer autofill do
                 navegador/gerenciador de senhas e disparar o anti-spam à toa. Se o form
                 redirecionar sozinho sem salvar, renomeie este campo para "lp_hp" aqui
                 E no seu validador (StoreLeadRequest). --}}
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

  {{-- ============ 12. FOOTER ============ --}}
  <footer class="footer">
    <div class="wrap footer__inner">
      <div class="footer__brand">
        <div class="footer__brands">
          <img src="{{ asset('img/logo-unyflex-white.png') }}" alt="Unyflex">
          <img src="{{ asset('img/logo-unypublica-white.png') }}" alt="Faculdade Unypública">
        </div>
        <p>Gestão de Mídias Sociais no Setor Público. Operação, Publicidade e LGPD. Realização: Unyflex Digital · Faculdade Unypública.</p>
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
