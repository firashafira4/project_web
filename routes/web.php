<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\BookingController;


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
Route::get('/rooms/{room}/reserve', [ReservasiController::class, 'create'])->name('reservasi.create');

// Route to handle form submission (POST method)
Route::post('/rooms/reserve', [ReservasiController::class, 'store'])->name('reservations.store');

Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
Route::get('/booking/{id}', [BookingController::class, 'showBookingPage'])->name('booking.show');
// Menangani pengiriman form pemesanan
Route::post('/booking/submit', [BookingController::class, 'store'])->name('booking.submit');
