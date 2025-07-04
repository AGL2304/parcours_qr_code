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



Route::middleware(['auth'])->group(function () {
    Route::resource('parcours', ParcoursController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('sites', SiteController::class);
});



Route::get('/parcours-public', [PublicController::class, 'showParcours'])->name('public.parcours');


Route::get('/liste_parcours', [PublicController::class, 'listeParcours'])->name('public.parcours.liste');

// Routes authentifiées
Route::middleware('auth')->group(function () {
    // Routes CRUD pour les parcours
    Route::resource('parcours', ParcoursController::class);
    
    // Route pour télécharger le QR code
    Route::get('parcours/{parcours}/qrcode/download', [ParcoursController::class, 'downloadQrCode'])
        ->name('parcours.qrcode.download');
});

// Route publique pour l'affichage via QR code (sans authentification)
Route::get('parcours/{parcours}/public', [ParcoursController::class, 'showPublic'])
    ->name('parcours.public');