<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CartForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(null)
            ->components([
                Section::make('Details')
                    ->schema([
                        TextInput::make('email'),
                        TextInput::make('currency_code'),
                    ])->columns(2),
            ]);
    }
}
