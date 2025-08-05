<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController; // Pastikan ini ada



// Route untuk Homepage dan halaman statis lainnya
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/event/monthly', [PageController::class, 'eventMonthly'])->name('event.monthly');
Route::get('/event/exclusive', [PageController::class, 'eventExclusive'])->name('event.exclusive');
Route::get('/talent', [PageController::class, 'talent'])->name('talent');
Route::get('/vvip', [PageController::class, 'vvip'])->name('vvip');
Route::get('/nofreq', [PageController::class, 'nofreq'])->name('nofreq');


// Route bawaan Breeze untuk dashboard dan profil
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';