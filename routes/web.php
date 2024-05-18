<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('login', [UserController::class, 'index'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->middleware(['checkUserRole:admin'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::resource('product', ProductController::class);
    });
});


require __DIR__ . '/auth.php';
