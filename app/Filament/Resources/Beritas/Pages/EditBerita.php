<?php

namespace App\Filament\Resources\Beritas\Pages;

use App\Filament\Resources\Beritas\BeritaResource as ResourcesBeritaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBerita extends EditRecord
{
    protected static string $resource = ResourcesBeritaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
