<?php

namespace App\Imports;

use App\Models\Certificado;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CertificadoImport implements ToCollection, WithHeadingRow, WithCustomCsvSettings
{
    public int $importedCount = 0;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if (empty($row['documento'])) {
                continue;
            }

            Certificado::create([
                'nombre_completo'    => $row['nombre_completo'],
                'tipo_doc'           => $row['tipo_doc'],
                'documento'          => $row['documento'],
                'fecha_creacion'     => Carbon::createFromFormat('d/m/Y', trim($row['fecha_creacion'])),
                'departamento'       => $row['departamento'],
                'ciudad'             => $row['ciudad'],
                'empresa'            => $row['empresa'],
                'curso'              => $row['curso'],
                'codigo_certificado' => $row['codigo_certificado'],
            ]);

            $this->importedCount++;
        }
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
        ];
    }
}
