<?php

use App\Http\Controllers\BusinessController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/services', [BusinessController::class, 'services'])->name('services');
Route::middleware(['auth:sanctum'])->get('/services/new', [BusinessController::class, 'newservice'])->name('newservice');
Route::middleware(['auth:sanctum'])->post('/service/store', [BusinessController::class, 'services_store'])->name('services_store');   
Route::middleware(['auth:sanctum'])->get('/skill/new/{category}', [BusinessController::class, 'newskill'])->name('newskill');   
Route::middleware(['auth:sanctum'])->post('/skill/store', [BusinessController::class, 'skills_store'])->name('skills_store');   
Route::get('/services/{type}', [BusinessController::class, 'services_search'])->name('services_search');
Route::get('/service/{show}', [BusinessController::class, 'services_show'])->name('services_show');