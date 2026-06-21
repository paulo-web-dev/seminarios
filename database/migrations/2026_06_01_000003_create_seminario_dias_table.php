<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seminario_dias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminario_id')->constrained()->cascadeOnDelete();
            $table->string('rotulo');                 // "Dia 1"
            $table->string('titulo');                 // tema do dia
            $table->json('horarios')->nullable();     // ["9h – 12h","14h – 17h"]
            $table->unsignedSmallInteger('ordem')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seminario_dias');
    }
};
