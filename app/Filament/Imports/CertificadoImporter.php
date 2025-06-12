<?php

namespace App\Filament\Imports;

use App\Models\Certificado;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class CertificadoImporter extends Importer
{
    protected static ?string $model = Certificado::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nombre_completo')
                ->rules(['max:255'])
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('tipo_doc')
                ->rules(['max:255'])
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('documento')
                ->rules(['max:255', 'unique:certificados,documento'])
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('fecha_creacion')
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('departamento')
                ->rules(['max:255'])
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('ciudad')
                ->rules(['max:255'])
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('empresa')
                ->rules(['max:255'])
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('curso')
                ->rules(['max:255'])
                ->ignoreBlankState()
                ->requiredMapping(),
            ImportColumn::make('codigo_certificado')
                ->rules(['max:255'])
                ->ignoreBlankState()
                ->requiredMapping(),
        ];
    }

    public function resolveRecord(): ?Certificado
    {
        // return Certificado::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Certificado();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Se ha completado la importacion y  ' . number_format($import->successful_rows) . ' ' . str('fila')->plural($import->successful_rows) . ' importada.';

        $import->failedRows()->each(function ($row) use ($body) {
            $rowCounter = 1;
            $body .= "\nLa fila # " . $rowCounter . ' No se pudo completar debido al siguiente error: ' . $row->validation_error;
            // dd($body);
            $rowCounter++;
        });

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('filas')->plural($failedRowsCount) . ' fallaron en la importacion';
        }

        return $body;
    }
}
