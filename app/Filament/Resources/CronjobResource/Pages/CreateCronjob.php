<?php

namespace App\Filament\Resources\CronjobResource\Pages;

use App\Filament\Resources\CronjobResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCronjob extends CreateRecord
{
    protected static string $resource = CronjobResource::class;

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }
}
