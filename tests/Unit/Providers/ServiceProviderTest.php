<?php

namespace Tests\Unit\Providers;

use Mockery as m;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_sets_up_the_repository()
    {
        $repo = $this->app->make('Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage');
        $this->assertInstanceOf(\Matthewbdaly\LaravelFlatpages\Eloquent\Repositories\Decorators\Flatpage::class, $repo);
    }
}
