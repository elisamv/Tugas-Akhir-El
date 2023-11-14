<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sponsor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SponsorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SponsorResource\RelationManagers;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_sponsor')->required(),
                Select::make('acara_id')
                    ->required()
                    ->relationship('acara', 'nama_acara'),
                Select::make('jenis')
                    ->required()
                    ->options([
                        'Internal'=>'Internal',
                        'Eksternal'=>'Eksternal',
                    ])
        ])
        ->columns(1);
    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable(),
                TextColumn::make('nama_sponsor')
                    ->searchable(),
                TextColumn::make('nama_acara')
                    ->searchable(),
                TextColumn::make('jenis')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }    
}
