<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

// Controller Public
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VVIPController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NofreqController;
use App\Http\Controllers\TalentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;

// Controller Admin
use App\Http\Controllers\AssetHomeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;


// ==================
// Public Pages
// ==================
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/event/monthly', [PageController::class, 'eventMonthly'])->name('event.monthly');
Route::get('/event/exclusive', [PageController::class, 'eventExclusive'])->name('event.exclusive');
Route::get('/event/{event}', [PageController::class, 'eventDetail'])->name('event.detail');
Route::get('/talent', [PageController::class, 'talent'])->name('talent');
Route::get('/vvip', [PageController::class, 'vvip'])->name('vvip');
Route::get('/nofreq', [PageController::class, 'nofreq'])->name('nofreq');


// ==================
// Profile & Checkout (Butuh Login)
// ==================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::get('/ticket/{order_id}', [HistoryController::class, 'show'])->name('ticket.show');
});



Route::post('/event/pay/{event}', [PaymentController::class, 'checkout'])->name('event.pay')->middleware('auth');
Route::post('/midtrans/callback', [PaymentController::class, 'callback'])->name('midtrans.callback');


// ==================
// Reset Password (Testing)
// ==================
Route::get('/test-reset-password', function () {
    $token = Str::random(60);
    $email = 'testing@gmail.com';
    return view('auth.reset-password', ['token' => $token, 'email' => $email]);
});


// ==================
// Admin Panel (Butuh Login)
// ==================
Route::middleware(['auth'])->prefix('logadmin')->group(function () {
    
    // Halaman utama admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // EVENTS
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('admin.events.index');
        Route::get('/create', [EventController::class, 'create'])->name('admin.events.create');
        Route::post('/', [EventController::class, 'store'])->name('admin.events.store');
        Route::get('/{event}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('admin.events.update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('admin.events.destroy');
        Route::post('/toggle', [EventController::class, 'toggleComingSoon'])->name('admin.events.toggleComingSoon');
    });

    // TALENTS
    Route::prefix('talents')->group(function () {
        Route::get('/', [TalentController::class, 'index'])->name('admin.talents.index');
        Route::get('/create', [TalentController::class, 'create'])->name('admin.talents.create');
        Route::post('/', [TalentController::class, 'store'])->name('admin.talents.store');
        Route::get('/{talent}/edit', [TalentController::class, 'edit'])->name('admin.talents.edit');
        Route::put('/{talent}', [TalentController::class, 'update'])->name('admin.talents.update');
        Route::delete('/{talent}', [TalentController::class, 'destroy'])->name('admin.talents.destroy');
    });

    // NOFREQS
    Route::prefix('nofreqs')->group(function () {
        Route::get('/', [NofreqController::class, 'index'])->name('admin.nofreqs.index');
        Route::get('/create', [NofreqController::class, 'create'])->name('admin.nofreqs.create');
        Route::post('/', [NofreqController::class, 'store'])->name('admin.nofreqs.store');
        Route::get('/{nofreq}/edit', [NofreqController::class, 'edit'])->name('admin.nofreqs.edit');
        Route::put('/{nofreq}', [NofreqController::class, 'update'])->name('admin.nofreqs.update');
        Route::delete('/{nofreq}', [NofreqController::class, 'destroy'])->name('admin.nofreqs.destroy');
    });

    // ASSET HOME
    Route::prefix('assets')->group(function () {
        Route::get('/', [AssetHomeController::class, 'index'])->name('admin.assets.index');
        Route::get('/create', [AssetHomeController::class, 'create'])->name('admin.assets.create');
        Route::post('/', [AssetHomeController::class, 'store'])->name('admin.assets.store');
        Route::get('/{asset}/edit', [AssetHomeController::class, 'edit'])->name('admin.assets.edit');
        Route::put('/{asset}', [AssetHomeController::class, 'update'])->name('admin.assets.update');
        Route::delete('/{asset}', [AssetHomeController::class, 'destroy'])->name('admin.assets.destroy');
    });

    // VVIP
    Route::get('/vvip', [VVIPController::class, 'index'])->name('admin.vvip.index');
    Route::post('/vvip', [VVIPController::class, 'update'])->name('admin.vvip.update');

    // USERS 
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');

    // Rute untuk Transaksi
    Route::get('/transactions', [AdminTransactionController::class, 'index'])->name('admin.transactions.index');
    Route::get('/transactions/invoice/{order_id}', [AdminTransactionController::class, 'downloadInvoice'])->name('admin.transactions.invoice');

        // Rute untuk Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/settings/toggle-exclusive', [SettingController::class, 'toggleExclusiveComingSoon'])->name('admin.settings.toggleExclusive');
    Route::post('/settings/toggle-vvip', [SettingController::class, 'toggleVVIPStatus'])->name('admin.settings.toggleVVIP');
});


// ==================
// Breeze Auth Routes
// ==================
require __DIR__.'/auth.php';
