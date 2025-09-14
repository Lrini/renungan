<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RenunganController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardPostController;

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
Route::get('/renungan/{renungan:id}', [RenunganController::class, 'show'])->name('renungan.show');// menampikan renungan 
Route::get('/kegiatan/{kegiatan:id}', [KegiatanController::class, 'show'])->name('kegiatan.show');// menampikan kegiatan

Route::get('/login',[LoginController::class,'index'])->name('login')->middleware('guest'); // untuk halaman login
Route::post('/login',[LoginController::class,'authenticate']);// untuk proses autentikasi login

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/dashboard', [DashboardPostController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/home', function () {
    return redirect()->route('dashboard');
});
