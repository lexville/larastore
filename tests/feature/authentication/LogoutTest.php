<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogoutTest extends TestCase
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

    public function userCanLogout()
    {
        factory(User::class)->create([
            'name' => 'Lexville',
            'email' => 'lex@lex.com',
            'password' => bcrypt('secret'),
        ]);

        $this->visit('/login')
            ->type('lex@lex.com', 'email')
            ->type('secret', 'password')
            ->press('Login')
            ->see('Lexville')
            ->visit('/logout')
            ->see('Login');
    }
}
