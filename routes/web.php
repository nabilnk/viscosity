<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use Illuminate\Support\Str;



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

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');


    Route::get('/test-reset-password', function () {
    $token = Str::random(60); // Buat token acak
    $email = 'testing@gmail.com'; // Ganti dengan email yang ada di database Anda
    return view('auth.reset-password', ['token' => $token, 'email' => $email]);
});

require __DIR__.'/auth.php';