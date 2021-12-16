<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', [\App\Http\Controllers\SerieController::class, 'index']);
Route::get('/series/filtre', [\App\Http\Controllers\SerieController::class, 'filtre']);
Route::get('/acceuil', [\App\Http\Controllers\SerieController::class, 'acceuil']);
Route::get('/series/{id}', [\App\Http\Controllers\SerieController::class, 'serie']);
Route::resource('series', '\App\Http\Controllers\SerieController');


Route::get('user/{id}',[\App\Http\Controllers\UserController::class,'show']);
//Route::post("/login", );
