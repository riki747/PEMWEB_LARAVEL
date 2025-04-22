<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

require __DIR__.'/auth.php';
Route::get('/', [HomepageController::class, 'index']);
Route::get('products', [HomepageController::class, 'products']);
Route::get('product/{slug}', [HomepageController::class, 'product']);
Route::get('categories',[HomepageController::class, 'categories']);
Route::get('category/{slug}', [HomepageController::class, 'category']);
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('checkout', [HomepageController::class, 'checkout']);


Route::get('/', function () {
    return view('web.homepage');
})->name('home');
Route::get('/',[HomepageController::class,'index']);



// Route::get('products', function(){
//     return view('web.products');
//    });


// Route::get(uri: 'products', action: function(){
//     return view('web.products');
//    });

   Route::get('product/{slug}', function($slug){
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