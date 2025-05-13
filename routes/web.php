<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrdersController;






require __DIR__ . '/auth.php';
Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('products', [HomepageController::class, 'products']);
Route::get('product/{slug}', [HomepageController::class, 'product']);
Route::get('categories', [HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);






Route::group(['prefix' => 'dashboard'], function () {


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', PostController::class)->names('posts');

    
    Route::resource('products', ProductsController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('customers', CustomersController::class);
    Route::resource('orders', OrdersController::class);

    
})->middleware(['auth', 'verified']);
Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::post('/dashboard/posts', [PostController::class, 'store'])->name('posts.store');

// Route::get('products', function(){
//     return view('web.products');
//    });


// Route::get(uri: 'products', action: function(){
//     return view('web.products');
//    });






Route::get('product/{slug}', function ($slug) {
    return view('web.single_product');
});
Route::get('products', [HomepageController::class, 'products']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
