<?php

use App\Exports\CertificadoExport;
use App\Http\Controllers\CertificadoController;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::fallback(fn () => redirect('app'));
