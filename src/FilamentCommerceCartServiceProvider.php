<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCommerceCartServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-commerce-cart';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile();
    }
}
