<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes pour la liste, ajout et store (création d'article)
Route::get("/articles", [ArticleController::class, 'index'])->name("articles.liste");
Route::get('/ajout', [ArticleController::class, 'ajout'])->name('articles.ajout');
Route::post('ajoutArticle', [ArticleController::class, 'store'])->name('articles.store');

// Route resource pour gérer toutes les actions CRUD pour les articles
Route::resource('articles', ArticleController::class);  // Cette ligne remplace les routes manuelles


