<?php

namespace App\Filament\Resources\CertificadoResource\Pages;

use App\Exports\CertificadoExport;
use App\Filament\Exports\CertificadoExporter;
use App\Filament\Imports\CertificadoImporter;
use App\Filament\Resources\CertificadoResource;
use App\Imports\CertificadoImport;
use Filament\Actions;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;
use Maatwebsite\Excel\Facades\Excel;

class ListCertificados extends ListRecords
{
    protected static string $resource = CertificadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\Action::make('Exportar')
            //     ->icon('heroicon-o-arrow-down-tray')
            //     ->color('primary')
            //     ->url(route('certificaciones.exportar'))
            //     ->requiresConfirmation(false),
            Actions\ExportAction::make('Exportar')
                ->exporter(CertificadoExporter::class)
                ->icon('heroicon-o-arrow-down-tray')
                ->color(Color::Green)
                ->label('Exportar Certificados')
                ->requiresConfirmation(false),
            Actions\Action::make('Import CSV')
                ->form([
                    FileUpload::make('file')
                        ->acceptedFileTypes(['text/csv'])
                        ->required()
                        ->storeFiles(false), // Prevent storing it permanently
                ])
                ->action(function (array $data) {
                    $importer = new CertificadoImport();
                    Excel::import($importer, $data['file']);

                    Notification::make()
                        ->title("Importación completada: {$importer->importedCount} registros")
                        ->success()
                        ->send();
                })
                ->icon('heroicon-o-arrow-up-tray')
                ->color(Color::Blue)
                ->label('Importar Certificados')
                ->modalHeading('Importar Certificados desde CSV')
                ->modalDescription('Sube un archivo CSV para importar certificados.'),
            Actions\CreateAction::make()
                ->label('Crear Certificado')
                ->icon('heroicon-s-plus')
                ->color('info'),
        ];
    }
}
