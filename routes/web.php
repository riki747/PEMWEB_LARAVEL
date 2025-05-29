<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CustomerAuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::resource('products', ProductsController::class)->scoped([
        'product' => 'slug',
    ]);
    Route::put('/products/{product:slug}', [ProductsController::class, 'update'])->name('products.update');
});



Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
Volt::route('settings/password', 'settings.password')->name('settings.password');
Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');


// route sebelum diubah
Route::group(['prefix' => 'customer'], function () {
    Route::controller(CustomerAuthController::class)->group(function () {
        //tampilkan halaman login
        Route::get('login', 'login')->name('customer.login');
        //aksi login
        Route::post('login', 'store_login')->name('customer.store_login');
        //tampilkan halaman register
        Route::get('register', 'register')->name('customer.register');
        //aksi register
        Route::post('register', 'store_register')->name('customer.store_register');
        //aksi logout
        Route::post('logout', 'logout')->name('customer.logout');
    });
    Route::middleware('auth:customer')->group(function () {
        Route::get('dashboard', function () {
            return view('web.customer.dashboard');
        })->name('customer.dashboard');
    });
});

// route yang sudah diubah
// routes/web.php
// Route::prefix('customer')->controller(CustomerAuthController::class)->group(function () {
//     Route::middleware('check_customer_login')->group(function () {
//         Route::get('login', 'login')->name('customer.login');
//         Route::post('login', 'store_login')->name('customer.store_login');
//         Route::get('register', 'register')->name('customer.register');
//         Route::post('register', 'store_register')->name('customer.store_register');
//     });

//     Route::post('logout', 'logout')->name('customer.logout');


//     // 🔒 Dashboard customer hanya bisa diakses oleh customer yang udah login
//     Route::middleware('auth:customer')->group(function () {
//         Route::get('dashboard', function () {
//             return view('web.customer.dashboard');
//         })->name('customer.dashboard');
//     });
// });


// baru saja ditambahkan
// Route::middleware('auth:customer')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('web.customer.dashboard');
//     })->name('customer.dashboard');
// });
require __DIR__ . '/auth.php';
