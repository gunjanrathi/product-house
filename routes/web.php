<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

// Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');;
// Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
// Route::post('/products/store', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
// Route::get('/products/show/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
// Route::delete('/products/destroy', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');
// Route::get('/products/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/update', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
