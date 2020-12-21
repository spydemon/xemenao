<?php

namespace Tests\Browser\TabletPortrait;

use Tests\Browser\DuskTestCase;

abstract class DuskTabletTestCase extends DuskTestCase
{

    protected function getTestPrefix(): string
    {
        return 'tablet_portrait';
    }

    protected function getWindowSize() : string
    {
        return '768,1024';
    }
}
