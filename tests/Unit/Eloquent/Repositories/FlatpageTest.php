<?php

namespace Tests\Unit\Eloquent\Repositories;

use Tests\TestCase;
use Matthewbdaly\LaravelFlatpages\Eloquent\Repositories\Flatpage;
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
        $model = m::mock('Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage');
        $model->shouldReceive('where')->with('path', '/about/')->once()->andReturn($model);
        $model->shouldReceive('first')->once()->andReturn(true);
        $repo = new Flatpage($model);
        $this->assertEquals(true, $repo->findByPath('/about/'));
    }
}
