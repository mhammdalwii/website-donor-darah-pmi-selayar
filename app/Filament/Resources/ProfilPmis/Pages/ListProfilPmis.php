<?php

namespace App\Filament\Resources\ProfilPmis\Pages;

use App\Filament\Resources\ProfilPmis\ProfilPmiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProfilPmis extends ListRecords
{
    protected static string $resource = ProfilPmiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
