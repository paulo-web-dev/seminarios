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

// Landing GovSocial em /govsocial
Route::get('/govsocial', [SeminarioController::class, 'govsocial'])->name('govsocial');
Route::post('/govsocial/inscricao', [LeadController::class, 'store'])->name('govsocial.inscricao');
Route::get('/govsocial/obrigado', [LeadController::class, 'obrigado'])->name('govsocial.obrigado');

// Home e a URL antiga redirecionam para /govsocial
Route::get('/', fn () => redirect()->route('govsocial'))->name('home');
Route::redirect('/seminarios/gestao-midias-sociais-setor-publico', '/govsocial');

/*
|--------------------------------------------------------------------------
| Área administrativa — /admin
|--------------------------------------------------------------------------
*/
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
