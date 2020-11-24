<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FilmController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategoryController::class)->except('show');
Route::resource('films', FilmController::class)->except('show');
