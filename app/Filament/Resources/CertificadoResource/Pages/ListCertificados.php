<?php

namespace App\Filament\Resources\CertificadoResource\Pages;

use App\Exports\CertificadoExport;
use App\Filament\Resources\CertificadoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Maatwebsite\Excel\Facades\Excel;

class ListCertificados extends ListRecords
{
    protected static string $resource = CertificadoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('Exportar')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('secondary')
                ->url(route('certificaciones.exportar'))
                ->requiresConfirmation(false),
        ];
    }
}
