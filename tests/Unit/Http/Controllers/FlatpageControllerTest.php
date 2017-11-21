<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Matthewbdaly\LaravelFlatpages\Http\Controllers\FlatpageController;
use Mockery as m;

class FlatpageControllerTest extends TestCase
{
    public function testGetFlatpage()
    {
        $flatpage = m::mock('Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage');
        $flatpage->shouldReceive('toArray')->once()->andReturn([
            'id' => 1,
            'title' => 'About me',
            'content' => 'All about me'
        ]);
        $repo = m::mock('Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage');
        $repo->shouldReceive('findBySlug')->with('/about/')->once()->andReturn($flatpage);
        $controller = new FlatpageController($repo);
        $controller->page('/about/');
    }
}
