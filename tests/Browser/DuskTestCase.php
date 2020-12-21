<?php

namespace Tests\Browser;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\TestCase as BaseTestCase;
use Tests\CreatesApplication;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * This trait will reset the database at the start of the test run.
     */
    use RefreshDatabase;

    /**
     * Should return a string that defines the size of the browser window.
     * Expected format is <width>,<height>. Eg: '360,740'
     */
    abstract protected function getWindowSize() : string;

    /**
     * Set an identifier that will be used in tests family in order to avoid collisions.
     */
    abstract protected function getTestPrefix() : string;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        $this->initializeParameters();
        parent::__construct($name, $data, $dataName);
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        if (! static::runningInSail()) {
            static::startChromeDriver();
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            // No sandbox option is needed for being able to run the chromedriver as root.
            '--no-sandbox',
            // Headless flag could be removed for being able to see the execution of tests in live through a VNC
            // connexion on the Docker container.
            '--headless',
            "--window-size={$this->getWindowSize()}",
        ]);

        return RemoteWebDriver::create(
            $_SERVER['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
        );
    }

    /**
     * This function can be rewritten in child tests in order to initialize dynamics values needed on some tests.
     */
    protected function initializeParameters() {}
}
