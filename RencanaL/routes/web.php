<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaliController;
use App\Http\Controllers\RajaAmpatController;
use App\Http\Controllers\ParisController;
use App\Http\Controllers\TokyoController;
use App\Http\Controllers\WishlistController;



Route::redirect('/', '/login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/bali', [BaliController::class, 'index'])
    ->middleware('auth')
    ->name('bali');

Route::get('/raja-ampat', [RajaAmpatController::class, 'index'])
    ->middleware('auth')
    ->name('raja-ampat');

Route::get('/paris', [ParisController::class, 'index'])
    ->middleware('auth')
    ->name('paris');

Route::get('/tokyo', [TokyoController::class, 'index'])
    ->middleware('auth')
    ->name('tokyo');

Route::get('/wishlist', [WishlistController::class, 'index'])
    ->middleware('auth')
    ->name('wishlist');

Route::post('/wishlist/add', [WishlistController::class, 'add'])
    ->middleware('auth')
    ->name('wishlist.add');

Route::delete(
    '/wishlist/remove/{index}',
    [WishlistController::class, 'remove']
)
    ->name('wishlist.remove');

Route::get('/clear-wishlist', function () {
    session()->forget('wishlist');
    return 'Wishlist berhasil dihapus';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
