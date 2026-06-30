<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use JeffersonGoncalves\Commerce\Cart\Models\Cart;
use JeffersonGoncalves\FilamentCommerce\Cart\CommerceCartPlugin;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Pages\CreateCart;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Pages\EditCart;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Pages\ListCart;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Schemas\CartForm;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Tables\CartTable;

class CartResource extends Resource
{
    protected static ?string $model = Cart::class;

    public static function getNavigationGroup(): ?string
    {
        try {
            return CommerceCartPlugin::get()->getNavigationGroup();
        } catch (\Throwable) {
            return config('filament-commerce-cart.navigation_group', 'Commerce — Sales');
        }
    }

    public static function form(Form $form): Form
    {
        return CartForm::configure($form);
    }

    public static function table(Table $table): Table
    {
        return CartTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCart::route('/'),
            'create' => CreateCart::route('/create'),
            'edit' => EditCart::route('/{record}/edit'),
        ];
    }
}
