<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart;

use Filament\Contracts\Plugin;
use Filament\Panel;
use JeffersonGoncalves\FilamentCommerce\Cart\Concerns\HasCommerceCartPluginConfig;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\CartResource;

class CommerceCartPlugin implements Plugin
{
    use HasCommerceCartPluginConfig;

    public function getId(): string
    {
        return 'filament-commerce-cart';
    }

    public function register(Panel $panel): void
    {
        $panel->resources($this->resolveResources([
            'cart' => CartResource::class,
        ]));

        $panel->widgets($this->resolveWidgets());
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
