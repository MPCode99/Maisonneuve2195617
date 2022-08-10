<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Accueil
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');
Route::get('/', [EtudiantController::class, 'index'])->name('tableaudebord')->middleware('auth');
Route::get('tableaudebord', [EtudiantController::class, 'index'])->name('tableaudebord')->middleware('auth');
//Admin
//Route::get('admin', [AdminController::class, 'index'])->name('admin.liste');//->middleware('auth');
//Route::get('admin/etudiant/{etudiant}', [AdminController::class, 'show'])->name('admin.show');//->middleware('auth');
//Route::get('admin/etudiant-modifier/{etudiant}', [AdminController::class, 'edit'])->name('admin.edit');//->middleware('auth');
//Route::put('admin/etudiant-modifier/{etudiant}', [AdminController::class, 'update'])->name('admin.update');//->middleware('auth');
//Route::get('admin/etudiant-create', [AdminController::class, 'create'])->name('admin.create');//->middleware('auth');
//Route::post('admin/etudiant-create', [AdminController::class, 'store'])->name('admin.create.post');//->middleware('auth');
//Route::delete('admin/etudiant/{etudiant}', [AdminController::class, 'destroy'])->name('admin.delete');//->middleware('auth');
//Etudiants
Route::get('etudiant', [EtudiantController::class, 'index'])->name('etudiant')->middleware('auth');
Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show')->middleware('auth');
Route::get('etudiant-modifier/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit')->middleware('auth');
Route::put('etudiant-modifier/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update')->middleware('auth');
Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create')->middleware('auth');
Route::post('etudiant-create', [EtudiantController::class, 'store'])->name('etudiant.create.post')->middleware('auth');
Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete')->middleware('auth');
//Forum
Route::get('forum/articles', [ArticleController::class, 'index'])->name('forum.articles')->middleware('auth');
Route::get('forum/create', [ArticleController::class, 'create'])->name('forum.create')->middleware('auth');
Route::post('forum/create', [ArticleController::class, 'store'])->name('forum.create.post')->middleware('auth');
Route::get('forum/show/{article}', [ArticleController::class, 'show'])->name('forum.show')->middleware('auth');
Route::get('forum/edit/{article}', [ArticleController::class, 'edit'])->name('forum.edit')->middleware('auth');
Route::put('forum/edit/{article}', [ArticleController::class, 'update'])->name('forum.update')->middleware('auth');
Route::get('forum/translate/{article}', [ArticleController::class, 'translate'])->name('forum.translate')->middleware('auth');
Route::post('forum/translate/{article}', [ArticleController::class, 'storeTranslate'])->name('forum.translate.post')->middleware('auth');
Route::delete('forum/show/{article}', [ArticleController::class, 'destroy'])->name('forum.show.delete')->middleware('auth');
//Documents
Route::get('document/fichiers', [DocumentController::class, 'index'])->name('document.fichiers')->middleware('auth');
Route::get('document/create', [DocumentController::class, 'create'])->name('document.create')->middleware('auth');
Route::post('document/create/upload', [DocumentController::class, 'store'])->name('document.create.upload')->middleware('auth');
Route::get('document/edit/{document}', [DocumentController::class, 'edit'])->name('document.edit')->middleware('auth');
Route::put('document/edit/{document}', [DocumentController::class, 'update'])->name('document.update')->middleware('auth');
Route::delete('document/edit/{document}', [DocumentController::class, 'destroy'])->name('document.edit.delete')->middleware('auth');
//Connexion et inscription
Route::get('inscription', [CustomAuthController::class, 'create'])->name('inscription');
Route::post('sauvegarde-inscription', [CustomAuthController::class, 'store'])->name('sauvegarde.inscription');
Route::get('connexion', [CustomAuthController::class, 'index'])->name('connexion');
Route::post('valid-connexion', [CustomAuthController::class, 'validConnexion'])->name('valid.connexion');
Route::get('deconnexion', [CustomAuthController::class, 'deconnexion'])->name('deconnexion')->middleware('auth');