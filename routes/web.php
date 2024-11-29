<?php

use App\Http\Controllers\CreatureController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::get('creatures', [CreatureController::class, 'index']);
Route::get('creatures/create', [CreatureController::class, 'create']);
Route::post('creatures', [CreatureController::class, 'store']);
Route::get('creatures/{id}/edit', [CreatureController::class, 'edit']);
Route::put('creatures/{id}', [CreatureController::class, 'update']);
Route::delete('creatures/{id}', [CreatureController::class, 'destroy']);
