<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AntrianPasien extends DuskTestCase
{
    /**
     * @group pasien
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->assertPathIs('/login')
                    ->type('email','user@gmail.com');
        });
    }
}
