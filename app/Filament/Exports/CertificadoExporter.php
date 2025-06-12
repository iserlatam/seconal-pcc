<?php

namespace App\Filament\Exports;

use App\Models\Certificado;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class CertificadoExporter extends Exporter
{
    protected static ?string $model = Certificado::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nombre_completo')
                ->label('Nombre Completo'),
            ExportColumn::make('tipo_doc')
                ->label('Tipo de Documento'),
            ExportColumn::make('documento')
                ->label('Documento'),
            ExportColumn::make('fecha_creacion')
                ->label('Fecha de Creación'),
            ExportColumn::make('departamento')
                ->label('Departamento'),
            ExportColumn::make('ciudad')
                ->label('Ciudad'),
            ExportColumn::make('empresa')
                ->label('Empresa'),
            ExportColumn::make('curso')
                ->label('Curso'),
            ExportColumn::make('codigo_certificado')
                ->label('Código del Certificado'),
            ExportColumn::make('created_at')
                ->label('Fecha de Creación PCC'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your certificado export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
