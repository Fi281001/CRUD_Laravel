<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);
// Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');q