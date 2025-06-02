<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificadoResource\Pages;
use App\Filament\Resources\CertificadoResource\RelationManagers;
use App\Models\Certificado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificadoResource extends Resource
{
    protected static ?string $model = Certificado::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $activeNavigationIcon = 'heroicon-s-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informacion personal')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('nombre_completo')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\Select::make('tipo_doc')
                            ->options([
                                'cc' => 'Cédula de Ciudadanía',
                                'ce' => 'Cédula de Extranjería',
                                'ti' => 'Tarjeta de Identidad',
                                'pa' => 'Pasaporte',
                            ])
                            ->label('Tipo de Documento')
                            ->default('false'),
                        Forms\Components\TextInput::make('documento')
                            ->maxLength(15)
                            ->default(null),
                        Forms\Components\DateTimePicker::make('fecha_creacion')
                            ->default(now())
                            ->label('Fecha de Creación'),
                        Forms\Components\TextInput::make('departamento')
                            ->maxLength(25)
                            ->default(null),
                        Forms\Components\TextInput::make('ciudad')
                            ->maxLength(25)
                            ->default(null),
                    ]),
                Forms\Components\Section::make('Datos del certificado')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('empresa')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('curso')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('codigo_certificado')
                            ->maxLength(255)
                            ->default(null),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->toggleable(true)
                    ->toggledHiddenByDefault(true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_completo'),
                Tables\Columns\TextColumn::make('tipo_doc')
                    ->label('Tipo de Documento')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('documento')
                    ->label('No. Documento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ciudad')
                    ->formatStateUsing(fn($record) => strtoupper($record->ciudad))
                    ->description(function ($record) {
                        return $record->departamento;
                    }),
                Tables\Columns\TextColumn::make('empresa'),
                Tables\Columns\TextColumn::make('curso'),
                Tables\Columns\TextColumn::make('codigo_certificado')
                    ->formatStateUsing(fn($record) => strtoupper($record->codigo_certificado))
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_creacion')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                // RANGO DE FECHAS
                Tables\Filters\Filter::make('fecha_creacion')
                    ->form([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\DatePicker::make('from')->label('Desde'),
                                Forms\Components\DatePicker::make('until')->label('Hasta'),
                            ])
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['from'], fn($q, $date) => $q->whereDate('fecha_creacion', '>=', $date))
                            ->when($data['until'], fn($q, $date) => $q->whereDate('fecha_creacion', '<=', $date));
                    }),
                Tables\Filters\Filter::make('empresa')
                    ->form([
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('empresa')
                                    ->label('Empresa'),
                                Forms\Components\TextInput::make('curso')
                                    ->label('Curso'),
                                Forms\Components\TextInput::make('codigo_certificado')
                                    ->label('Código Certificado'),
                            ])
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['empresa'])) {
                            $query->where('empresa', 'like', '%' . $data['empresa'] . '%');
                        }
                        if (!empty($data['curso'])) {
                            $query->where('curso', 'like', '%' . $data['curso'] . '%');
                        }
                        if (!empty($data['codigo_certificado'])) {
                            $query->where('codigo_certificado', 'like', '%' . $data['codigo_certificado'] . '%');
                        }
                    }),
                Tables\Filters\SelectFilter::make('tipo_doc')
                    ->options([
                        'cc' => 'Cédula de Ciudadanía',
                        'ce' => 'Cédula de Extranjería',
                        'ti' => 'Tarjeta de Identidad',
                        'pa' => 'Pasaporte',
                    ])
                    ->label('Tipo de Documento'),
            ])->filtersFormWidth(MaxWidth::ExtraLarge)
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
            ], ActionsPosition::BeforeCells)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCertificados::route('/'),
            'create' => Pages\CreateCertificado::route('/create'),
            'edit' => Pages\EditCertificado::route('/{record}/edit'),
        ];
    }
}
