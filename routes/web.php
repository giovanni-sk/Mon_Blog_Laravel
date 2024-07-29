<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [PagesController::class, 'index']);

// Route::get('/contact-us',function (){
//     return view('layouts.contact');
// });

Route::controller(PagesController::class)
    ->group(function () {
        Route::get('/', 'index');
        Route::get('/contact-us', 'contact');
        Route::get('/about', 'about');
    });

Route::controller(ArticleController::class)
    ->group(function () {
        Route::get('/articles', 'index')->name('articles.index');
        Route::post('/articles','store')->name('articles.store')->middleware('auth');
        Route::get('/articles/create','create')->name('articles.create')->middleware('auth');
        Route::get('/articles/search','search')->name('articles.search');
        Route::get('/articles/{article}', 'show')->name('articles.show')->middleware('auth');
        Route::get('/articles/{article}/edit', 'edit')->name('articles.edit')->middleware('auth');
        Route::patch('/articles/{article}', 'update')->name('articles.update')->middleware('auth');
        Route::delete('/articles/{article}', 'destroy')->name('articles.destroy')->middleware('auth');
        });
    Route::post('/comments',[CommentController::class,'store'])->name('comments.create')->middleware('auth');

    //Route d'authentification
    Route::get('/register',[RegisterController::class,'index'])->name('register')->middleware('guest');
    Route::post('/register',[RegisterController::class,'store'])->middleware('guest');
    Route::get('/login',[SessionsController::class,'index'])->name('login')->middleware('guest');
    Route::post('/login',[SessionsController::class,'login'])->middleware('guest');
    Route::post('/logout', [SessionsController::class, 'logout'])->name('logout')->middleware('auth');
    
//Route profil

    Route::get('auth/profil',[UserController::class,'index'])->name('profile')->middleware('auth');
    Route::patch('auth/profil',[UserController::class,'update'])->name('profile.update')->middleware('auth');
    Route::delete('auth/profil',[UserController::class,'destroy'])->name('profile.delete')->middleware('auth');