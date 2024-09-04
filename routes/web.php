<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\VerificationController;

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

// Route::get('/', function () {
//     return view('index');
// })->name('index');

// Route::get('/login', function() {
//     return view('login');
// })->name('login');

// Route::get('/berita', [BeritaController::class, 'index'])->name('Admin.berita.berita');
// Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
// Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
// Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
// Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('Admin.berita.edit');
// Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('Admin.berita.update');
// Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('Admin.berita.destroy');

// Route::get('/brosur', [BrosurController::class, 'index'])->name('Admin.brosur.brosur');
// Route::get('/brosur/create', [BrosurController::class, 'create'])->name('brosur.create');
// Route::post('/brosur/create', [BrosurController::class, 'store'])->name('brosur.store');
// Route::get('/brosur/{id}/edit', [BrosurController::class, 'edit'])->name('Admin.brosur.edit');
// Route::put('/brosur/{id}', [BrosurController::class, 'update'])->name('Admin.brosur.update');
// Route::delete('/brosur/{id}', [BrosurController::class, 'destroy'])->name('Admin.brosur.destroy');

// Route::get('/materi', [MateriController::class, 'index'])->name('Admin.materi.materi');
// Route::get('/materi/create', [MateriController::class, 'create'])->name('Admin.materi.create');
// Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
// Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.show');
// Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('Admin.materi.edit');
// Route::put('/materi/{id}', [MateriController::class, 'update'])->name('Admin.materi.update');
// Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('Admin.materi.destroy');

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/email/resend', [VerificationController::class, 'resend'])
    ->middleware(['auth'])
    ->name('verification.resend');

Route::get('/email', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');

Route::get('/berita', [BeritaController::class, 'index'])->name('Admin.berita.berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/search', [BeritaController::class, 'search'])->name('search');

Route::get('/search3', [MateriController::class, 'search'])->name('search3');
Route::get('/materi', [MateriController::class, 'index'])->name('Admin.materi.materi');
Route::get('/materi/{id}', [MateriController::class, 'show'])->name('materi.show');

Route::get('/panduan', [PanduanController::class, 'index'])->name('Admin.panduan.panduan');
Route::get('/panduan/{id}', [PanduanController::class, 'show'])->name('panduan.show');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/search2', [BrosurController::class, 'search'])->name('search2');
    Route::get('/brosur', [BrosurController::class, 'index'])->name('Admin.brosur.brosur');
    Route::get('/brosur/create', [BrosurController::class, 'create'])->name('brosur.create');
    Route::post('/brosur/create', [BrosurController::class, 'store'])->name('brosur.store');
    Route::get('/brosur/{id}/edit', [BrosurController::class, 'edit'])->name('Admin.brosur.edit');
    Route::put('/brosur/{id}', [BrosurController::class, 'update'])->name('Admin.brosur.update');
    Route::delete('/brosur/{id}', [BrosurController::class, 'destroy'])->name('Admin.brosur.destroy');

    Route::get('admin/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('admin/materi/create', [MateriController::class, 'store'])->name('materi.store');
    Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('Admin.materi.edit');
    Route::put('/materi/{id}', [MateriController::class, 'update'])->name('Admin.materi.update');
    Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('Admin.materi.destroy');

    Route::get('/search4', [PanduanController::class, 'search'])->name('search4');
    Route::get('admin/panduan/create', [PanduanController::class, 'create'])->name('panduan.create');
    Route::post('admin/panduan/create', [PanduanController::class, 'store'])->name('panduan.store');
    Route::get('/panduan/{id}/edit', [PanduanController::class, 'edit'])->name('Admin.panduan.edit');
    Route::put('/panduan/{id}', [PanduanController::class, 'update'])->name('Admin.panduan.update');
    Route::delete('/panduan/{id}', [PanduanController::class, 'destroy'])->name('Admin.panduan.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/admin/berita/create', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('Admin.berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('Admin.berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('Admin.berita.destroy');
});
