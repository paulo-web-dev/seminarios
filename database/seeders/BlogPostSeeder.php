<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

/**
 * Popula o blog com 15 artigos otimizados para SEO, voltados a
 * gestores e comunicadores do setor público.
 *
 * Cada artigo é definido de forma estruturada (intro + seções + FAQ +
 * conclusão) e renderizado para HTML semântico (H2/H3, listas, etc.).
 */
class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = Category::pluck('id', 'slug');
        $base = now()->subDays(60);

        foreach ($this->artigos() as $i => $a) {
            $post = Post::updateOrCreate(
                ['slug' => $a['slug']],
                [
                    'title'            => $a['title'],
                    'excerpt'          => $a['excerpt'],
                    'content'          => $this->render($a),
                    'featured_image'   => $a['image'] ?? null,
                    'meta_title'       => $a['meta_title'],
                    'meta_description' => $a['meta_description'],
                    'focus_keyword'    => $a['focus_keyword'],
                    'category_id'      => $categorias[$a['categoria']] ?? null,
                    'author'           => 'Equipe Unyflex',
                    'status'           => 'published',
                    'published_at'     => (clone $base)->addDays($i * 3),
                ]
            );

            $ids = collect($a['tags'])->map(
                fn ($t) => Tag::firstOrCreate(['slug' => Str::slug($t)], ['name' => $t])->id
            )->all();
            $post->tags()->sync($ids);
        }
    }

    /** Compõe o HTML final do artigo a partir da estrutura. */
    private function render(array $a): string
    {
        $html = "<p>{$a['intro']}</p>\n";

        foreach ($a['sections'] as $s) {
            $html .= "<h2>{$s['h2']}</h2>\n{$s['body']}\n";
        }

        if (! empty($a['faq'])) {
            $html .= "<div class=\"faq\">\n<h2>Perguntas frequentes</h2>\n";
            foreach ($a['faq'] as $f) {
                $html .= "<h3>{$f['q']}</h3>\n<p>{$f['a']}</p>\n";
            }
            $html .= "</div>\n";
        }

        $html .= "<h2>Conclusão</h2>\n<p>{$a['conclusion']}</p>\n";
        $html .= "<p><strong>Quer aplicar tudo isso na prática?</strong> No seminário "
            . "<em>Gestão de Mídias Sociais no Setor Público</em> você aprofunda operação, "
            . "publicidade institucional e LGPD com especialistas que vivem a rotina do setor público.</p>\n";

        return $html;
    }

    private function artigos(): array
    {
        return [
            // ============================ 1 ============================
            [
                'title'         => 'LGPD nas Redes Sociais de Prefeituras: O Que Pode e o Que Não Pode',
                'slug'          => 'lgpd-redes-sociais-prefeituras',
                'focus_keyword' => 'LGPD redes sociais prefeituras',
                'meta_title'    => 'LGPD nas Redes de Prefeituras: o que pode e não pode',
                'meta_description' => 'Guia prático de LGPD para redes sociais de prefeituras: bases legais, o que pode e não pode publicar, riscos e boas práticas para a comunicação pública.',
                'categoria'     => 'lgpd-protecao-de-dados',
                'tags'          => ['LGPD', 'Prefeituras', 'Comunicação Pública', 'Conformidade'],
                'excerpt'       => 'O que uma prefeitura pode e não pode fazer nas redes sociais sob a LGPD: bases legais, riscos e boas práticas para publicar com segurança.',
                'intro'         => 'As redes sociais se tornaram o principal canal de contato entre prefeituras e cidadãos — mas cada postagem, comentário respondido ou foto publicada envolve <strong>tratamento de dados pessoais</strong>. Entender o que a LGPD (Lei nº 13.709/2018) permite e proíbe deixou de ser um detalhe jurídico e virou parte da rotina de quem comunica o setor público. Este guia organiza, em linguagem direta, o que pode e o que não pode.',
                'sections'      => [
                    ['h2' => 'A prefeitura também precisa cumprir a LGPD?',
                     'body' => '<p>Sim. A LGPD se aplica integralmente ao poder público. A diferença é que órgãos públicos, em regra, não dependem de consentimento para tratar dados no cumprimento de suas competências: usam a base legal de <strong>execução de políticas públicas</strong> e do <strong>cumprimento de obrigação legal</strong>. Isso não é um cheque em branco — o tratamento precisa ser necessário, proporcional e transparente.</p><p>Na prática, publicar a agenda do prefeito é diferente de expor o CPF de um cidadão que reclamou de um buraco na rua. A finalidade muda tudo.</p>'],
                    ['h2' => 'O que a prefeitura PODE publicar',
                     'body' => '<ul><li>Informações de interesse público: obras, serviços, campanhas, prestação de contas.</li><li>Imagens de eventos públicos, respeitando contexto e finalidade institucional.</li><li>Dados de agentes públicos relacionados ao exercício do cargo (nome e função), conforme a Lei de Acesso à Informação.</li><li>Respostas a dúvidas, desde que sem expor dados pessoais sensíveis do cidadão no espaço público do post.</li></ul>'],
                    ['h2' => 'O que a prefeitura NÃO pode fazer',
                     'body' => '<ul><li>Expor dados pessoais de cidadãos (CPF, endereço, telefone, dados de saúde) em comentários ou publicações.</li><li>Divulgar fotos de pessoas identificáveis em situação de vulnerabilidade sem base legal e cuidado redobrado.</li><li>Usar a base de contatos coletada para um fim (ex.: inscrição em programa social) em campanhas de outra natureza.</li><li>Responder publicamente a uma reclamação repetindo dados sensíveis que o cidadão enviou no privado.</li></ul>'],
                    ['h2' => 'Comentários e mensagens diretas',
                     'body' => '<p>O campo de comentários é um ambiente de dados pessoais. Quando um cidadão escreve "meu nome é X, moro na rua Y e preciso de remédio Z", ele expôs dado sensível de saúde. A equipe deve <strong>ocultar ou moderar</strong> o comentário e levar o atendimento para um canal privado e seguro, idealmente integrado à ouvidoria.</p><h3>Boa prática</h3><p>Tenha um procedimento escrito: o que ocultar, como redirecionar e onde registrar. Isso protege o cidadão e o órgão.</p>'],
                    ['h2' => 'Riscos de não se adequar',
                     'body' => '<p>O descumprimento pode gerar responsabilização do órgão, sanções da ANPD, ações judiciais e — talvez o mais sensível para a gestão — <strong>dano reputacional</strong>. Um vazamento de dados de cidadãos numa rede oficial vira manchete e mina a confiança no serviço público.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Prefeitura precisa de consentimento para postar foto de evento?', 'a' => 'Nem sempre. Para eventos públicos e finalidade institucional, costuma-se usar bases legais próprias do poder público, com aviso de captação de imagens no local. Para crianças e situações sensíveis, o cuidado deve ser muito maior.'],
                    ['q' => 'Posso responder a uma reclamação citando o nome do cidadão?', 'a' => 'Evite. Prefira respostas genéricas no público e leve detalhes para o privado, sem repetir dados pessoais que possam identificar ou expor a pessoa.'],
                    ['q' => 'A LGPD impede a transparência pública?', 'a' => 'Não. Transparência e proteção de dados coexistem: publica-se o que é de interesse público sobre a gestão, protegendo dados pessoais de cidadãos que não precisam ser expostos.'],
                ],
                'conclusion'    => 'Cumprir a LGPD nas redes de uma prefeitura é menos sobre "travar" a comunicação e mais sobre <strong>publicar com critério</strong>: finalidade clara, base legal adequada e respeito aos dados do cidadão. Com processos simples e uma equipe treinada, é possível ser transparente, ágil e seguro ao mesmo tempo.',
            ],

            // ============================ 2 ============================
            [
                'title'         => 'Como Fazer Publicidade Institucional Sem Violar a LGPD',
                'slug'          => 'publicidade-institucional-sem-violar-lgpd',
                'focus_keyword' => 'publicidade institucional LGPD',
                'meta_title'    => 'Publicidade Institucional sem violar a LGPD: guia',
                'meta_description' => 'Como planejar publicidade institucional e impulsionamento no setor público sem violar a LGPD: bases legais, segmentação ética e prestação de contas.',
                'categoria'     => 'publicidade-anuncios',
                'tags'          => ['Publicidade Institucional', 'LGPD', 'Meta Ads', 'Conformidade'],
                'excerpt'       => 'Bases legais, segmentação ética e cuidados de privacidade para fazer publicidade institucional e impulsionar conteúdo sem violar a LGPD.',
                'intro'         => 'Impulsionar uma campanha de vacinação ou divulgar um programa social é função legítima do Estado. Mas no momento em que se sobe um público para o gerenciador de anúncios, se instala um pixel ou se exporta uma lista, a <strong>publicidade institucional encontra a LGPD</strong>. A boa notícia: dá para anunciar com eficiência e conformidade ao mesmo tempo.',
                'sections'      => [
                    ['h2' => 'Publicidade institucional não é propaganda pessoal',
                     'body' => '<p>A Constituição já delimita: a publicidade dos órgãos públicos deve ter caráter <strong>educativo, informativo ou de orientação social</strong>, sem promoção pessoal de autoridades. A LGPD adiciona uma camada: os dados usados para alcançar o público também precisam de tratamento legítimo.</p>'],
                    ['h2' => 'Qual base legal usar nos anúncios',
                     'body' => '<p>Para campanhas de interesse público (saúde, educação, segurança), o poder público costuma se apoiar na execução de políticas públicas. Já o uso de <strong>listas de contatos</strong> (e-mails, telefones) para públicos personalizados exige atenção: aqueles dados foram coletados com qual finalidade? Reaproveitá-los para anúncios pode extrapolar a finalidade original.</p>'],
                    ['h2' => 'Segmentação ética',
                     'body' => '<h3>O que evitar</h3><ul><li>Subir listas de cidadãos coletadas para outro fim como público personalizado.</li><li>Segmentar por características sensíveis (saúde, religião, opinião política).</li></ul><h3>O que preferir</h3><ul><li>Segmentação por região, idade e interesses gerais, sem dados sensíveis.</li><li>Públicos amplos para campanhas de utilidade pública.</li></ul>'],
                    ['h2' => 'Pixel, rastreamento e transparência',
                     'body' => '<p>Se o site oficial usa pixel da Meta ou tags do Google, isso é coleta de dados comportamentais. O portal precisa informar isso na <strong>política de privacidade</strong> e, idealmente, oferecer um aviso de cookies. Rastrear sem informar é um risco.</p>'],
                    ['h2' => 'Prestação de contas e licitação',
                     'body' => '<p>Contratação de mídia e agências segue a Lei nº 14.133/2021. Some a isso o registro do tratamento de dados: quem teve acesso aos públicos, onde ficaram armazenados e por quanto tempo. Documentar protege o gestor.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Posso usar a lista de inscritos de um programa para anunciar outro?', 'a' => 'Em regra, não sem avaliar a finalidade original da coleta. Reutilizar dados para finalidade incompatível com a informada é uma violação típica da LGPD.'],
                    ['q' => 'Preciso de aviso de cookies no portal da prefeitura?', 'a' => 'Se há pixels ou ferramentas de rastreamento, o ideal é informar de forma clara na política de privacidade e por meio de um aviso, garantindo transparência ao cidadão.'],
                    ['q' => 'Impulsionar post com foto de cidadão pode?', 'a' => 'Depende do contexto e da base legal. Para pessoas identificáveis, especialmente em situação sensível, é preciso cautela e, muitas vezes, autorização.'],
                ],
                'conclusion'    => 'Publicidade institucional eficiente e conforme à LGPD nasce do planejamento: <strong>finalidade legítima, segmentação ética, transparência sobre rastreamento e documentação</strong>. Assim a campanha cumpre seu papel social sem expor o órgão a sanções.',
            ],

            // ============================ 3 ============================
            [
                'title'         => 'Uso de WhatsApp Business no Setor Público: Guia Completo',
                'slug'          => 'whatsapp-business-setor-publico-guia',
                'focus_keyword' => 'WhatsApp Business setor público',
                'meta_title'    => 'WhatsApp Business no Setor Público: guia completo',
                'meta_description' => 'Como usar o WhatsApp Business em órgãos públicos com segurança e LGPD: atendimento, listas de transmissão, mensagens automáticas e boas práticas.',
                'categoria'     => 'operacao-de-redes',
                'tags'          => ['WhatsApp', 'LGPD', 'Comunicação Pública', 'Boas Práticas'],
                'excerpt'       => 'Como estruturar o WhatsApp Business no atendimento público com segurança, LGPD e processos claros — sem virar um caos no celular de um servidor.',
                'intro'         => 'O WhatsApp é onde o cidadão já está. Por isso, prefeituras e órgãos vêm adotando o <strong>WhatsApp Business</strong> para atendimento e informação. Bem implementado, ele aproxima e agiliza. Mal implementado, vira um número pessoal de servidor cheio de dados sensíveis e sem nenhum controle. Este guia mostra como fazer certo.',
                'sections'      => [
                    ['h2' => 'WhatsApp Business x API Oficial',
                     'body' => '<p>O app <strong>WhatsApp Business</strong> grátis serve para volumes pequenos e um único operador. Para órgãos com demanda real, o caminho é a <strong>API Oficial (Cloud API)</strong>, que permite múltiplos atendentes, integração com sistemas e mais governança. A escolha define quanto de controle e segurança você terá.</p>'],
                    ['h2' => 'O número não pode ser pessoal',
                     'body' => '<p>Regra de ouro: o canal é <strong>institucional</strong>. Usar o celular pessoal de um servidor cria um passivo enorme — quando ele sai, os dados de milhares de cidadãos vão junto. Use uma linha corporativa, com a conta vinculada ao órgão.</p>'],
                    ['h2' => 'LGPD no atendimento por WhatsApp',
                     'body' => '<ul><li>Informe, na primeira interação, qual a finalidade do canal e como os dados serão tratados.</li><li>Não solicite dados sensíveis sem necessidade; quando preciso, faça em ambiente seguro.</li><li>Defina prazo de retenção das conversas e quem tem acesso ao histórico.</li></ul>'],
                    ['h2' => 'Listas de transmissão e mensagens em massa',
                     'body' => '<p>Enviar mensagens ativas (campanhas) exige base legal e, na API, o uso de <strong>templates aprovados</strong>. Disparar para quem não pediu pode configurar tratamento indevido e ainda derrubar o número por spam. Trabalhe com opt-in claro.</p>'],
                    ['h2' => 'Automação com responsabilidade',
                     'body' => '<p>Mensagens de saudação, horário de atendimento e menu inicial melhoram a experiência. Se usar chatbot, deixe sempre uma saída para atendimento humano e seja transparente de que se trata de um atendimento automatizado.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Posso usar meu WhatsApp pessoal para atender pela prefeitura?', 'a' => 'Não é recomendável. O canal deve ser institucional, em linha corporativa, para garantir continuidade, segurança e conformidade com a LGPD.'],
                    ['q' => 'Preciso de consentimento para mandar mensagem ativa?', 'a' => 'Para campanhas ativas, trabalhe com opt-in e base legal adequada. Mensagens não solicitadas geram risco jurídico e de bloqueio do número.'],
                    ['q' => 'Por quanto tempo guardar as conversas?', 'a' => 'Defina um prazo de retenção proporcional à finalidade e documente-o. Guardar indefinidamente sem motivo contraria o princípio da necessidade.'],
                ],
                'conclusion'    => 'O WhatsApp Business é um canal poderoso para o serviço público — desde que tratado como <strong>infraestrutura institucional</strong>: número corporativo, finalidade clara, base legal para mensagens ativas e governança sobre os dados. Estrutura primeiro, volume depois.',
            ],

            // ============================ 4 ============================
            [
                'title'         => 'Gestão de Comentários e Proteção de Dados dos Cidadãos',
                'slug'          => 'gestao-comentarios-protecao-dados-cidadaos',
                'focus_keyword' => 'gestão de comentários LGPD',
                'meta_title'    => 'Gestão de Comentários e Proteção de Dados na Prática',
                'meta_description' => 'Como moderar comentários em redes oficiais protegendo os dados dos cidadãos: políticas de moderação, quando ocultar e como agir conforme a LGPD.',
                'categoria'     => 'lgpd-protecao-de-dados',
                'tags'          => ['LGPD', 'Comunicação Pública', 'Boas Práticas', 'Transparência'],
                'excerpt'       => 'Moderar comentários em perfis oficiais sem violar a LGPD: política de moderação, quando ocultar, como tratar dados expostos e registrar tudo.',
                'intro'         => 'Cada comentário em um post oficial pode conter dados pessoais — nome, telefone, número de processo, queixa de saúde. A forma como a equipe modera define se o órgão protege ou expõe o cidadão. Gestão de comentários é, hoje, uma <strong>atividade de proteção de dados</strong>.',
                'sections'      => [
                    ['h2' => 'Por que comentários são um tema de LGPD',
                     'body' => '<p>O perfil oficial é controlado pelo órgão; logo, ele responde pelo ambiente. Se um cidadão expõe o próprio dado sensível num comentário público, cabe ao órgão agir para minimizar a exposição — não ignorar.</p>'],
                    ['h2' => 'Política de moderação: tenha uma por escrito',
                     'body' => '<p>Uma política pública de moderação dá previsibilidade e protege contra acusações de censura. Ela deve definir o que será ocultado e por quê:</p><ul><li>Dados pessoais expostos (de terceiros ou do próprio autor).</li><li>Discurso de ódio, ameaças e conteúdo ilegal.</li><li>Spam e fraude.</li></ul><h3>Transparência</h3><p>Publique as regras de convivência do perfil. Moderar com critério documentado é diferente de apagar o que incomoda.</p>'],
                    ['h2' => 'Ocultar x excluir x responder',
                     'body' => '<p><strong>Ocultar</strong> remove a visibilidade pública sem apagar (bom para preservar o registro e a relação com o autor). <strong>Excluir</strong> deve ser reservado a conteúdo ilegal. <strong>Responder</strong> publicamente nunca deve repetir o dado pessoal exposto.</p>'],
                    ['h2' => 'Fluxo recomendado',
                     'body' => '<ul><li>Identificou dado pessoal sensível exposto? Oculte e registre o motivo.</li><li>Leve o atendimento para o privado/ouvidoria.</li><li>Documente a ação (print + data + responsável).</li></ul>'],
                ],
                'faq'           => [
                    ['q' => 'Posso apagar um comentário crítico à gestão?', 'a' => 'Crítica legítima não deve ser apagada — isso pode configurar censura. Modere apenas o que viola a política (dados pessoais, ódio, ilegalidade), de forma documentada.'],
                    ['q' => 'O cidadão expôs o próprio CPF. Devo ocultar?', 'a' => 'Sim. Mesmo que o dado seja do próprio autor, ocultar protege a pessoa e reduz a exposição pública, e o atendimento segue no privado.'],
                    ['q' => 'Preciso registrar as moderações?', 'a' => 'É altamente recomendável. O registro demonstra boa-fé, padrão de conduta e ajuda em eventual prestação de contas.'],
                ],
                'conclusion'    => 'Moderar comentários é equilibrar <strong>liberdade de expressão e proteção de dados</strong>. Com política escrita, critérios claros e registro das ações, o órgão protege o cidadão sem ser acusado de censura — e transforma a caixa de comentários em um canal mais seguro.',
            ],

            // ============================ 5 ============================
            [
                'title'         => 'Como Configurar o Meta Business Suite com Segurança',
                'slug'          => 'configurar-meta-business-suite-seguranca',
                'focus_keyword' => 'Meta Business Suite segurança',
                'meta_title'    => 'Meta Business Suite com Segurança: passo a passo',
                'meta_description' => 'Configure o Meta Business Suite de um órgão público com segurança: níveis de acesso, 2FA, contas de sistema e governança para evitar perdas e invasões.',
                'categoria'     => 'ferramentas-ia',
                'tags'          => ['Meta Ads', 'Segurança da Informação', 'Boas Práticas', 'Comunicação Pública'],
                'excerpt'       => 'Estruture o Meta Business Suite do seu órgão com segurança: propriedade dos ativos, níveis de acesso, 2FA e governança para não perder as contas.',
                'intro'         => 'Quase toda crise de redes em órgãos públicos passa por uma falha boba de configuração: a página estava no perfil pessoal de alguém, sem verificação em duas etapas, com a senha compartilhada. O <strong>Meta Business Suite</strong> bem configurado é a base de uma operação segura — e este passo a passo evita as dores mais comuns.',
                'sections'      => [
                    ['h2' => 'O ativo é do órgão, não da pessoa',
                     'body' => '<p>Crie um <strong>Gerenciador de Negócios (Business Manager)</strong> em nome do órgão e transfira a propriedade da página e da conta de anúncios para ele. Páginas presas ao perfil pessoal de um servidor são uma bomba-relógio: quando ele sai, leva o acesso.</p>'],
                    ['h2' => 'Níveis de acesso (princípio do menor privilégio)',
                     'body' => '<ul><li><strong>Administrador</strong>: poucos, de confiança, responsáveis pela governança.</li><li><strong>Editor/Anunciante</strong>: equipe de conteúdo e tráfego, sem poder de remover pessoas.</li><li><strong>Analista</strong>: apenas leitura de relatórios.</li></ul><p>Conceda o mínimo necessário para cada função e revise periodicamente.</p>'],
                    ['h2' => 'Verificação em duas etapas obrigatória',
                     'body' => '<p>Ative a exigência de <strong>2FA</strong> para todos os membros do Business Manager. É a barreira mais eficaz contra sequestro de contas. Combine com e-mails corporativos, não pessoais.</p>'],
                    ['h2' => 'Contas de sistema e integrações',
                     'body' => '<p>Para integrar ferramentas de agendamento ou chatbots, use <strong>contas de sistema</strong> com escopo limitado, em vez de logar com credenciais pessoais. Assim, revogar um acesso não derruba toda a operação.</p>'],
                    ['h2' => 'Plano de recuperação',
                     'body' => '<p>Documente: quem são os administradores, e-mails de recuperação, e um procedimento para o caso de perda de acesso. Tenha sempre mais de um administrador para não ficar refém de uma única pessoa.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Posso administrar a página pelo meu perfil pessoal?', 'a' => 'Pode acessar, mas a propriedade deve estar no Business Manager do órgão. Isso garante continuidade quando há troca de equipe.'],
                    ['q' => '2FA é mesmo necessário?', 'a' => 'Sim. A maioria das invasões explora a ausência de verificação em duas etapas. É a proteção de maior impacto e menor custo.'],
                    ['q' => 'Como dar acesso a uma agência contratada?', 'a' => 'Compartilhe ativos específicos via Business Manager com o nível mínimo necessário e prazo definido, sem entregar login e senha.'],
                ],
                'conclusion'    => 'Segurança no Meta Business Suite é, sobretudo, <strong>governança</strong>: propriedade institucional dos ativos, acessos mínimos, 2FA e um plano de recuperação. Quinze minutos de configuração correta evitam semanas de crise.',
            ],

            // ============================ 6 ============================
            [
                'title'         => 'Google Ads para Órgãos Públicos: Boas Práticas',
                'slug'          => 'google-ads-orgaos-publicos-boas-praticas',
                'focus_keyword' => 'Google Ads órgãos públicos',
                'meta_title'    => 'Google Ads para Órgãos Públicos: boas práticas',
                'meta_description' => 'Boas práticas de Google Ads para órgãos públicos: campanhas de utilidade pública, conformidade, licitação de mídia e proteção de dados na mensuração.',
                'categoria'     => 'publicidade-anuncios',
                'tags'          => ['Google Ads', 'Publicidade Institucional', 'Conformidade', 'Boas Práticas'],
                'excerpt'       => 'Como usar o Google Ads no setor público com foco em utilidade pública, conformidade com a licitação e privacidade na mensuração.',
                'intro'         => 'O Google é o primeiro lugar onde o cidadão busca um serviço público: "como tirar segunda via", "agendar vacina", "horário do posto". Estar bem posicionado nessas buscas é serviço. O <strong>Google Ads</strong> ajuda — mas no setor público ele precisa respeitar regras de publicidade institucional, licitação e proteção de dados.',
                'sections'      => [
                    ['h2' => 'Campanhas de utilidade pública vêm primeiro',
                     'body' => '<p>Antes de pensar em alcance, pense em <strong>intenção de busca</strong>. As campanhas mais valiosas para um órgão são as que respondem a quem já procura um serviço: campanhas de Pesquisa (Search) ligadas a termos como "agendamento", "segunda via", "edital". É comunicação que resolve.</p>'],
                    ['h2' => 'Conformidade e licitação de mídia',
                     'body' => '<p>A contratação de mídia e a gestão por agência seguem a Lei nº 14.133/2021. Mantenha rastreabilidade do investimento, dos relatórios e dos critérios de segmentação. Publicidade pública exige <strong>prestação de contas</strong> — o painel de resultados é parte do processo.</p>'],
                    ['h2' => 'Privacidade na mensuração',
                     'body' => '<p>Tags de conversão e Google Analytics coletam dados de navegação. Informe isso na política de privacidade do portal, configure a <strong>anonimização de IP</strong> e respeite as escolhas do usuário sobre cookies. Mensurar não é desculpa para vigiar.</p>'],
                    ['h2' => 'Estrutura de conta enxuta',
                     'body' => '<ul><li>Separe campanhas por objetivo (serviço, campanha sazonal, institucional).</li><li>Use extensões de site e de chamada para facilitar o acesso ao serviço.</li><li>Acompanhe o índice de qualidade: anúncio relevante custa menos e entrega melhor.</li></ul>'],
                    ['h2' => 'O que evitar',
                     'body' => '<ul><li>Promoção pessoal de autoridades (vedado constitucionalmente).</li><li>Segmentação por dados sensíveis.</li><li>Páginas de destino sem política de privacidade.</li></ul>'],
                ],
                'faq'           => [
                    ['q' => 'Órgão público pode anunciar no Google?', 'a' => 'Sim, para finalidades educativas, informativas e de orientação social, respeitando licitação, conformidade e a vedação à promoção pessoal.'],
                    ['q' => 'Preciso informar o uso do Google Analytics?', 'a' => 'Sim. Qualquer coleta de dados de navegação deve constar na política de privacidade, idealmente com anonimização de IP.'],
                    ['q' => 'Vale a pena investir em campanhas de Pesquisa?', 'a' => 'Costuma ser o melhor investimento: alcança quem já procura o serviço, com alta intenção e custo controlado.'],
                ],
                'conclusion'    => 'No setor público, o Google Ads brilha quando serve ao cidadão que <strong>já está buscando</strong> um serviço — com conformidade na contratação e respeito à privacidade na mensuração. Menos vaidade de alcance, mais resolução de demanda.',
            ],

            // ============================ 7 ============================
            [
                'title'         => 'Como Coletar Autorização de Uso de Imagem em Eventos Públicos',
                'slug'          => 'autorizacao-uso-imagem-eventos-publicos',
                'focus_keyword' => 'autorização de uso de imagem eventos públicos',
                'meta_title'    => 'Autorização de Uso de Imagem em Eventos Públicos',
                'meta_description' => 'Como coletar autorização de uso de imagem em eventos públicos conforme a LGPD: avisos de captação, termos, casos sensíveis e arquivamento.',
                'categoria'     => 'lgpd-protecao-de-dados',
                'tags'          => ['Direito de Imagem', 'LGPD', 'Comunicação Pública', 'Conformidade'],
                'excerpt'       => 'Avisos de captação, termos de autorização e fluxo de arquivamento para usar imagens de eventos públicos com segurança jurídica.',
                'intro'         => 'A foto da inauguração, o vídeo da formatura, o registro do mutirão de saúde: imagens são o coração da comunicação pública. Mas imagem de pessoa identificável é <strong>dado pessoal</strong>. Coletar autorização de forma organizada protege o cidadão e blinda o órgão.',
                'sections'      => [
                    ['h2' => 'Imagem é dado pessoal',
                     'body' => '<p>Sob a LGPD, a imagem que identifica alguém é dado pessoal e, em certas situações (saúde, crianças, vulnerabilidade), exige cuidado redobrado. Isso não impede a cobertura de eventos — apenas exige <strong>finalidade clara e base legal</strong>.</p>'],
                    ['h2' => 'Aviso de captação no local',
                     'body' => '<p>Em eventos abertos, o caminho mais prático é informar antecipadamente que haverá captação de imagens para fins institucionais. Use:</p><ul><li>Placas e banners na entrada com aviso de filmagem/fotografia.</li><li>Texto no convite e na inscrição online.</li><li>Locução no início do evento.</li></ul>'],
                    ['h2' => 'Termo de autorização: quando usar',
                     'body' => '<p>Para usos mais específicos — depoimentos, campanhas com destaque a uma pessoa, materiais publicitários —, colete um <strong>termo de autorização de uso de imagem</strong> individual, informando onde e por quanto tempo a imagem será usada.</p><h3>O que o termo deve conter</h3><ul><li>Identificação do titular.</li><li>Finalidade e canais de uso.</li><li>Prazo e forma de revogação.</li></ul>'],
                    ['h2' => 'Casos sensíveis',
                     'body' => '<p>Crianças, pacientes, pessoas em situação de rua e beneficiários de programas sociais merecem proteção máxima. Nesses casos, prefira autorização específica do responsável e avalie se a exposição é mesmo necessária.</p>'],
                    ['h2' => 'Arquivamento e governança',
                     'body' => '<p>Guarde os termos e a relação entre cada imagem publicada e sua autorização. Se alguém pedir a remoção, você precisa localizar o material rapidamente. Organização hoje evita dor de cabeça amanhã.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Preciso de termo de todos os presentes num evento grande?', 'a' => 'Não. Em eventos públicos, o aviso de captação costuma bastar para imagens gerais. O termo individual fica para usos específicos e destacados.'],
                    ['q' => 'E se a pessoa pedir para retirar a foto depois?', 'a' => 'O pedido deve ser atendido sempre que possível. Por isso o arquivamento que relaciona imagem e autorização é tão importante.'],
                    ['q' => 'Posso usar imagens antigas em novas campanhas?', 'a' => 'Verifique a finalidade autorizada originalmente. Uso muito diferente do informado pode exigir nova autorização.'],
                ],
                'conclusion'    => 'Usar imagens de eventos com segurança é questão de <strong>processo</strong>: avisar a captação, coletar termos quando necessário, proteger casos sensíveis e arquivar tudo de forma rastreável. Assim a comunicação registra a vida pública sem ferir direitos.',
            ],

            // ============================ 8 ============================
            [
                'title'         => 'Publicação de Fotos de Crianças em Redes Sociais Governamentais',
                'slug'          => 'fotos-de-criancas-redes-sociais-governamentais',
                'focus_keyword' => 'fotos de crianças redes sociais governamentais',
                'meta_title'    => 'Fotos de Crianças em Redes Governamentais: regras',
                'meta_description' => 'Regras e cuidados para publicar fotos de crianças e adolescentes em redes sociais governamentais conforme a LGPD e o ECA: consentimento, proteção e bom senso.',
                'categoria'     => 'lgpd-protecao-de-dados',
                'tags'          => ['Proteção de Crianças', 'LGPD', 'Direito de Imagem', 'Comunicação Pública'],
                'excerpt'       => 'O que a LGPD e o ECA exigem para publicar imagens de crianças e adolescentes em perfis oficiais — e como reduzir riscos com responsabilidade.',
                'intro'         => 'Fotos de crianças em uma creche municipal, na entrega de material escolar ou em uma campanha de vacinação geram engajamento e mostram a política pública funcionando. Mas envolvem o público mais sensível de todos. A LGPD e o <strong>ECA</strong> exigem cuidado máximo — e a regra prática é simples: na dúvida, proteja.',
                'sections'      => [
                    ['h2' => 'O melhor interesse da criança vem antes do engajamento',
                     'body' => '<p>A LGPD determina que o tratamento de dados de crianças e adolescentes seja feito em seu <strong>melhor interesse</strong>. Nenhuma meta de alcance justifica expor um menor a riscos. Esse princípio orienta toda decisão de publicação.</p>'],
                    ['h2' => 'Consentimento específico dos responsáveis',
                     'body' => '<p>Para crianças (até 12 anos), a regra geral é o <strong>consentimento específico e destacado de pelo menos um dos pais ou responsável</strong>. Tenha um termo próprio, separado das autorizações gerais do evento.</p>'],
                    ['h2' => 'Técnicas de proteção',
                     'body' => '<ul><li>Prefira fotos que não identifiquem individualmente (de costas, de longe, em grupo).</li><li>Use desfoque em rostos quando a identificação não for necessária.</li><li>Nunca publique dados que localizem a criança (escola + horário + rotina).</li></ul>'],
                    ['h2' => 'O que nunca publicar',
                     'body' => '<ul><li>Crianças em situação de vulnerabilidade, acolhimento ou medida socioeducativa.</li><li>Dados de saúde de menores.</li><li>Informações que permitam rastrear a localização da criança.</li></ul>'],
                    ['h2' => 'Fluxo seguro para a equipe',
                     'body' => '<p>Crie um checkpoint: antes de publicar qualquer imagem com menores, alguém confirma se há autorização, se a identificação é necessária e se não há risco. Esse "freio" simples evita a maioria dos problemas.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Posso publicar foto de criança com autorização da escola?', 'a' => 'A autorização deve ser dos pais ou responsáveis legais. A escola pode intermediar a coleta, mas o consentimento é da família.'],
                    ['q' => 'Desfocar o rosto resolve?', 'a' => 'Ajuda muito quando a identificação não é necessária, mas avalie também o contexto: outros elementos podem identificar a criança.'],
                    ['q' => 'E imagens de formatura ou eventos escolares?', 'a' => 'Trate com consentimento dos responsáveis e bom senso. Imagens em grupo, sem destaque individual, oferecem menor risco.'],
                ],
                'conclusion'    => 'Com crianças, a régua é a mais alta possível: <strong>consentimento dos responsáveis, minimização da identificação e foco no melhor interesse do menor</strong>. Uma boa imagem nunca vale o risco de expor uma criança — e a comunicação pública responsável sabe disso.',
            ],

            // ============================ 9 ============================
            [
                'title'         => 'Monitoramento de Redes Sociais e os Limites da LGPD',
                'slug'          => 'monitoramento-redes-sociais-limites-lgpd',
                'focus_keyword' => 'monitoramento de redes sociais LGPD',
                'meta_title'    => 'Monitoramento de Redes Sociais e os Limites da LGPD',
                'meta_description' => 'Até onde o setor público pode monitorar redes sociais? Entenda os limites da LGPD para social listening, coleta de menções e dossiês de cidadãos.',
                'categoria'     => 'lgpd-protecao-de-dados',
                'tags'          => ['Monitoramento', 'LGPD', 'Social Listening', 'Transparência'],
                'excerpt'       => 'O que o órgão público pode e não pode fazer ao monitorar redes sociais: finalidade legítima, dados públicos e a fronteira da vigilância.',
                'intro'         => 'Monitorar o que se fala sobre um serviço público ajuda a melhorar o atendimento e a antecipar crises. Mas existe uma linha tênue entre <strong>ouvir o cidadão</strong> e <strong>vigiá-lo</strong>. A LGPD define onde está essa linha — e cruzá-la traz consequências sérias.',
                'sections'      => [
                    ['h2' => 'Dado público continua sendo dado pessoal',
                     'body' => '<p>Um equívoco comum: "se está público na internet, posso usar como quiser". A LGPD diz o contrário. Dados tornados manifestamente públicos pelo titular podem ser tratados, mas ainda assim com <strong>finalidade legítima e proporcional</strong> — não para qualquer uso.</p>'],
                    ['h2' => 'Monitoramento legítimo',
                     'body' => '<ul><li>Acompanhar menções à marca/serviço para melhorar o atendimento.</li><li>Identificar dúvidas recorrentes e crises emergentes.</li><li>Medir percepção sobre campanhas e políticas.</li></ul>'],
                    ['h2' => 'O que ultrapassa o limite',
                     'body' => '<ul><li>Montar <strong>dossiês</strong> de cidadãos ou opositores.</li><li>Perfilamento político de pessoas.</li><li>Rastrear indivíduos específicos sem finalidade pública legítima.</li></ul><p>Esse tipo de uso pode configurar desvio de finalidade e até abuso de poder.</p>'],
                    ['h2' => 'Boas práticas de governança',
                     'body' => '<p>Documente a finalidade do monitoramento, trabalhe com dados agregados sempre que possível e defina prazo de retenção. Relatórios devem falar de <strong>tendências</strong>, não de pessoas.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Posso guardar prints de quem critica a gestão?', 'a' => 'Guardar com a finalidade de perseguir ou perfilar opositores é desvio de finalidade. Monitoramento legítimo foca em tendências e melhoria do serviço, não em indivíduos.'],
                    ['q' => 'Dado público pode ser usado livremente?', 'a' => 'Não. Mesmo dados públicos exigem finalidade legítima e tratamento proporcional sob a LGPD.'],
                    ['q' => 'Ferramentas de monitoramento são proibidas?', 'a' => 'Não. São úteis e legítimas quando usadas para entender percepção e melhorar o atendimento, com governança e foco em dados agregados.'],
                ],
                'conclusion'    => 'Monitorar redes é legítimo e recomendável — desde que a bússola seja <strong>melhorar o serviço público</strong>, não vigiar pessoas. Finalidade clara, dados agregados e prazo de retenção mantêm o órgão do lado certo da linha.',
            ],

            // ============================ 10 ============================
            [
                'title'         => 'Como Evitar Vazamentos de Dados nas Redes Oficiais',
                'slug'          => 'como-evitar-vazamentos-dados-redes-oficiais',
                'focus_keyword' => 'evitar vazamento de dados redes oficiais',
                'meta_title'    => 'Como Evitar Vazamentos de Dados nas Redes Oficiais',
                'meta_description' => 'Práticas para evitar vazamentos de dados nas redes sociais oficiais: controle de acesso, 2FA, treinamento da equipe e plano de resposta a incidentes.',
                'categoria'     => 'lgpd-protecao-de-dados',
                'tags'          => ['Segurança da Informação', 'LGPD', 'Boas Práticas', 'Gestão de Crises'],
                'excerpt'       => 'Controle de acesso, 2FA, treinamento e plano de resposta: como reduzir o risco de vazamento de dados nas redes sociais oficiais.',
                'intro'         => 'Vazamentos raramente vêm de hackers sofisticados. Vêm de uma senha compartilhada, de um print com dados de cidadão, de um acesso que ninguém revogou. Proteger as redes oficiais é, antes de tudo, <strong>disciplina operacional</strong> — e dá para implementar sem grande orçamento.',
                'sections'      => [
                    ['h2' => 'Mapeie onde estão os dados',
                     'body' => '<p>Comece sabendo o que você guarda: mensagens diretas, planilhas de leads, prints de atendimento, listas de transmissão. Não dá para proteger o que não se conhece. Faça um inventário simples.</p>'],
                    ['h2' => 'Controle de acesso e 2FA',
                     'body' => '<ul><li>Cada pessoa com seu próprio acesso — nada de login compartilhado.</li><li>Verificação em duas etapas obrigatória em todas as contas.</li><li>Revogação imediata quando alguém deixa a equipe.</li></ul>'],
                    ['h2' => 'O fator humano',
                     'body' => '<p>A maior vulnerabilidade é a falta de treino. Capacite a equipe para: não repetir dados sensíveis em respostas públicas, reconhecer tentativas de phishing e tratar prints com responsabilidade. Política só funciona quando vira hábito.</p>'],
                    ['h2' => 'Minimização de dados',
                     'body' => '<p>Colete apenas o necessário e descarte o que não serve mais. Planilhas antigas de leads, prints acumulados e exportações esquecidas são munição para um vazamento. Menos dado guardado, menos risco.</p>'],
                    ['h2' => 'Plano de resposta a incidentes',
                     'body' => '<p>Tenha um procedimento escrito: quem aciona, como conter, como comunicar e quando notificar a ANPD e os titulares. Responder rápido e de forma transparente reduz o dano e demonstra responsabilidade.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Login compartilhado é mesmo tão grave?', 'a' => 'Sim. Sem rastreabilidade de quem fez o quê, você perde controle e responsabilização — e basta uma pessoa para comprometer tudo.'],
                    ['q' => 'Preciso notificar todo incidente à ANPD?', 'a' => 'Incidentes com risco relevante aos titulares devem ser comunicados à ANPD e aos afetados. Ter um plano definido evita decisões improvisadas na hora da crise.'],
                    ['q' => 'Por onde começar com pouco recurso?', 'a' => 'Por 2FA, fim do login compartilhado e treinamento básico da equipe. São as medidas de maior impacto e menor custo.'],
                ],
                'conclusion'    => 'Evitar vazamentos é somar <strong>controle de acesso, cultura de segurança e minimização de dados</strong>, com um plano de resposta pronto. A maioria dos incidentes é evitável com hábitos simples — e o custo de preveni-los é uma fração do custo de remediá-los.',
            ],

            // ============================ 11 ============================
            [
                'title'         => 'Gestão de Crises em Mídias Sociais Governamentais',
                'slug'          => 'gestao-de-crises-midias-sociais-governamentais',
                'focus_keyword' => 'gestão de crises mídias sociais governamentais',
                'meta_title'    => 'Gestão de Crises em Mídias Sociais Governamentais',
                'meta_description' => 'Como prevenir e responder a crises nas mídias sociais governamentais: comitê, protocolos, tom de voz e o passo a passo das primeiras horas.',
                'categoria'     => 'gestao-de-crises',
                'tags'          => ['Gestão de Crises', 'Comunicação Pública', 'Boas Práticas', 'Transparência'],
                'excerpt'       => 'Comitê, protocolos e tom de voz: como preparar o órgão para responder a crises nas redes sociais antes que elas aconteçam.',
                'intro'         => 'Uma postagem mal interpretada, um perfil invadido, um vazamento, uma tragédia na cidade. Em mídias sociais governamentais, a crise não pergunta se você está pronto. A diferença entre um problema controlado e um desastre reputacional está na <strong>preparação prévia</strong> — não na improvisação do momento.',
                'sections'      => [
                    ['h2' => 'Antes da crise: prevenção',
                     'body' => '<ul><li>Defina um <strong>comitê de crise</strong> com papéis claros (comunicação, jurídico, gabinete, TI).</li><li>Tenha protocolos escritos para os cenários mais prováveis.</li><li>Mantenha acessos seguros (2FA) para evitar a crise da conta invadida.</li></ul>'],
                    ['h2' => 'As primeiras horas',
                     'body' => '<p>O relógio da crise é implacável. Um roteiro para as primeiras horas:</p><ul><li><strong>Avalie</strong> a dimensão antes de reagir (não alimente o que é pequeno).</li><li><strong>Alinhe</strong> a versão oficial com o comitê.</li><li><strong>Posicione-se</strong> com rapidez e transparência quando o tema for relevante.</li><li><strong>Monitore</strong> a repercussão e ajuste.</li></ul>'],
                    ['h2' => 'Tom de voz na crise',
                     'body' => '<p>Em emergências e tragédias, sobriedade e empatia vêm antes de qualquer marketing. Suspenda postagens promocionais agendadas. O cidadão precisa de <strong>informação útil</strong> e respeito, não de slogan.</p>'],
                    ['h2' => 'Crise de conta invadida',
                     'body' => '<p>Se o perfil for sequestrado: acione a recuperação imediatamente, comunique pelos canais alternativos (site, outras redes), oriente o cidadão a desconsiderar mensagens suspeitas e registre o incidente. Por isso 2FA e múltiplos administradores são inegociáveis.</p>'],
                    ['h2' => 'Depois: aprendizado',
                     'body' => '<p>Toda crise termina em relatório. O que falhou? O protocolo funcionou? O que mudar? A maturidade de uma equipe se constrói revisando cada episódio.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Devo responder a toda crítica para evitar crise?', 'a' => 'Não. Avalie a dimensão. Responder a tudo pode amplificar o que era pequeno. Foque no que é relevante e factual.'],
                    ['q' => 'O que fazer se a conta oficial for invadida?', 'a' => 'Acione a recuperação na hora, comunique por canais alternativos, oriente o público e registre o incidente. Prevenção com 2FA reduz drasticamente esse risco.'],
                    ['q' => 'Posso manter posts agendados durante uma tragédia?', 'a' => 'Não. Suspenda conteúdos promocionais imediatamente; o tom deve ser de informação e empatia.'],
                ],
                'conclusion'    => 'Gestão de crises é 90% <strong>preparação</strong> e 10% reação. Comitê definido, protocolos escritos, contas seguras e tom de voz humano fazem o órgão atravessar a tempestade com credibilidade preservada.',
            ],

            // ============================ 12 ============================
            [
                'title'         => 'Social Listening no Setor Público: O Que é Permitido',
                'slug'          => 'social-listening-setor-publico-permitido',
                'focus_keyword' => 'social listening setor público',
                'meta_title'    => 'Social Listening no Setor Público: o que é permitido',
                'meta_description' => 'O que é social listening, para que serve no setor público e quais são os limites legais e éticos do monitoramento de conversas conforme a LGPD.',
                'categoria'     => 'ferramentas-ia',
                'tags'          => ['Social Listening', 'Monitoramento', 'LGPD', 'Comunicação Pública'],
                'excerpt'       => 'Como usar social listening para melhorar políticas e serviços públicos respeitando os limites legais e éticos da LGPD.',
                'intro'         => 'Social listening é a escuta estruturada das conversas públicas sobre um tema, marca ou serviço. No setor público, é uma ferramenta valiosa para entender a percepção do cidadão e melhorar políticas — desde que praticada dentro dos <strong>limites legais e éticos</strong>.',
                'sections'      => [
                    ['h2' => 'O que é (e o que não é) social listening',
                     'body' => '<p>Social listening analisa <strong>tendências e sentimentos</strong> em conversas públicas — volume de menções, temas recorrentes, percepção sobre uma campanha. Não é, e não pode ser, vigilância de indivíduos ou construção de perfis políticos.</p>'],
                    ['h2' => 'Para que serve no setor público',
                     'body' => '<ul><li>Detectar dúvidas e reclamações recorrentes sobre serviços.</li><li>Antecipar crises observando picos de menções negativas.</li><li>Avaliar o impacto de campanhas de utilidade pública.</li><li>Identificar desinformação para corrigir com informação oficial.</li></ul>'],
                    ['h2' => 'Os limites da LGPD',
                     'body' => '<p>Trabalhe com <strong>dados agregados</strong> e finalidade legítima. Relatórios devem mostrar padrões, não nomes. Coletar e armazenar perfis de cidadãos identificados, fora de uma finalidade pública clara, ultrapassa o permitido.</p>'],
                    ['h2' => 'Ética antes da ferramenta',
                     'body' => '<p>A pergunta-guia é simples: "isso serve para melhorar o serviço ou para monitorar pessoas?". Se a resposta tende ao segundo, pare. Tecnologia não legitima desvio de finalidade.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Social listening é legal no setor público?', 'a' => 'Sim, quando voltado a entender percepção e melhorar serviços, com dados agregados e finalidade legítima. Vira problema quando se transforma em vigilância de indivíduos.'],
                    ['q' => 'Posso identificar quem fez uma crítica?', 'a' => 'O foco do social listening é o padrão coletivo, não a perseguição individual. Identificar e arquivar críticos configura desvio de finalidade.'],
                    ['q' => 'Preciso de ferramenta paga?', 'a' => 'Não necessariamente. Dá para começar com buscas e métricas nativas das plataformas; ferramentas pagas escalam a análise.'],
                ],
                'conclusion'    => 'Social listening bem-feito é <strong>inteligência a serviço do cidadão</strong>: ouve tendências, antecipa problemas e qualifica decisões. A linha vermelha é clara — escutar a sociedade, sim; vigiar pessoas, jamais.',
            ],

            // ============================ 13 ============================
            [
                'title'         => 'Chatbots e Inteligência Artificial na Comunicação Governamental',
                'slug'          => 'chatbots-ia-comunicacao-governamental',
                'focus_keyword' => 'chatbots IA comunicação governamental',
                'meta_title'    => 'Chatbots e IA na Comunicação Governamental',
                'meta_description' => 'Como usar chatbots e inteligência artificial na comunicação governamental com transparência, LGPD e atendimento humano de retaguarda.',
                'categoria'     => 'ferramentas-ia',
                'tags'          => ['Chatbots', 'Inteligência Artificial', 'LGPD', 'Comunicação Pública'],
                'excerpt'       => 'Chatbots e IA podem agilizar o atendimento público — se houver transparência, base legal e uma retaguarda humana. Veja como implementar.',
                'intro'         => 'Chatbots respondem dúvidas 24 horas, reduzem filas e liberam servidores para casos complexos. Com IA generativa, ficaram ainda mais capazes. Mas, no serviço público, automatizar o atendimento exige <strong>transparência, base legal e responsabilidade</strong> — porque do outro lado está um cidadão exercendo um direito.',
                'sections'      => [
                    ['h2' => 'Onde o chatbot ajuda de verdade',
                     'body' => '<ul><li>Respostas a perguntas frequentes (horários, documentos, endereços).</li><li>Encaminhamento inteligente para o setor certo.</li><li>Primeiro nível de triagem, com escalonamento para humano.</li></ul>'],
                    ['h2' => 'Transparência é obrigatória',
                     'body' => '<p>O cidadão tem o direito de saber que conversa com uma máquina. Identifique o atendimento como automatizado e ofereça sempre uma <strong>saída para atendimento humano</strong>. Fingir que um bot é pessoa quebra a confiança.</p>'],
                    ['h2' => 'LGPD e os dados que o bot coleta',
                     'body' => '<p>Chatbots coletam dados — às vezes sensíveis. Defina o que será coletado, com qual base legal, por quanto tempo será guardado e quem terá acesso. Não peça mais do que o necessário para resolver a demanda.</p>'],
                    ['h2' => 'IA generativa: cuidados extras',
                     'body' => '<p>Modelos de IA podem "alucinar" respostas. Em serviço público, informação errada tem consequência real. Restrinja o bot a fontes oficiais, revise os fluxos e <strong>nunca</strong> deixe a IA decidir sozinha sobre direitos do cidadão.</p>'],
                    ['h2' => 'Retaguarda humana',
                     'body' => '<p>Automação não substitui pessoas; redistribui o esforço. Garanta que casos sensíveis, reclamações e situações de vulnerabilidade cheguem rápido a um servidor preparado.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Preciso avisar que o atendimento é por chatbot?', 'a' => 'Sim. A transparência sobre o uso de automação é uma boa prática essencial e fortalece a confiança no canal.'],
                    ['q' => 'Posso usar IA generativa no atendimento público?', 'a' => 'Pode, com cautela: restrinja a fontes oficiais, revise fluxos e mantenha decisão humana sobre direitos. IA apoia, não decide.'],
                    ['q' => 'O chatbot pode coletar CPF do cidadão?', 'a' => 'Somente se necessário à finalidade, com base legal, ambiente seguro e prazo de retenção definido. Minimize a coleta.'],
                ],
                'conclusion'    => 'Chatbots e IA são aliados poderosos do atendimento público quando vêm com <strong>transparência, conformidade e retaguarda humana</strong>. A tecnologia agiliza; a responsabilidade continua sendo do órgão.',
            ],

            // ============================ 14 ============================
            [
                'title'         => 'Como Criar um Manual de Redes Sociais para Prefeituras',
                'slug'          => 'como-criar-manual-redes-sociais-prefeituras',
                'focus_keyword' => 'manual de redes sociais prefeituras',
                'meta_title'    => 'Como Criar um Manual de Redes Sociais para Prefeituras',
                'meta_description' => 'Passo a passo para criar um manual de redes sociais para prefeituras: tom de voz, fluxos de aprovação, identidade visual, LGPD e gestão de crises.',
                'categoria'     => 'operacao-de-redes',
                'tags'          => ['Prefeituras', 'Comunicação Pública', 'Boas Práticas', 'Operação de Redes'],
                'excerpt'       => 'O que não pode faltar em um manual de redes sociais de prefeitura: tom de voz, fluxos, identidade, LGPD, moderação e crises.',
                'intro'         => 'Quando cada servidor publica do seu jeito, a comunicação da prefeitura vira uma colcha de retalhos — e fica vulnerável a erros e crises. Um <strong>manual de redes sociais</strong> padroniza, profissionaliza e protege. Ele é o documento que faz a operação funcionar mesmo quando a equipe muda.',
                'sections'      => [
                    ['h2' => 'Por que sua prefeitura precisa de um manual',
                     'body' => '<p>O manual transforma conhecimento que está "na cabeça" de uma pessoa em <strong>processo institucional</strong>. Garante consistência, acelera a integração de novos membros e reduz o risco de publicações problemáticas.</p>'],
                    ['h2' => 'Tom de voz e identidade',
                     'body' => '<p>Defina como a prefeitura fala: próxima, formal, didática? Documente vocabulário, uso de emojis, tratamento ao cidadão. Padronize a <strong>identidade visual</strong>: cores, fontes, modelos de arte, uso correto do brasão e das logos.</p>'],
                    ['h2' => 'Fluxos de aprovação',
                     'body' => '<ul><li>Quem cria, quem revisa, quem aprova e quem publica.</li><li>Prazos e responsáveis por cada etapa.</li><li>Procedimento especial para temas sensíveis (saúde, segurança, tragédias).</li></ul>'],
                    ['h2' => 'LGPD e moderação no manual',
                     'body' => '<p>Inclua as regras de proteção de dados (o que não publicar, como tratar comentários com dados pessoais) e a <strong>política de moderação</strong>. Assim, toda a equipe age igual diante de um comentário sensível.</p>'],
                    ['h2' => 'Gestão de crises e calendário',
                     'body' => '<p>Reserve uma seção para o protocolo de crise (quem aciona, o que fazer) e estabeleça um <strong>calendário editorial</strong> que equilibre datas comemorativas, campanhas e prestação de contas.</p>'],
                    ['h2' => 'Mantenha vivo',
                     'body' => '<p>Manual engessado morre na gaveta. Revise periodicamente, atualize com novos aprendizados e mantenha acessível a toda a equipe.</p>'],
                ],
                'faq'           => [
                    ['q' => 'Qual o tamanho ideal de um manual?', 'a' => 'O suficiente para ser usado. Prefira um documento objetivo e consultável a um calhamaço que ninguém lê. Comece enxuto e evolua.'],
                    ['q' => 'O manual precisa ser público?', 'a' => 'As regras de convivência e moderação ganham com a transparência. Já fluxos internos e senhas, evidentemente, ficam restritos.'],
                    ['q' => 'Com que frequência revisar?', 'a' => 'Ao menos uma vez por ano, ou sempre que houver mudança relevante de plataforma, equipe ou legislação.'],
                ],
                'conclusion'    => 'Um bom manual de redes sociais é o <strong>sistema operacional</strong> da comunicação da prefeitura: padroniza tom, organiza fluxos, incorpora a LGPD e prepara para crises. É o que separa uma operação amadora de uma comunicação pública profissional.',
            ],

            // ============================ 15 ============================
            [
                'title'         => 'Checklist Completo de Conformidade LGPD para Equipes de Comunicação',
                'slug'          => 'checklist-conformidade-lgpd-equipes-comunicacao',
                'focus_keyword' => 'checklist LGPD comunicação',
                'meta_title'    => 'Checklist de Conformidade LGPD para Comunicação',
                'meta_description' => 'Checklist prático de conformidade LGPD para equipes de comunicação do setor público: acessos, dados, moderação, imagens, anúncios e resposta a incidentes.',
                'categoria'     => 'lgpd-protecao-de-dados',
                'tags'          => ['LGPD', 'Conformidade', 'Comunicação Pública', 'Boas Práticas'],
                'excerpt'       => 'Um checklist objetivo para a equipe de comunicação pública verificar, ponto a ponto, sua conformidade com a LGPD nas redes sociais.',
                'intro'         => 'Depois de entender os conceitos, falta o mais prático: <strong>verificar, item a item</strong>, se a operação está conforme. Este checklist reúne os pontos essenciais de LGPD para equipes de comunicação do setor público. Use-o como auditoria periódica — de preferência mensal.',
                'sections'      => [
                    ['h2' => '1. Acessos e segurança',
                     'body' => '<ul><li>Páginas e contas de anúncios são propriedade do órgão (Business Manager), não de pessoas.</li><li>Verificação em duas etapas (2FA) ativa em todas as contas.</li><li>Nenhum login compartilhado; cada pessoa com seu acesso.</li><li>Acessos revogados imediatamente em desligamentos.</li></ul>'],
                    ['h2' => '2. Dados e finalidade',
                     'body' => '<ul><li>Inventário do que é coletado (DMs, leads, prints, listas).</li><li>Cada coleta tem finalidade e base legal definidas.</li><li>Prazo de retenção estabelecido e cumprido.</li><li>Dados não são reutilizados para finalidade incompatível.</li></ul>'],
                    ['h2' => '3. Comentários e atendimento',
                     'body' => '<ul><li>Política de moderação escrita e publicada.</li><li>Procedimento para ocultar dados pessoais expostos.</li><li>Atendimento sensível levado para canal privado e seguro.</li><li>Registro das ações de moderação.</li></ul>'],
                    ['h2' => '4. Imagens',
                     'body' => '<ul><li>Aviso de captação em eventos.</li><li>Termos de autorização para usos específicos.</li><li>Cuidado redobrado com crianças e grupos vulneráveis.</li><li>Arquivamento que relaciona imagem e autorização.</li></ul>'],
                    ['h2' => '5. Anúncios e mensuração',
                     'body' => '<ul><li>Segmentação sem dados sensíveis.</li><li>Listas personalizadas só com base legal adequada.</li><li>Pixel/Analytics informados na política de privacidade.</li><li>Contratação de mídia documentada (Lei 14.133/2021).</li></ul>'],
                    ['h2' => '6. Resposta a incidentes',
                     'body' => '<ul><li>Plano de resposta escrito e conhecido pela equipe.</li><li>Responsáveis por acionar e conter definidos.</li><li>Procedimento de notificação à ANPD e aos titulares.</li><li>Revisão pós-incidente para aprendizado.</li></ul>'],
                ],
                'faq'           => [
                    ['q' => 'Com que frequência rodar este checklist?', 'a' => 'O ideal é uma verificação mensal e uma auditoria mais ampla a cada trimestre, registrando o que foi conferido.'],
                    ['q' => 'Por onde começar se estou do zero?', 'a' => 'Comece pela seção 1 (acessos e segurança): é a de maior risco e maior impacto, com soluções rápidas como 2FA e fim do login compartilhado.'],
                    ['q' => 'Quem deve ser responsável pelo checklist?', 'a' => 'Idealmente um responsável na equipe de comunicação, em diálogo com o encarregado de dados (DPO) do órgão.'],
                ],
                'conclusion'    => 'Conformidade com a LGPD não é um projeto com fim — é uma <strong>rotina</strong>. Com este checklist em mãos e uma auditoria periódica, a equipe de comunicação transforma a proteção de dados em hábito e protege tanto o cidadão quanto a gestão.',
            ],
        ];
    }
}
