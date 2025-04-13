<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/', function () {
    return View('welcome');
})->name('home');


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::delete('/logout',[AuthController::class,'logout'])->name('logout');
route::post('/login',[AuthController::class,'dologin']);

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/{post}', [BlogController::class, 'destroy'])->name('blog.destroy');
Route::get('/{slug}-{post}', [BlogController::class, 'voir'])->name('blog.show');



