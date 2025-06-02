<?php

namespace App\Exports;

use App\Models\Certificado;
use Maatwebsite\Excel\Concerns\FromCollection;

class CertificadoExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Certificado::all();
    }
}
