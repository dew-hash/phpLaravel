<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::factory()->create([
            'email' => 'rasatrue@rasa.lt',
        ]);
        $this->browse(function (Browser $browser) use ($user){
            $browser->visit('http://phplaravel.test/login')
                    ->type('email', $user->email)
                    ->type('password','password')
                    ->press('Login')
                    ->assertPathIs('/home');
            $browser->screenshot('login');
        });
    }
}
