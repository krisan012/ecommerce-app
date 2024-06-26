<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::middleware(['auth'])->group(function () {

    Route::middleware(['permission:manage users'])->group(function () {
        Route::resource('users', UserController::class);
    });

    Route::middleware(['permission:manage categories'])->group(function () {
        Route::resource('categories', CategoryController::class)->names('admin.categories');
    });

    Route::middleware(['permission:manage products'])->group(function () {
        Route::resource('products', ProductController::class)->names('admin.products');
    });

    Route::middleware(['permission:manage categories|manage products'])->group(function () {
        Route::resource('categories', CategoryController::class)->only(['create', 'store', 'edit', 'update', 'destroy', 'index']);
        Route::resource('products', ProductController::class)->only(['create', 'store', 'edit', 'update', 'destroy', 'index', 'show']);
    });

});


require __DIR__.'/auth.php';
