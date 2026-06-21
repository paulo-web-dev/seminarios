<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seminarios', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();              // gestao-midias-sociais-setor-publico
            $table->boolean('ativo')->default(true);

            // ── HERO ──────────────────────────────────────────────
            $table->string('badge_topo')->nullable();       // "Novo · Vagas limitadas"
            $table->string('titulo');                       // "Gestão de Mídias Sociais no Setor Público"
            $table->string('titulo_destaque')->nullable();  // trecho em ciano: "Mídias Sociais"
            $table->string('subtitulo')->nullable();        // "Operação, Publicidade e LGPD"
            $table->text('descricao')->nullable();          // linha de apoio do hero
            $table->json('selos')->nullable();              // ["Certificado MEC","100% Prático","Ao Vivo"]
            $table->string('hero_imagem')->nullable();      // caminho relativo em public/
            $table->string('modalidade')->nullable();       // "Online + Presencial · Turmas reduzidas"

            // ── SEÇÃO "POR QUE" (cabeçalho) ───────────────────────
            $table->string('why_kicker')->default('Por que participar');
            $table->string('why_titulo')->nullable();
            $table->text('why_lead')->nullable();

            // ── PROGRAMAÇÃO (cabeçalho) ───────────────────────────
            $table->string('prog_kicker')->default('Programação');
            $table->string('prog_titulo')->nullable();
            $table->text('prog_lead')->nullable();

            // ── PARA QUEM (cabeçalho) ─────────────────────────────
            $table->string('who_kicker')->default('Público-alvo');
            $table->string('who_titulo')->nullable();

            // ── GALERIA / PROVA SOCIAL ────────────────────────────
            $table->string('galeria_kicker')->default('Prova social');
            $table->string('galeria_titulo')->nullable();
            $table->text('quote_texto')->nullable();
            $table->string('quote_autor')->nullable();

            // ── PALESTRANTES (cabeçalho) ──────────────────────────
            $table->string('speakers_kicker')->default('Quem ministra');
            $table->string('speakers_titulo')->default('Palestrantes');

            // ── INVESTIMENTO / CTA FINAL ──────────────────────────
            $table->string('invest_badge')->nullable();     // "Vagas se encerrando"
            $table->string('invest_titulo')->nullable();
            $table->string('preco_de')->nullable();         // "De R$ 1.290"
            $table->string('preco_por')->nullable();        // "R$ 690"
            $table->text('invest_obs')->nullable();         // "Emissão de certificado + material digital inclusos."
            $table->string('cta_texto')->default('Quero me inscrever');

            // ── PALETA (override opcional por seminário) ──────────
            $table->json('cores')->nullable();              // {"primary":"#0D3B7A","secondary":"#00C2FF",...}

            // ── META / SEO ────────────────────────────────────────
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seminarios');
    }
};
