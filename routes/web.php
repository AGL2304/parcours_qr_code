<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ParcoursController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\PublicController;

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

require __DIR__ . '/auth.php';

Route::get('/qr', [QrCodeController::class, 'show'])->name('qr');

// Routes publiques (sans authentification)
Route::get('/parcours-public', [PublicController::class, 'showParcours'])->name('public.parcours');
Route::get('/liste_parcours', [PublicController::class, 'listeParcours'])->name('public.parcours.liste');

// Route publique pour l'affichage via QR code (sans authentification)
Route::get('parcours/{parcour}/public', [ParcoursController::class, 'showPublic'])
    ->name('parcours.public');

// Routes authentifiées
Route::middleware('auth')->group(function () {
    // Routes CRUD pour les parcours
    Route::resource('parcours', ParcoursController::class);
    
    // Routes CRUD pour les sites
    Route::resource('sites', SiteController::class);
    
    // Routes supplémentaires pour les parcours
    Route::get('parcours/{parcour}/qrcode', [ParcoursController::class, 'showQrCode'])
        ->name('parcours.qrcode');
    Route::get('parcours/{parcour}/qrcode/download', [ParcoursController::class, 'downloadQrCode'])
        ->name('parcours.qrcode.download');
});