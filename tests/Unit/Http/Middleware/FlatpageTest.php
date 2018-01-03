<?php

namespace Tests\Unit\Http\Middleware;

use Tests\TestCase;
use Matthewbdaly\LaravelFlatpages\Http\Middleware\FlatpageMiddleware;
use Mockery as m;
use Illuminate\Http\Request;

class FlatpageTest extends TestCase
{
    public function testResolveFlatpageDoesNotExist()
    {
        // Create mock response
        $response = m::mock('Illuminate\Http\Response');
        $response->shouldReceive('getStatusCode')->andReturn(404);

        // Create mock repository
        $repo = m::mock('Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage');
        $repo->shouldReceive('findBySlug')->with('/foo/')->once()->andReturn([]);

        // Create request
        $request = Request::create('http://example.com/foo/', 'GET');

        // Call middleware
        $middleware = new FlatpageMiddleware($repo);
        $resp = $middleware->handle($request, function () use ($response) {
            return $response;
        });
        $this->assertEquals(404, $resp->getStatusCode());
    }
}
