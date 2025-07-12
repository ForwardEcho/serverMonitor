<?php

namespace App\Filament\Resources\ServerStatResource\Pages;

use App\Filament\Resources\ServerStatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServerStat extends EditRecord
{
    protected static string $resource = ServerStatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
