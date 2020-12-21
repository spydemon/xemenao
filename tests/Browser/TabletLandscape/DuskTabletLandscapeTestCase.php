<?php

namespace Tests\Browser\TabletLandscape;

use Tests\Browser\DuskTestCase;

abstract class DuskTabletLandscapeTestCase extends DuskTestCase
{

    protected function getTestPrefix(): string
    {
        return 'tablet_landscape';
    }

    protected function getWindowSize() : string
    {
        return '1024,768';
    }
}
