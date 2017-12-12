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
        $response = $controller->page('about');
        $this->assertEquals('flatpages::base', $response->getName());
        $data = $response->getData()['flatpage']->toArray();
        $this->assertEquals(1, $data['id']);
        $this->assertEquals('About me', $data['title']);
        $this->assertEquals('All about me', $data['content']);
    }
}
