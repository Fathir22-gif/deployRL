<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaliController;
use App\Http\Controllers\RajaAmpatController;
use App\Http\Controllers\ParisController;
use App\Http\Controllers\TokyoController;


Route::redirect('/', '/login');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/destinations/search', function (Request $request) {
    $q = trim($request->query('q', ''));

    $destinations = collect([
        ['name' => 'Bali', 'location' => 'Indonesia', 'rating' => 4.8, 'route' => 'bali', 'image' => 'images/bali.jpg'],
        ['name' => 'Raja Ampat', 'location' => 'Indonesia', 'rating' => 4.9, 'route' => 'raja-ampat', 'image' => 'images/raja-ampat.jpg'],
        ['name' => 'Paris', 'location' => 'Prancis', 'rating' => 4.9, 'route' => 'paris', 'image' => 'images/paris.jpg'],
        ['name' => 'Tokyo', 'location' => 'Jepang', 'rating' => 4.9, 'route' => 'tokyo', 'image' => 'images/tokyo.jpg'],
    ]);

    $results = $q === ''
        ? $destinations
        : $destinations->filter(fn ($destination) => str_contains(strtolower($destination['name']), strtolower($q)) || str_contains(strtolower($destination['location']), strtolower($q)))->values();

    return view('dashboard', [
        'q' => $q,
        'results' => $results,
    ]);
})->middleware(['auth', 'verified'])->name('destinations.search');

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

Route::delete('/wishlist/{route}', [WishlistController::class, 'remove'])
    ->middleware('auth')
    ->name('wishlist.remove');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
