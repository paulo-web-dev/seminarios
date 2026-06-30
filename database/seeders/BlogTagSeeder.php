<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'LGPD', 'Prefeituras', 'Publicidade Institucional', 'WhatsApp', 'Meta Ads', 'Google Ads',
            'Direito de Imagem', 'Proteção de Crianças', 'Monitoramento', 'Segurança da Informação',
            'Gestão de Crises', 'Social Listening', 'Chatbots', 'Inteligência Artificial',
            'Comunicação Pública', 'Transparência', 'Boas Práticas', 'Conformidade',
        ];

        foreach ($tags as $name) {
            Tag::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);
        }
    }
}
