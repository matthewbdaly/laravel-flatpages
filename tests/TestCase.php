<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

class TestCase extends BaseTestCase
{
    use MockeryPHPUnitIntegration;

	protected function getPackageProviders($app)
	{
		return ['Matthewbdaly\LaravelFlatpages\Providers\FlatpageServiceProvider'];
    }

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'sqlite']);
        $this->loadLaravelMigrations(['--database' => 'sqlite']);
    }
}
