<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart\Concerns;

use JeffersonGoncalves\FilamentCommerce\Core\Concerns\HasCommercePluginConfig;

trait HasCommerceCartPluginConfig
{
    use HasCommercePluginConfig;

    protected function getConfigKey(): string
    {
        return 'filament-commerce-cart';
    }

    protected function getDefaultNavigationGroup(): string
    {
        return 'Commerce — Sales';
    }
}
