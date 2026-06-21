<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminario_id')->nullable()->constrained()->nullOnDelete();
            $table->string('nome');
            $table->string('email');
            $table->string('telefone')->nullable();
            $table->string('orgao')->nullable();     // órgão / prefeitura
            $table->string('cargo')->nullable();
            $table->text('mensagem')->nullable();
            $table->string('origem')->nullable();    // utm_source / canal
            $table->string('status')->default('novo'); // novo | contatado | inscrito | descartado
            $table->timestamps();

            $table->index(['seminario_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
