<?php

namespace App\Filament\Resources\ProfilPmis\Pages;

use App\Filament\Resources\ProfilPmis\ProfilPmiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProfilPmi extends EditRecord
{
    protected static string $resource = ProfilPmiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
