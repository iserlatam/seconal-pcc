<?php

namespace App\Imports;

use App\Models\Certificado;
use Maatwebsite\Excel\Concerns\ToModel;

class CertificadoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Certificado([
            'nombre_completo' => $row[0],
            'tipo_doc' => $row[1],
            'documento' => $row[2],
            'fecha_creacion' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[3]),
            'departamento' => $row[4],
            'ciudad' => $row[5],
            'empresa' => $row[6],
            'curso' => $row[7],
            'codigo_certificado' => $row[8],
        ]);
    }
}
