<?php

namespace Tests\Browser\Mobile;

use Tests\Browser\Pages\AdminCustomerRegistrationTest as DefaultPageTests;

class AdminCustomerRegistrationTest extends DuskMobileTestCase
{
    use DefaultPageTests;

    /**
     * @depends testCustomerRegistration
     */
    public function testCustomerLogout()
    {
        $this->browse(function ($browser) {
            $browser->visit('/dashboard')
                ->press('button.p-2')
                ->clickLink('Logout')
                ->assertPathIs('/');
        });
    }
}
