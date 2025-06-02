<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CertificadoResource\Pages;
use App\Filament\Resources\CertificadoResource\RelationManagers;
use App\Models\Certificado;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CertificadoResource extends Resource
{
    protected static ?string $model = Certificado::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre_completo')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('tipo_doc')
                    ->maxLength(255)
                    ->default('false'),
                Forms\Components\TextInput::make('documento')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DateTimePicker::make('fecha_creacion'),
                Forms\Components\TextInput::make('departamento')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('ciudad')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('empresa')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('curso')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('codigo_certificado')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombre_completo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_doc')
                    ->searchable(),
                Tables\Columns\TextColumn::make('documento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_creacion')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('departamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ciudad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('empresa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('curso')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo_certificado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
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
