<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Pages;

use Filament\Resources\Pages\CreateRecord;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\CartResource;

class CreateCart extends CreateRecord
{
    protected static string $resource = CartResource::class;
}
