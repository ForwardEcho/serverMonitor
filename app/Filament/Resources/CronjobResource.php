<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CronjobResource\Pages;
use App\Filament\Resources\CronjobResource\RelationManagers;
use App\Models\Cronjob;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CronjobResource extends Resource
{
    protected static ?string $model = Cronjob::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('job_name')
                    ->label('Job Name')
                    ->required(),
                TextInput::make('run_as')
                    ->label('Run As')
                    ->required(),
                TextInput::make('command')
                    ->label('Command')
                    ->required(),
                TextInput::make('time_to_run')
                    ->label('Time To Run')
                    ->required(),
                Select::make('status')
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive'
                    ])
                    ->label('Status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('job_name')
                    ->label('Job Name'),
                TextColumn::make('run_as')
                    ->label('Run As'),
                TextColumn::make('command')
                    ->label('Command'),
                TextColumn::make('time_to_run')
                    ->label('Time To Run'),
                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'inactive',
                        'success' => 'active',
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ]);
            /**->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);**/
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
            'index' => Pages\ListCronjobs::route('/'),
            'create' => Pages\CreateCronjob::route('/create'),
            'edit' => Pages\EditCronjob::route('/{record}/edit'),
        ];
    }
}
