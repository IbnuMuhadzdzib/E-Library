<?php

use App\Http\Controllers\HallController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage', ['title' => 'Homepage']);
});

Route::get('/hall',[HallController::class, 'index']);
Route::get('/hall/book/{book:slug}',[HallController::class, 'detailBook']);
Route::get('/hall/author/{author:slug}',[HallController::class, 'hallAuthor']);
Route::get('/hall/category/{category:slug}',[HallController::class, 'hallCategory']);

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});
