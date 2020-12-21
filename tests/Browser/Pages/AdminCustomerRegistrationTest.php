<?php

namespace Tests\Browser\Pages;

trait AdminCustomerRegistrationTest
{
    protected $email;

    protected function initializeParameters()
    {
        $this->email = $this->getTestPrefix() . '@xemenao.local';
    }

    public function testCustomerRegistration()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'Desktop admin')
                ->type('email', $this->email)
                ->type('password', 'pa$$w0rd')
                ->type('password_confirmation', 'pa$$w0rd')
                ->press('REGISTER')
                ->assertPathIs('/dashboard');
        });
    }

    /**
     * @depends testCustomerRegistration
     */
    public function testCustomerLogout()
    {
        $this->browse(function ($browser) {
            $browser->visit('/dashboard')
                ->press('Desktop admin')
                ->clickLink('Logout')
                ->assertPathIs('/');
        });
    }

    /**
     * @depends testCustomerRegistration
     */
    public function testCustomerAlreadyExisting()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'Desktop admin')
                ->type('email', $this->email)
                ->type('password', 'pa$$w0rd')
                ->type('password_confirmation', 'pa$$w0rd')
                ->press('REGISTER')
                ->assertPathIs('/register')
                ->assertSee('The email has already been taken.');
        });
    }

    /**
     * @depends testCustomerAlreadyExisting
     */
    public function testCustomerRegistrationWrongPassword()
    {
        $this->browse(function ($browser) {
            $browser->visit('/register')
                ->type('name', 'Desktop admin 2')
                ->type('email', $this->email)
                ->type('password', 'pa$$w0rd')
                ->type('password_confirmation', 'another')
                ->press('REGISTER')
                ->assertPathIs('/register')
                ->assertSee('The password confirmation does not match.');
        });
    }
}
