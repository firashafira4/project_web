<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\ImageController;

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


Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
Route::get('/rooms', [KamarController::class, 'index']);
Route::get('/facilities', [FacilityController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::post('/blog/experience', [BlogController::class, 'storeExperience']);
// Route to show the form (GET method)
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');

// Route to handle form submission (POST method)
Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');

Route::get('/upload', [ImageController::class, 'showForm']);
Route::post('/upload', [ImageController::class, 'uploadImage'])->name('image.upload');