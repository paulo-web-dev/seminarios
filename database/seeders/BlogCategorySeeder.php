<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'LGPD & Proteção de Dados', 'description' => 'Como aplicar a Lei Geral de Proteção de Dados na comunicação e nas redes sociais do setor público.'],
            ['name' => 'Publicidade & Anúncios',   'description' => 'Publicidade institucional, impulsionamento e mídia paga em órgãos públicos com conformidade.'],
            ['name' => 'Operação de Redes',         'description' => 'Rotina, processos e governança da operação de redes sociais governamentais.'],
            ['name' => 'Gestão de Crises',          'description' => 'Prevenção e resposta a crises e incidentes nas mídias sociais oficiais.'],
            ['name' => 'Ferramentas & IA',          'description' => 'Ferramentas de gestão, monitoramento, chatbots e inteligência artificial na comunicação pública.'],
        ];

        foreach ($categories as $c) {
            Category::firstOrCreate(['slug' => \Illuminate\Support\Str::slug($c['name'])], $c);
        }
    }
}
