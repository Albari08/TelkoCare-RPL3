<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfileApoteker2Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/apoteker/ubah-password')
                    ->type('password', 'password 1')
                    ->type('password_confirmation', 'Password')
                    ->press('simpan');
        });
    }
}
