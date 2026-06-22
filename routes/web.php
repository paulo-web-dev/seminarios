<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SeminarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rotas — Projeto Seminários (Unyflex)
|--------------------------------------------------------------------------
*/

Route::get('/', [SeminarioController::class, 'home'])->name('home');

Route::prefix('seminarios')->name('seminarios.')->group(function () {
    Route::get('/{seminario}', [SeminarioController::class, 'show'])->name('show');
    Route::post('/{seminario}/inscricao', [LeadController::class, 'store'])->name('inscricao');
    Route::get('/{seminario}/obrigado', [LeadController::class, 'obrigado'])->name('obrigado');
});

/*
|--------------------------------------------------------------------------
| Área administrativa — /admin
|--------------------------------------------------------------------------
*/

// Login (rota 'login' é o destino padrão do middleware auth)
Route::get('admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('admin/login', [AuthController::class, 'login'])
    ->middleware('throttle:10,1')->name('login.store');
Route::post('admin/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminLeadController::class, 'index'])->name('home');
    Route::get('leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::get('leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::patch('leads/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');
});
