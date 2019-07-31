<?php

use Illuminate\Http\Request;
use App\Article;
use App\User;
use App\Post;

Route::get('articles', 'ArticleController@index');
Route::get('articles/{id}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{id}', 'ArticleController@update');
Route::patch('articles/{id}', 'ArticleController@update1');
Route::delete('articles/{id}', 'ArticleController@delete');




