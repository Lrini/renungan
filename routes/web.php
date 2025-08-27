<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RenunganController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/renungan/{renungan:id}', [RenunganController::class, 'show'])->name('renungan.show');
