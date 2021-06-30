<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProjectController::class, 'index'])->name('projects');
Route::middleware(['auth:sanctum'])->get('/insert', [ProjectController::class, 'project_insert'])->name('project_insert');
Route::middleware(['auth:sanctum'])->get('/update/{project}', [ProjectController::class, 'project_update'])->name('project_update');
Route::middleware(['auth:sanctum'])->post('/edit/{project}', [ProjectController::class, 'project_edit'])->name('project_edit');
Route::get('/show/{project}', [ProjectController::class, 'project_show'])->name('project_show');
Route::post('/store', [ProjectController::class, 'project_store'])->name('project_store');
