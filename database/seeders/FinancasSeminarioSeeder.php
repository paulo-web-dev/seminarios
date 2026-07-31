<?php

namespace Database\Seeders;

use App\Models\Seminario;
use Illuminate\Database\Seeder;

/**
 * Registro base do Seminário Finanças Municipais.
 *
 * A landing (/financas-municipais) é uma view estática (seminarios/financas.blade.php),
 * então NÃO populamos as relações de conteúdo aqui. Este seeder existe para que:
 *   1) os leads do formulário fiquem vinculados a este seminário;
 *   2) o webhook (n8n) receba o título correto em "Seminario";
 *   3) a paleta dourada (coluna `cores`) fique disponível ao controller.
 *
 * É idempotente (updateOrCreate por slug) — pode rodar quantas vezes precisar.
 */
class FinancasSeminarioSeeder extends Seeder
{
    public function run(): void
    {
        $seminario = Seminario::updateOrCreate(
            ['slug' => 'financas-municipais'],
            [
                'ativo'            => true,

                // HERO / identidade
                'badge_topo'       => 'Imersão presencial · 20 a 23 de outubro · Vagas limitadas',
                'titulo'           => 'Seminário Finanças Municipais',
                'titulo_destaque'  => 'Finanças',
                'subtitulo'        => 'Sincronização híbrida na Tesouraria e Contabilidade',
                'descricao'        => 'Quatro dias de imersão para o financeiro municipal dominar tesouraria, contabilidade, arrecadação e conciliação — do empenho ao pagamento, com tecnologia, segurança e a Reforma Tributária.',
                'selos'            => ['Certificação MEC', 'Presencial', 'Centro de Curitiba', 'Turmas reduzidas'],
                'hero_imagem'      => 'img/seminarios/financas/img-evento-cheio.jpg',
                'modalidade'       => 'Presencial · Centro de Curitiba/PR',

                // Cabeçalhos de seção (referência; a view é estática)
                'why_titulo'       => 'Uma imersão pensada para a realidade do financeiro municipal',
                'prog_titulo'      => 'A ementa, painel por painel',
                'who_titulo'       => 'Feito para quem opera as finanças do município',
                'galeria_titulo'   => 'Como são os seminários da Unyflex',
                'speakers_kicker'  => 'Corpo docente',
                'speakers_titulo'  => 'Quem vai te ensinar',
                'invest_badge'     => 'Vagas limitadas',

                // SEO
                'meta_title'       => 'Seminário Finanças Municipais · Tesouraria e Contabilidade | Unyflex',
                'meta_description' => 'Imersão presencial de 4 dias em finanças municipais: tesouraria, contabilidade, arrecadação, conciliação bancária, tecnologia e Reforma Tributária. 20 a 23 de outubro de 2026, Centro de Curitiba.',

                // PALETA DOURADA (sobrescreve a PALETA_PADRAO do model)
                'cores' => [
                    'primary'      => '#7A5518',
                    'primary900'   => '#1A1207',
                    'secondary'    => '#F2A016',
                    'secondary600' => '#DF7C0B',
                    'accent'       => '#E1913A',
                    'dark'         => '#141109',
                    'light'        => '#F6EEE1',
                    'text'         => '#241B0E',
                    'muted'        => '#8A7B62',
                ],
            ]
        );

        $this->command?->info("Seminário Finanças Municipais atualizado: /financas-municipais (id {$seminario->id})");
    }
}
