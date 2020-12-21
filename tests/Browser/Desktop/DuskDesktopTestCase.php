<?php

namespace Tests\Browser\Desktop;

use Tests\Browser\DuskTestCase;

abstract class DuskDesktopTestCase extends DuskTestCase
{

    protected function getTestPrefix(): string
    {
        return 'desktop';
    }

    protected function getWindowSize() : string
    {
        return '1920,1080';
    }
}
