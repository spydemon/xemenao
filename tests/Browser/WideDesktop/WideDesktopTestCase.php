<?php

namespace Tests\Browser\WideDesktop;

use Tests\Browser\DuskTestCase;

abstract class WideDesktopTestCase extends DuskTestCase
{
    protected function getTestPrefix() : string
    {
        return 'wide_desktop';
    }

    protected function getWindowSize() : string
    {
        return '2560,1440';
    }
}
