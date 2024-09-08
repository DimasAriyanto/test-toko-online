<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('transaction')->name('transaction')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('.index');
        Route::get('/create', [TransactionController::class, 'create'])->name('.create');
        Route::get('/show/{transaction}', [TransactionController::class, 'show'])->name('.show');
        Route::get('/edit/{transaction}', [TransactionController::class, 'edit'])->name('.edit');

        Route::post('/', [TransactionController::class, 'store'])->name('.store');
        Route::put('/update/{transaction}', [TransactionController::class, 'update'])->name('.update');
        Route::delete('/delete/{transaction}', [TransactionController::class, 'destroy'])->name('.delete');
    });

    Route::prefix('product')->name('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('.index');
        Route::get('/create', [ProductController::class, 'create'])->name('.create');
        Route::get('/show/{product}', [ProductController::class, 'show'])->name('.show');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('.edit');

        Route::post('/', [ProductController::class, 'store'])->name('.store');
        Route::put('/update/{product}', [ProductController::class, 'update'])->name('.update');
        Route::delete('/delete/{product}', [ProductController::class, 'destroy'])->name('.delete');
    });

});

require __DIR__ . '/auth.php';
