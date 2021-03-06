<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Store;
use App\Product;

class CreateProductTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testStoreOwnerCanCreateProduct()
    {
        $user = factory(User::class)->create();

        $store = factory(Store::class)->create();

        $this->actingAs($user)
            ->visit('/store/1/product/create')
            ->type('New Product', 'product_name')
            ->type('New Product Description', 'product_description')
            ->type('12', 'product_price')
            ->press('Add New Product')
            ->seeInDatabase('products', ['product_name' => 'New Product']);
    }

    public function testProductNumberIncreasesInDatabase()
    {
        factory(Product::class, 10)->create();

        $newProduct = Product::count();

        $this->count(10, $newProduct);
    }

    public function testProductCreatedIfValidationPasses()
    {
        $user = factory(User::class)->create();

        factory(Store::class)->create();

        $this->actingAs($user)
            ->visit('/store/1/product/create')
            ->type('New Product', 'product_name')
            ->type('Product Description', 'product_description')
            ->type('12', 'product_price')
            ->press('Add New Product')
            ->notSeeInDatabase('products', ['product_name' => 'New Product']);
    }
}
