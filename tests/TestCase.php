<?php

namespace JeffersonGoncalves\FilamentCommerce\Cart\Tests;

use Filament\Facades\Filament;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use JeffersonGoncalves\Commerce\Cart\CommerceCartServiceProvider;
use JeffersonGoncalves\FilamentCommerce\Cart\FilamentCommerceCartServiceProvider;
use JeffersonGoncalves\FilamentCommerce\Cart\Tests\Fixtures\TestPanelProvider;
use JeffersonGoncalves\FilamentCommerce\Cart\Tests\Fixtures\TestUser;
use JeffersonGoncalves\FilamentCommerce\Core\Testing\CommerceFilamentTestCase;

abstract class TestCase extends CommerceFilamentTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->rebindFilamentDataStore();

        Filament::setCurrentPanel(Filament::getDefaultPanel());

        $this->withoutVite();

        $this->actingAs(TestUser::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]));
    }

    protected function getPackageProviders($app): array
    {
        return [
            ...$this->filamentTestProviders(),
            CommerceCartServiceProvider::class,
            FilamentCommerceCartServiceProvider::class,
            TestPanelProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
        $app['config']->set('auth.providers.users.model', TestUser::class);
    }

    protected function defineDatabaseMigrations(): void
    {
        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default('');
            $table->rememberToken();
        });

        $this->loadCommerceVendorMigrations([
            'cart' => [
                'create_commerce_carts_table',
                'create_commerce_cart_line_items_table',
                'create_commerce_cart_shipping_methods_table',
            ],
        ]);
    }
}
