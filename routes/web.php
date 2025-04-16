<?php

use App\Http\Controllers\HallController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/registration', [LoginController::class, 'registration']);
Route::post('/registration', [LoginController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth', 'isAdmin']);

Route::post('/logout', [LoginController::class, 'logout']);

