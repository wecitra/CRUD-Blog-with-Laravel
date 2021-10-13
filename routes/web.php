<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return redirect('blog');
});

Route::resource('blog', BlogController::class);



// Route::get('/', function () {
//     return view('welcome');
// });
// Auth::routes();
// Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('admin', function () { 
//     return view('admin'); 
// })->middleware('checkRole:admin');
// Route::get('author', function () { 
//     return view('author'); 
// })->middleware(['checkRole:admin,author']);
// Route::get('reader', function () { 
//     return view('reader'); 
// })->middleware(['checkRole:admin,reader']);
