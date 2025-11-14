<?php

use App\Http\Controllers\Api\V1\CertificadoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Route::get('certificados', [CertificadoController::class, 'index'])
    //     ->name('certificados');
    Route::get('certificados/documento/{documento}', [CertificadoController::class, 'show'])
        ->name('certificados');
})->name('v1.');
