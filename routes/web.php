<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\OrderController as DashboardOrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
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
        Route::resource('warehouse', WarehouseController::class);
        Route::resource('category', ProductCategoryController::class);
        Route::resource('brand', ProductBrandController::class);
        Route::resource('unit', ProductUnitController::class);

        Route::resource('order', DashboardOrderController::class);
        Route::get('order/update_status/{order}', [DashboardOrderController::class, 'update_status'])->name('order.update_status');

        Route::get('user/{user}/toggle_status', [UserController::class, 'toggle_status'])->name('user.toggle_status');
        Route::get('product/{product}/toggle_status', [ProductController::class, 'toggle_status'])->name('product.toggle_status');
        Route::get('warehouse/{warehouse}/toggle_status', [WarehouseController::class, 'toggle_status'])->name('warehouse.toggle_status');
        Route::get('category/{category}/toggle_status', [ProductCategoryController::class, 'toggle_status'])->name('category.toggle_status');
        Route::get('brand/{brand}/toggle_status', [ProductBrandController::class, 'toggle_status'])->name('brand.toggle_status');
        Route::get('unit/{unit}/toggle_status', [ProductUnitController::class, 'toggle_status'])->name('unit.toggle_status');
    });

    Route::name('user.')->middleware(['checkUserRole:user'])->group(function () {
        Route::get('order/', [OrderController::class, 'index'])->name('order.index');
        Route::get('order/{product}/create', [OrderController::class, 'create'])->name('order.create');
        Route::post('order/store', [OrderController::class, 'store'])->name('order.store');
        Route::get('order', [OrderController::class, 'index'])->name('order.index');
    });
});


require __DIR__ . '/auth.php';
