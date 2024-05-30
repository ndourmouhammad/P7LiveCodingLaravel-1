<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentaireController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('articles.detail');
//});

Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'detail'])->where('id', '[0-9]+')->name('articles.show');

Route::get('/articles/partager', [ArticleController::class, 'partager']);
Route::post('/articles/sauvegarde', [ArticleController::class, 'sauvegarde']);

Route::post('/articles/{articleId}/commentaires', [CommentaireController::class, 'sauvegarde'])->name('commentaires.sauvegarde');;
