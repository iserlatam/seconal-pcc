<?php

use App\Exports\CertificadoExport;
use App\Http\Controllers\CertificadoController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
});

Route::get('certificaciones/exportar/', [CertificadoController::class, 'exportar'])
    ->name('certificaciones.exportar');
