<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UbahPageKalenderTest extends DuskTestCase
{
    /**
     * @group jadwal
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('SIGN IN')
                    ->visit('/admin/jadwal-dokter')
                    ->assertSee('Calendar')
                    ->click('.leading-none')
                    ->assertSee('April')
                    ->click('.leading-none')
                    ->assertSee('March');
        });
    }
}
