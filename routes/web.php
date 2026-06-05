<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\InstructeurController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Klant', [KlantController::class, 'index'])
    ->name('Klant.index')
    ->middleware(['auth', 'role:klant,admin']);

Route::get('/Instructeur', [InstructeurController::class, 'index'])
    ->name('Instructeur.index')
    ->middleware(['auth', 'role:rijschoolhouder']);

Route::get('Instructeur/{id}', [InstructeurController::class, 'show'])
    ->name('Instructeur.show')
    ->middleware(['auth', 'role:rijschoolhouder']);

Route::delete('Instructeur/{id}', [InstructeurController::class, 'destroy'])
    ->name('Instructeur.destroy')
    ->middleware(['auth', 'role:rijschoolhouder']);

Route::get('Instructeur/{id}/edit', [InstructeurController::class, 'edit'])
    ->name('Instructeur.edit')
    ->middleware(['auth', 'role:rijschoolhouder']);

Route::get('/Admin', [AdminController::class, 'index'])
    ->name('Admin.index')
    ->middleware(['auth', 'role:admin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
