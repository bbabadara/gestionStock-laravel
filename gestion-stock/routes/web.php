<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/articles",[ArticleController::class, 'index'])->name("articles.liste");
Route::get('/ajout',[ArticleController::class, 'ajout'])->name('articles.ajout');
Route::post('ajoutArticle',[ArticleController::class, 'store'])->name('articles.store');


