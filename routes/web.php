<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\OrderHistoryController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [HomeController::class, 'product'])->name('products');

// User Profile
Route::middleware(['auth'])->group(function () {
    Route::get('/product/{id}', [HomeController::class, 'show'])->name('product.show');
    Route::post('/order/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Login, Register, Logout
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login')->middleware('guest');
    Route::post('/login', 'login');

    Route::get('/register', 'showRegisterForm')->name('register')->middleware('guest');
    Route::post('/register', 'register');

    Route::post('/logout', 'logout')->name('logout');
});

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::prefix('dashboard/admin')->group(function () {
        Route::resource('products', ProductController::class)->names([
            "index" => "dashboard.products.index",
            "create" => "dashboard.products.create",
            "store" => "dashboard.products.store",
            "show" => "dashboard.products.show",
            "edit" => "dashboard.products.edit",
            "update" => "dashboard.products.update",
            "destroy" => "dashboard.products.destroy",
        ]);

        Route::controller(OrderHistoryController::class)->group(function () {
            Route::get('/order-histories', 'index')->name('order_histories.index');
            Route::get('/order-histories/{id}', 'show')->name('order_histories.show');
            Route::patch('/order-histories/{orderHistory}/status', 'updateStatus')->name('order_histories.updateStatus');
        });

        Route::controller(InvoiceController::class)->group(function () {
            Route::get('/invoices', 'index')->name('invoices.index');
            Route::get('/invoices/{invoice}', 'show')->name('invoices.show');
            Route::get('/invoices/{invoice}/pdf', 'generatePdf')->name('invoices.pdf');
        });
    });
});
