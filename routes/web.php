<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\SeminarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas — Projeto Seminários (Unyflex)
|--------------------------------------------------------------------------
| A home redireciona para o seminário ativo mais recente.
| Cada seminário tem sua LP em /seminarios/{slug}.
*/

Route::get('/', [SeminarioController::class, 'home'])->name('home');

Route::prefix('seminarios')->name('seminarios.')->group(function () {
    // LP do seminário
    Route::get('/{seminario}', [SeminarioController::class, 'show'])->name('show');

    // Inscrição (captura de lead)
    Route::post('/{seminario}/inscricao', [LeadController::class, 'store'])->name('inscricao');

    // Confirmação
    Route::get('/{seminario}/obrigado', [LeadController::class, 'obrigado'])->name('obrigado');
});
