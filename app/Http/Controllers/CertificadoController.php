<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CertificadoController extends Controller
{
    //
    public function exportar()
    {
        return Excel::download(new \App\Exports\CertificadoExport, 'certificaciones.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
