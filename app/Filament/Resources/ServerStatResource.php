<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServerStatResource\Pages;
use App\Filament\Resources\ServerStatResource\RelationManagers;
use App\Models\ServerStat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServerStatResource extends Resource
{
    protected static ?string $model = ServerStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hostname'),
                TextColumn::make('cpu_usage')->suffix('%'),
                TextColumn::make('memory_usage')->suffix('%'),
                TextColumn::make('disk_usage')->suffix('%'),
                TextColumn::make('uptime'),
                TextColumn::make('created_at')->label('Reprted At')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListServerStats::route('/'),
            'create' => Pages\CreateServerStat::route('/create'),
            'edit' => Pages\EditServerStat::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool {
        return False;
    }
}
