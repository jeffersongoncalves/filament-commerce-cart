<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\CartResource;

class ListCart extends ListRecords
{
    protected static string $resource = CartResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
