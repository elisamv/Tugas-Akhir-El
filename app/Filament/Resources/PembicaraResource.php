<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Pembicara;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PembicaraResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PembicaraResource\RelationManagers;

class PembicaraResource extends Resource
{
    protected static ?string $model = Pembicara::class;

    protected static ?string $navigationIcon = 'heroicon-o-microphone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('acara_id')
                            ->required()
                            ->relationship('acara', 'nama_acara'),
                        TextInput::make('nama_pembicara')->required(),
                        RichEditor::make('biografi')->required(),
                        FileUpload::make('foto')->required(), 
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable(),
                TextColumn::make('nama_acara')
                    ->searchable(),
                TextColumn::make('nama_pembicara')
                    ->searchable(),
                ImageColumn::make('foto'),
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
            'index' => Pages\ListPembicaras::route('/'),
            'create' => Pages\CreatePembicara::route('/create'),
            'edit' => Pages\EditPembicara::route('/{record}/edit'),
        ];
    }    
}
