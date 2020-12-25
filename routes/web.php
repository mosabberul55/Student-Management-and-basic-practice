<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

composer require laravel/ui
php artisan ui vue --auth
php artisan migrate
*/

//student routes
Route::get('/', [StudentController::class, 'index'])->name('index');
Route::get('/search', [StudentController::class, 'search'])->name('search');
Route::get('/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/store', [StudentController::class, 'store'])->name('student.store');
Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::post('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete');

//post routes
Route::post('/post/store', [PostController::class, 'post_store'])->name('post.store');
Route::get('/category/{id}', [PostController::class, 'category'])->name('post.category');

//image project route
Route::get('/image', [ImageController::class, 'create'])->name('image.create');
Route::post('/image/store', [ImageController::class, 'store'])->name('img.store');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/allpost', [App\Http\Controllers\HomeController::class, 'allpost'])->name('allpost');
