<?php

namespace App\Filament\Resources\CronjobResource\Pages;

use App\Filament\Resources\CronjobResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCronjob extends EditRecord
{
    protected static string $resource = CronjobResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
