<?php

namespace Tests\Browser\Mobile;

use Tests\Browser\DuskTestCase;

abstract class DuskMobileTestCase extends DuskTestCase
{

    protected function getTestPrefix(): string
    {
        return 'mobile';
    }

    protected function getWindowSize() : string
    {
        return '360,740';
    }
}
