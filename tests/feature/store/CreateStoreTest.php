<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Store;
use App\User;

class CreateStoreTest extends TestCase
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

    public function testUserCanCreateStore()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/store/create')
            ->type('New Store', 'store')
            ->type('New Store Description', 'description')
            ->press('Add New Store')
            ->seeInDatabase('stores', ['name' => 'New Store']);
    }

    public function testNumberOfStoresIncreasesInDatabase()
    {
        factory(Store::class, 10)->create();

        $allStores = Store::count();

        $this->count(10, $allStores);
    }

    public function testCreateStoreIfValidationPasses()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/store/create')
            ->type('New Store', 'store')
            ->type('Store Description', 'description')
            ->press('Add New Store')
            ->notSeeInDatabase('stores', ['name' => 'New Store']);
    }
}
