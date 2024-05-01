<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', [FoodController::class, 'index'])->name('index');
Route::post('food', [FoodController::class, 'store']);

Route::get('/detail/{food}', [FoodController::class, 'show']);
Route::put('/food/update/{food}', [FoodController::class, 'update'])->name('food.update');
Route::delete('/food/delete/{food}', [FoodController::class, 'destroy'])->name('food.delete');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
