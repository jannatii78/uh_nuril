<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login'); // Atau view('dashboard') dengan auth
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PenerbitController::class, 'index'])->name('dashboard');
});
Route::resource('penerbit', PenerbitController::class);
Route::resource('buku', BukuController::class);

// Grouped routes untuk Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
