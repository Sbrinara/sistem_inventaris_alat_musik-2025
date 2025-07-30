<?php

namespace App\Filament\Admin\Resources\InstrumentRelationResource\Pages;

use App\Filament\Admin\Resources\InstrumentRelationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstrumentRelation extends EditRecord
{
    protected static string $resource = InstrumentRelationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
