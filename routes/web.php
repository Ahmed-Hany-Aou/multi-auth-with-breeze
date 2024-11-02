<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;


/* ------------- Admin Route -------------- */

// ------------- Admin Routes --------------
Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'Index'])->name('login_from');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');
    
 //   Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard');
        Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    });





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
