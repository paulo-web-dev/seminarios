<?php

namespace Database\Seeders;

use App\Models\Seminario;
use Illuminate\Database\Seeder;

class GovSocialSeminarioSeeder extends Seeder
{
    public function run(): void
    {
        $seminario = Seminario::updateOrCreate(
            ['slug' => 'gestao-midias-sociais-setor-publico'],
            [
                'ativo'           => true,

                // HERO
                'badge_topo'      => 'Novo · Vagas limitadas',
                'titulo'          => 'Gestão de Mídias Sociais no Setor Público',
                'titulo_destaque' => 'Mídias Sociais',
                'subtitulo'       => 'Operação, Publicidade e LGPD',
                'descricao'       => 'Quatro dias de imersão prática para comunicadores e gestores públicos — em ambiente de shows, com networking, gastronomia e música ao vivo.',
                'selos'           => ['Certificação MEC', '100% Prático', 'Ao Vivo', 'Turmas reduzidas'],
                'hero_imagem'     => 'img/seminarios/govsocial/img-evento-cheio.jpg',
                'modalidade'      => 'Presencial · Experiência completa',

                // POR QUE
                'why_kicker'      => 'Por que participar',
                'why_titulo'      => 'O que muda na sua operação',
                'why_lead'        => 'Conteúdo técnico e aplicável — sem juridiquês, com checklist que você usa na segunda-feira.',

                // EXPERIÊNCIA
                'exp_kicker'      => 'A experiência',
                'exp_titulo'      => 'Mais que um curso: uma imersão',
                'exp_lead'        => 'Quatro dias em ambiente de shows, com networking de alto nível, gastronomia e música ao vivo. Conteúdo denso, experiência memorável.',

                // BENEFÍCIOS
                'beneficios_kicker' => 'Vantagens',
                'beneficios_titulo' => 'Benefícios exclusivos de quem participa',
                'beneficios_lead'   => 'Muito além do conteúdo: um pacote completo para potencializar sua carreira no setor público.',

                // PROGRAMAÇÃO
                'prog_kicker'     => 'Programação',
                'prog_titulo'     => 'Seis painéis, do operacional ao estratégico',
                'prog_lead'       => 'Quatro dias de imersão ao vivo. Cada painel termina com prática aplicável e checklist de conformidade.',

                // METODOLOGIA
                'metodologia_kicker' => 'Metodologia',
                'metodologia_titulo' => 'Como o conteúdo é conduzido',
                'metodologia_lead'   => 'Teoria e prática lado a lado, com foco em aplicação real na gestão municipal.',

                // PARA QUEM
                'who_kicker'      => 'Público-alvo',
                'who_titulo'      => 'Para quem é este seminário',

                // GALERIA
                'galeria_kicker'  => 'Prova social',
                'galeria_titulo'  => 'Veja como são nossos eventos',
                'quote_texto'     => 'Saí com um checklist de LGPD que apliquei na segunda-feira. E ainda foi a experiência mais bem cuidada que a secretaria já participou — do conteúdo ao coquetel.',
                'quote_autor'     => 'Coordenadora de Comunicação · Prefeitura Municipal',

                // TUTORIA / PALESTRANTES
                'speakers_kicker' => 'Tutoria exclusiva',
                'speakers_titulo' => 'Aprenda com as maiores referências do mercado',

                // INVESTIMENTO (3 planos)
                'invest_kicker'   => 'Investimento',
                'invest_badge'    => 'Vagas se encerrando',
                'invest_titulo'   => 'Escolha seu plano de participação',
                'invest_lead'     => 'Três formatos para viver a experiência completa do seminário.',
                'invest_obs'      => 'Todos os planos incluem certificação, almoço no Madalosso e coffee breaks gourmet.',
                'cta_texto'       => 'Falar com um consultor',

                // ALMOÇO MADALOSSO (bloco dedicado)
                'madalosso'       => [
                    'titulo' => 'Almoço no Restaurante Madalosso',
                    'lead'   => 'Para celebrar o sucesso do evento, um almoço italiano especial para todos os alunos — em um dos maiores restaurantes do mundo, na tradicional Santa Felicidade, em Curitiba.',
                    'foto'   => 'img/seminarios/govsocial/img-almoco.jpg',
                    'highlights' => [
                        ['titulo' => 'Ambiente tradicional',  'descricao' => 'Um espaço aconchegante e clássico da culinária italiana em Curitiba.'],
                        ['titulo' => 'Rodízio italiano completo', 'descricao' => 'Massas, frango, polenta e muito mais — sabores incomparáveis à vontade.'],
                        ['titulo' => 'Momento de confraternização', 'descricao' => 'Celebre com colegas e professores em um ambiente agradável e festivo.'],
                    ],
                ],

                // SEO
                'meta_title'      => 'Seminário — Gestão de Mídias Sociais no Setor Público | Unyflex Digital',
                'meta_description'=> 'Operação, Publicidade e LGPD. 4 dias de imersão prática em ambiente de shows, com almoço no Madalosso, networking, gastronomia e música ao vivo. Certificação MEC.',
            ]
        );

        // Reexecução limpa
        $seminario->diferenciais()->delete();
        $seminario->vantagens()->delete();
        $seminario->beneficios()->delete();
        $seminario->metodologias()->delete();
        $seminario->planos()->delete();
        $seminario->dias()->delete();
        $seminario->publicos()->delete();
        $seminario->fotos()->delete();
        $seminario->palestrantes()->delete();

        // ── DIFERENCIAIS (3) ─────────────────────────────────────
        $seminario->diferenciais()->createMany([
            ['icone' => 'shield', 'ordem' => 1, 'titulo' => 'LGPD na Prática',
             'descricao' => 'Como publicar nas redes sem violar dados pessoais — base legal, consentimento e o que checar antes de postar.'],
            ['icone' => 'target', 'ordem' => 2, 'titulo' => 'Tráfego Pago Público',
             'descricao' => 'Anúncios institucionais com segurança jurídica: Meta Ads e Google Ads dentro das regras do setor público.'],
            ['icone' => 'alert', 'ordem' => 3, 'titulo' => 'Gestão de Crises',
             'descricao' => 'Protocolo de resposta para incidentes, vazamentos e perfis hackeados — antes que vire manchete.'],
        ]);

        // ── EXPERIÊNCIA / bento (1 feature + 4 cards) ────────────
        $seminario->vantagens()->createMany([
            ['ordem' => 1, 'destaque' => true, 'icone' => 'sparkle',
             'titulo' => 'Aula em ambiente de shows',
             'descricao' => 'Esqueça a sala de aula comum. Você aprende em um palco profissional, com iluminação cênica, som e estrutura de grandes eventos.',
             'foto' => 'img/seminarios/govsocial/img-palco-2.jpg'],
            ['ordem' => 2, 'icone' => 'star', 'titulo' => 'Tutoria exclusiva',
             'descricao' => 'Acesso direto aos professores mais referenciados do mercado.',
             'foto' => 'img/seminarios/govsocial/img-tutoria.jpg'],
            ['ordem' => 3, 'icone' => 'music', 'titulo' => 'Música ao vivo nos intervalos',
             'descricao' => 'Coffee breaks com música ao vivo, todos os dias.',
             'foto' => 'img/seminarios/govsocial/img-musica.jpg'],
            ['ordem' => 4, 'icone' => 'glass', 'titulo' => 'Coquetel de encerramento',
             'descricao' => 'Um brinde ao networking e às novas parcerias.',
             'foto' => 'img/seminarios/govsocial/img-coquetel.jpg'],
            ['ordem' => 5, 'icone' => 'users-group', 'titulo' => 'Networking de alto nível',
             'descricao' => 'Conexões com colegas de órgãos e prefeituras de todo o país.',
             'foto' => 'img/seminarios/govsocial/img-networking.jpg'],
        ]);

        // ── BENEFÍCIOS (8) ───────────────────────────────────────
        $seminario->beneficios()->createMany([
            ['ordem' => 1, 'icone' => 'gift',         'titulo' => 'Programa de troca de brindes', 'descricao' => 'Ganhe recompensas exclusivas por participação e desempenho.'],
            ['ordem' => 2, 'icone' => 'award',        'titulo' => 'Certificação nota máxima do MEC', 'descricao' => 'Certificado reconhecido nacionalmente para fortalecer seu currículo.'],
            ['ordem' => 3, 'icone' => 'compass',      'titulo' => 'Mentoria extra exclusiva', 'descricao' => 'Acompanhamento especializado para aprimorar seu aprendizado.'],
            ['ordem' => 4, 'icone' => 'presentation', 'titulo' => 'Docentes especialistas', 'descricao' => 'Aprenda com professores altamente qualificados e experientes.'],
            ['ordem' => 5, 'icone' => 'coffee',       'titulo' => 'Coffee break gourmet', 'descricao' => 'Momentos de networking com um delicioso coffee break.'],
            ['ordem' => 6, 'icone' => 'graduation',   'titulo' => 'Semestre de graduação EAD', 'descricao' => 'Acesso a um semestre completo de ensino a distância.'],
            ['ordem' => 7, 'icone' => 'file',         'titulo' => 'Materiais para estudo em PDF', 'descricao' => 'Conteúdos digitais exclusivos para complementar seu aprendizado.'],
            ['ordem' => 8, 'icone' => 'package',      'titulo' => 'Kit de estudo personalizado', 'descricao' => 'Receba um kit exclusivo para potencializar seus estudos.'],
        ]);

        // ── METODOLOGIA (5) ──────────────────────────────────────
        $seminario->metodologias()->createMany([
            ['ordem' => 1, 'titulo' => 'Aulas expositivas e dialogadas', 'descricao' => 'Explicação dos temas com participação ativa dos alunos.'],
            ['ordem' => 2, 'titulo' => 'Estudos de caso',                'descricao' => 'Aplicação prática dos conceitos em situações reais de gestão municipal.'],
            ['ordem' => 3, 'titulo' => 'Workshops práticos',             'descricao' => 'Atividades colaborativas para fixação dos conteúdos.'],
            ['ordem' => 4, 'titulo' => 'Materiais complementares',       'descricao' => 'Apostilas, slides e indicações de leitura para aprofundamento.'],
            ['ordem' => 5, 'titulo' => 'Certificação',                   'descricao' => 'Certificado ao final do curso para todos que concluírem as atividades.'],
        ]);

        // ── PROGRAMAÇÃO — 6 painéis / 4 dias ─────────────────────
        $seminario->dias()->createMany([
            ['rotulo' => 'Dia 1', 'periodo' => 'Tarde · 14h–17h', 'ordem' => 1,
             'titulo' => 'Abertura · O dia a dia das mídias sociais sob a LGPD',
             'topicos' => [
                 'Como a proteção de dados transforma as rotinas de publicação, engajamento e monitoramento.',
                 'Riscos práticos na operação de redes e a responsabilidade técnica do gestor de conteúdo.']],
            ['rotulo' => 'Dia 2', 'periodo' => 'Manhã · 9h–12h', 'ordem' => 2,
             'titulo' => 'Gestão de plataformas, acessos e anúncios',
             'topicos' => [
                 'Configuração segura e operação de tráfego pago na publicidade institucional.',
                 'Gerenciamento de acessos (Meta Business Suite, Google Ads): permissões e segurança de contas.',
                 'Pixels e APIs de conversão em portais públicos: limites da coleta comportamental.',
                 'Segmentação ética de público: listas de e-mails, telefones e lookalike.',
                 'Termos de uso das plataformas vs. LGPD: o que aceitar e configurar.',
                 'Relatórios de performance e exportação segura de leads.']],
            ['rotulo' => 'Dia 2', 'periodo' => 'Tarde · 14h–17h', 'ordem' => 3,
             'titulo' => 'Produção de conteúdo e cobertura de eventos',
             'topicos' => [
                 'Captura, edição e publicação de imagens e dados na prática.',
                 'Protocolo de campo: autorizações de imagem em tempo real (eventos, inaugurações, mutirões).',
                 'Uso de bancos de imagem de terceiros e repostagem de cidadãos.',
                 'Publicação de dados de servidores: nomes, cargos e seus limites.',
                 'Imagens de crianças e vulneráveis: técnicas de descaracterização e desfoque.',
                 'Arquivamento digital de originais e respectivos termos de consentimento.']],
            ['rotulo' => 'Dia 3', 'periodo' => 'Manhã · 9h–12h', 'ordem' => 4,
             'titulo' => 'Atendimento direto e moderação de comunidades',
             'topicos' => [
                 'SAC digital, respostas e moderação de comentários.',
                 'Direct, WhatsApp Business e Messenger: triagem e segurança das mensagens.',
                 'Scripts de atendimento: como solicitar CPF/RG com segurança.',
                 'Moderação: ocultar ou excluir dados pessoais expostos por usuários.',
                 'Integração com a Ouvidoria oficial (Fala.BR / e-OUV).',
                 'Chatbots e automações: regras de LGPD nos fluxos de resposta.']],
            ['rotulo' => 'Dia 3', 'periodo' => 'Tarde · 14h–17h', 'ordem' => 5,
             'titulo' => 'Gestão de crises, incidentes e ferramentas',
             'topicos' => [
                 'Monitoramento de menções e social listening dentro dos limites legais.',
                 'Plataformas de agendamento e monitoramento (mLabs, Buzzmonitor, Sprinklr).',
                 'Protocolo "perfil hackeado" / "vazamento de dados": contenção imediata.',
                 'Links encurtados, QR Codes e landing pages: auditoria antes do lançamento.',
                 'Checklist de conformidade: auditoria semanal de privacidade das contas.']],
            ['rotulo' => 'Dia 4', 'periodo' => 'Manhã · 9h–11h', 'ordem' => 6,
             'titulo' => 'Encerramento · Workshop prático',
             'topicos' => [
                 'Manual prático de sobrevivência digital para o comunicador público — guia de bolso operacional.',
                 'Estudo de casos reais de erros nas redes, debate com os agentes e encerramento.']],
        ]);

        // ── PARA QUEM (6) ────────────────────────────────────────
        $seminario->publicos()->createMany([
            ['icone' => 'megaphone',    'ordem' => 1, 'titulo' => 'Assessor de comunicação'],
            ['icone' => 'user',         'ordem' => 2, 'titulo' => 'Gestor de redes sociais'],
            ['icone' => 'chart',        'ordem' => 3, 'titulo' => 'Analista de marketing público'],
            ['icone' => 'browser',      'ordem' => 4, 'titulo' => 'Responsável pelo site institucional'],
            ['icone' => 'target2',      'ordem' => 5, 'titulo' => 'Servidor que opera Meta / Google Ads'],
            ['icone' => 'shield-check', 'ordem' => 6, 'titulo' => 'DPO / responsável pela LGPD no órgão'],
        ]);

        // ── GALERIA (6) ──────────────────────────────────────────
        $seminario->fotos()->createMany([
            ['ordem' => 1, 'caminho' => 'img/seminarios/govsocial/img-alunos-aula.jpg',  'legenda' => 'Participantes em sala'],
            ['ordem' => 2, 'caminho' => 'img/seminarios/govsocial/img-show.jpg',          'legenda' => 'Música ao vivo no palco'],
            ['ordem' => 3, 'caminho' => 'img/seminarios/govsocial/img-networking.jpg',     'legenda' => 'Networking entre participantes'],
            ['ordem' => 4, 'caminho' => 'img/seminarios/govsocial/img-coffee-break.jpg',   'legenda' => 'Coffee break'],
            ['ordem' => 5, 'caminho' => 'img/seminarios/govsocial/img-palco.jpg',          'legenda' => 'Palestra no palco'],
            ['ordem' => 6, 'caminho' => 'img/seminarios/govsocial/img-coquetel.jpg',       'legenda' => 'Coquetel'],
        ]);

        // ── PALESTRANTES (3) ─────────────────────────────────────
        $seminario->palestrantes()->createMany([
            ['ordem' => 1, 'nome' => 'Especialista em Comunicação Pública', 'cargo' => 'Mídias Sociais · Gov',
             'bio' => 'Mais de uma década estruturando a presença digital de órgãos públicos com foco em transparência ativa.',
             'foto' => 'img/seminarios/govsocial/img-palestrante.jpg'],
            ['ordem' => 2, 'nome' => 'Consultor de LGPD', 'cargo' => 'Privacidade · Compliance',
             'bio' => 'Atua na adequação de prefeituras e autarquias à LGPD, traduzindo a lei em rotinas práticas.',
             'foto' => 'img/seminarios/govsocial/img-professor-bw.jpg'],
            ['ordem' => 3, 'nome' => 'Especialista em Tráfego Pago', 'cargo' => 'Meta Ads · Google Ads',
             'bio' => 'Gestor de campanhas institucionais com domínio das regras de publicidade do setor público.',
             'foto' => 'img/seminarios/govsocial/img-professor-2.jpg'],
        ]);

        // ── PLANOS DE INVESTIMENTO (3) ───────────────────────────
        $beneficiosPlano = [
            'Almoço no Madalosso',
            'Voucher Churrascaria',
            '6 Coffee breaks gourmet',
            'Kit escolar exclusivo',
            'Mochila de couro',
            'Mentoria exclusiva',
            'Semestre de graduação',
            'Bolsa de pós-graduação',
            'Assinatura Premium',
        ];
        $mk = fn (array $flags) => collect($beneficiosPlano)
            ->map(fn ($label, $i) => ['label' => $label, 'incluso' => $flags[$i]])
            ->all();

        $seminario->planos()->createMany([
            [
                'ordem' => 1, 'nome' => 'Plano 01', 'preco' => 'R$ 3.300,00', 'periodo' => 'por pessoa',
                'destaque' => false,
                'itens' => $mk([true, false, true, true, false, false, false, false, false]),
            ],
            [
                'ordem' => 2, 'nome' => 'Plano 02', 'preco' => 'R$ 3.800,00', 'periodo' => 'por pessoa',
                'destaque' => false,
                'itens' => $mk([true, true, true, true, false, false, true, false, true]),
            ],
            [
                'ordem' => 3, 'nome' => 'Plano 03', 'preco' => 'R$ 5.200,00', 'periodo' => 'por pessoa',
                'destaque' => true,
                'itens' => $mk([true, true, true, true, true, true, true, true, true]),
            ],
        ]);

        $this->command?->info("Seminário GovSocial (v3 dark) atualizado: /seminarios/{$seminario->slug}");
    }
}
