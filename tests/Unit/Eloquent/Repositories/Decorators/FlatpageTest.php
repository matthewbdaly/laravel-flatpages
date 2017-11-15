<?php

namespace Tests\Unit\Eloquent\Repositories\Decorators;

use Tests\TestCase;
use Matthewbdaly\LaravelFlatpages\Eloquent\Repositories\Decorators\Flatpage;
use Mockery as m;

class FlatpageTest extends TestCase
{
    /**
     * Test find by path
     *
     * @return void
     */
    public function testFindByPath()
    {
        $repo = m::mock('Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage');
        $repo->shouldReceive('getModel')->once()->andReturn('Flatpage');
        $cache = m::mock('Illuminate\Contracts\Cache\Repository');
        $cache->shouldReceive('tags')->with('Flatpage')->once()->andReturn($cache);
        $cache->shouldReceive('remember')->once()->andReturn(true);
        $decorator = new Flatpage($repo, $cache);
        $this->assertEquals(true, $decorator->findBySlug('/about/'));
    }
}
