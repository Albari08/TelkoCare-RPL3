<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProfileApotekerTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group apoteker
     */
    public function testExample(): void
    use DatabaseMigrations;
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/apoteker/profile')
                    ->type('tempat_praktik', 'Telkom University')
                    ->press('Sunting Profile');
        });
    }
}
