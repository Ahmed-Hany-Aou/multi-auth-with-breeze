<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;


use Illuminate\Support\Facades\Route;


/* ------------- Admin Route -------------- */

// ------------- Admin Routes --------------

Route::prefix('admin')->group(function (){

    Route::get('/login',[AdminController::class, 'Index'])->name('login_from');
    
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    
    Route::get('/register',[AdminController::class, 'AdminRegister'])->name('admin.register');
    
    Route::post('/register/create',[AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');
    
    /*Route::middleware(['admin'])->get('/admin/test', function () {
       return "Admin middleware is working!";
    }); */
    
    
    });


    /* ------------- Seller Route -------------- */

Route::prefix('seller')->group(function (){

    Route::get('/login',[SellerController::class, 'SellerIndex'])->name('seller_login_from');
    
    Route::get('/dashboard',[SellerController::class, 'SellerDashboard'])->name('seller.dashboard')->middleware('seller');
    
    Route::post('/login/owner',[SellerController::class, 'SellerLogin'])->name('seller.login');
    
    
    
    Route::get('/logout',[SellerController::class, 'SellerLogout'])->name('seller.logout')->middleware('seller');
    
    Route::get('/register',[SellerController::class, 'SellerRegister'])->name('seller.register');
    
    Route::post('/register/create',[SellerController::class, 'SellerRegisterCreate'])->name('seller.register.create');
    

  Route::middleware(['seller'])->get('/seller/test', function () {
       return "seller middleware is working!";
    }); 


    
    }); 
    /* ------------- End Seller Route -------------- */


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
