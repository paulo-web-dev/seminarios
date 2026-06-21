<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seminario_palestrantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminario_id')->constrained()->cascadeOnDelete();
            $table->string('nome');
            $table->string('cargo')->nullable();     // "Mídias Sociais · Gov"
            $table->text('bio')->nullable();
            $table->string('foto')->nullable();      // caminho relativo em public/
            $table->unsignedSmallInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seminario_palestrantes');
    }
};
