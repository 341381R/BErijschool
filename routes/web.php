<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RollenController\KlantController;
use App\Http\Controllers\RollenController\MedewerkerController;
use App\Http\Controllers\RollenController\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Klant', [KlantController::class, 'index'])
    ->name('Klant.index')
    ->middleware(['auth', 'role:klant,admin']);

Route::get('/Medewerker', [MedewerkerController::class, 'index'])
    ->name('Medewerker.index')
    ->middleware(['auth', 'role:medewerker,admin']);

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
