<?php

use App\Exports\CertificadoExport;
use App\Http\Controllers\CertificadoController;
use App\Livewire\Empresas\Consultas\Certificaciones\Index;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::fallback(fn () => redirect(route('empresas.consultas.index')));

Route::prefix('empresas')
    ->name('empresas.')
    ->group(function () {
        // Define your consulta routes here
        Route::prefix('consultas')
            ->name('consultas.')
            ->group(function () {
                Route::get('/certificaciones', Index::class)
                    ->name('index');
            });
    });
