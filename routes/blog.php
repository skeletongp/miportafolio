<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [BlogController::class, 'index'])->name('blog');
Route::middleware(['auth:sanctum'])->get('insert', [BlogController::class, 'insert'])->name('insert');
Route::middleware(['auth:sanctum'])->get('update/{post}', [BlogController::class, 'update'])->name('update');
Route::post('/search',[BlogController::class,'search'])->name('post_search');
Route::post('/store',[BlogController::class,'store'])->name('post_store');
Route::put('/edit/{post}',[BlogController::class,'edit'])->name('post_edit');
Route::get('/{category}', [BlogController::class, 'category'])->name('category');
Route::get('/show/{post}', [BlogController::class, 'show'])->name('show');

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');



