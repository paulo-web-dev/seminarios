<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\SitemapController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SeminarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing GovSocial
|--------------------------------------------------------------------------
*/
Route::get('/govsocial', [SeminarioController::class, 'govsocial'])->name('govsocial');
Route::post('/govsocial/inscricao', [LeadController::class, 'store'])->name('govsocial.inscricao');
Route::get('/govsocial/obrigado', [LeadController::class, 'obrigado'])->name('govsocial.obrigado');

Route::get('/', fn () => redirect()->route('govsocial'))->name('home');
Route::redirect('/seminarios/gestao-midias-sociais-setor-publico', '/govsocial');

/*
|--------------------------------------------------------------------------
| Blog (público)  —  /blog
|--------------------------------------------------------------------------
| Ordem importa: categoria e tag ANTES do {post} para não serem capturadas.
*/
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/categoria/{category}', [BlogController::class, 'category'])->name('category');
    Route::get('/tag/{tag}', [BlogController::class, 'tag'])->name('tag');
    Route::get('/{post}', [BlogController::class, 'show'])->name('show');
});

// SEO técnico
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

/*
|--------------------------------------------------------------------------
| Área administrativa  —  /admin
|--------------------------------------------------------------------------
*/
Route::get('admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('admin/login', [AuthController::class, 'login'])
    ->middleware('throttle:10,1')->name('login.store');
Route::post('admin/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('admin.logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [AdminLeadController::class, 'index'])->name('home');

    // Leads
    Route::get('leads', [AdminLeadController::class, 'index'])->name('leads.index');
    Route::get('leads/{lead}', [AdminLeadController::class, 'show'])->name('leads.show');
    Route::patch('leads/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');

    // Blog
    Route::prefix('blog')->name('blog.')->group(function () {
        Route::resource('posts', AdminPostController::class)->except('show');
        Route::resource('categories', AdminCategoryController::class)->except('show');
        Route::resource('tags', AdminTagController::class)->except('show');
    });
});
