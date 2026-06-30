<?php

use JeffersonGoncalves\Commerce\Cart\Models\Cart;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Pages\CreateCart;
use JeffersonGoncalves\FilamentCommerce\Cart\Resources\Cart\Pages\ListCart;
use Livewire\Livewire;

it('renders the cart list page', function () {
    Cart::factory()->count(2)->create();

    Livewire::test(ListCart::class)->assertOk();
});

it('creates a cart record through the panel', function () {
    Livewire::test(CreateCart::class)
        ->fillForm([
            'currency_code' => 'usd',
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Cart::query()->count())->toBe(1);
});
