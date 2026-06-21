<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seminario_publicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminario_id')->constrained()->cascadeOnDelete();
            $table->string('icone')->default('user'); // chave do SVG
            $table->string('titulo');
            $table->unsignedSmallInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seminario_publicos');
    }
};
