<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class RegistrationTest extends TestCase
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

    public function testUserCanRegister()
    {
        $this->visit('/register')
            ->type('Lexville', 'name')
            ->type('lex@lex.com', 'email')
            ->type('secret', 'password')
            ->type('secret', 'password_confirmation')
            ->press('Register')
            ->seeInDatabase('users', ['name' => 'Lexville']);
    }

    public function testNumberOfRegisteredUsers()
    {
        factory(User::class, 5)->create();

        $allUsers = User::count();

        $this->count(5, $allUsers);
    }
}
