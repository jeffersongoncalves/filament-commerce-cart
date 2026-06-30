<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class CartForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Details')
                    ->schema([
                        TextInput::make('email'),
                        TextInput::make('currency_code'),
                    ])->columns(2),
            ]);
    }
}
