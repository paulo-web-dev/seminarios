<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── Colunas de cabeçalho das novas seções + Madalosso ────
        Schema::table('seminarios', function (Blueprint $table) {
            foreach ([
                'beneficios_kicker'   => 'Vantagens',
                'beneficios_titulo'   => null,
                'metodologia_kicker'  => 'Metodologia',
                'metodologia_titulo'  => null,
                'invest_kicker'       => 'Investimento',
                'invest_lead'         => null,
            ] as $col => $default) {
                if (! Schema::hasColumn('seminarios', $col)) {
                    $default === null
                        ? $table->text($col)->nullable()->after('exp_lead')
                        : $table->string($col)->default($default)->after('exp_lead');
                }
            }
            if (! Schema::hasColumn('seminarios', 'beneficios_lead')) {
                $table->text('beneficios_lead')->nullable()->after('beneficios_titulo');
            }
            if (! Schema::hasColumn('seminarios', 'metodologia_lead')) {
                $table->text('metodologia_lead')->nullable()->after('metodologia_titulo');
            }
            // Bloco "Almoço Madalosso" (JSON: titulo, lead, foto, highlights[])
            if (! Schema::hasColumn('seminarios', 'madalosso')) {
                $table->json('madalosso')->nullable()->after('metodologia_lead');
            }
        });

        // ── Benefícios (grade de ícones) ─────────────────────────
        if (! Schema::hasTable('seminario_beneficios')) {
            Schema::create('seminario_beneficios', function (Blueprint $table) {
                $table->id();
                $table->foreignId('seminario_id')->constrained()->cascadeOnDelete();
                $table->string('icone')->default('gift');
                $table->string('titulo');
                $table->text('descricao')->nullable();
                $table->unsignedSmallInteger('ordem')->default(0);
                $table->timestamps();
            });
        }

        // ── Metodologia (lista numerada) ─────────────────────────
        if (! Schema::hasTable('seminario_metodologias')) {
            Schema::create('seminario_metodologias', function (Blueprint $table) {
                $table->id();
                $table->foreignId('seminario_id')->constrained()->cascadeOnDelete();
                $table->string('titulo');
                $table->text('descricao')->nullable();
                $table->unsignedSmallInteger('ordem')->default(0);
                $table->timestamps();
            });
        }

        // ── Planos de investimento (cards comparativos) ──────────
        if (! Schema::hasTable('seminario_planos')) {
            Schema::create('seminario_planos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('seminario_id')->constrained()->cascadeOnDelete();
                $table->string('nome');
                $table->string('preco');                       // "R$ 3.300,00"
                $table->string('periodo')->default('por pessoa');
                $table->json('itens')->nullable();             // [{label, incluso}]
                $table->boolean('destaque')->default(false);
                $table->string('cta_texto')->default('Falar com um consultor');
                $table->unsignedSmallInteger('ordem')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('seminario_planos');
        Schema::dropIfExists('seminario_metodologias');
        Schema::dropIfExists('seminario_beneficios');

        Schema::table('seminarios', function (Blueprint $table) {
            $table->dropColumn([
                'beneficios_kicker', 'beneficios_titulo', 'beneficios_lead',
                'metodologia_kicker', 'metodologia_titulo', 'metodologia_lead',
                'invest_kicker', 'invest_lead', 'madalosso',
            ]);
        });
    }
};
