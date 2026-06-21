<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ── Cabeçalho da nova seção "A Experiência" ──────────────
        Schema::table('seminarios', function (Blueprint $table) {
            if (! Schema::hasColumn('seminarios', 'exp_kicker')) {
                $table->string('exp_kicker')->default('A experiência')->after('descricao');
            }
            if (! Schema::hasColumn('seminarios', 'exp_titulo')) {
                $table->string('exp_titulo')->nullable()->after('exp_kicker');
            }
            if (! Schema::hasColumn('seminarios', 'exp_lead')) {
                $table->text('exp_lead')->nullable()->after('exp_titulo');
            }
        });

        // ── Programação: período + tópicos por painel ────────────
        Schema::table('seminario_dias', function (Blueprint $table) {
            if (! Schema::hasColumn('seminario_dias', 'periodo')) {
                $table->string('periodo')->nullable()->after('rotulo');
            }
            if (! Schema::hasColumn('seminario_dias', 'topicos')) {
                $table->json('topicos')->nullable()->after('titulo');
            }
        });

        // ── Nova tabela: vantagens / experiências do evento ──────
        if (! Schema::hasTable('seminario_vantagens')) {
            Schema::create('seminario_vantagens', function (Blueprint $table) {
                $table->id();
                $table->foreignId('seminario_id')->constrained()->cascadeOnDelete();
                $table->string('icone')->default('star');
                $table->string('titulo');
                $table->text('descricao')->nullable();
                $table->string('foto')->nullable();           // caminho relativo em public/
                $table->boolean('destaque')->default(false);  // card grande (bento)
                $table->unsignedSmallInteger('ordem')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('seminario_vantagens');

        Schema::table('seminario_dias', function (Blueprint $table) {
            $table->dropColumn(['periodo', 'topicos']);
        });

        Schema::table('seminarios', function (Blueprint $table) {
            $table->dropColumn(['exp_kicker', 'exp_titulo', 'exp_lead']);
        });
    }
};
