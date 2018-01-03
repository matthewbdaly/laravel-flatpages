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

    public function testResolveFlatpageExists()
    {
        // Create mock response
        $response = m::mock('Illuminate\Http\Response');
        $response->shouldReceive('getStatusCode')->andReturn(404);

        // Create mock model
        $model = m::mock('Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage');
        $model->shouldReceive('getAttribute')->with('template')->once()->andReturn(null);
        $model->shouldReceive('getAttribute')->with('title')->twice()->andReturn('Hello');
        $model->shouldReceive('getAttribute')->with('content')->once()->andReturn('Welcome to my page');

        // Create mock repository
        $repo = m::mock('Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage');
        $repo->shouldReceive('findBySlug')->with('/foo/')->once()->andReturn($model);

        // Create request
        $request = Request::create('http://example.com/foo/', 'GET');

        // Call middleware
        $middleware = new FlatpageMiddleware($repo);
        $resp = $middleware->handle($request, function () use ($response) {
            return $response;
        });
        $this->assertEquals(200, $resp->getStatusCode());
    }

    public function testResolveFlatpageExistsCustomView()
    {
        // Create mock response
        $response = m::mock('Illuminate\Http\Response');
        $response->shouldReceive('getStatusCode')->andReturn(404);

        // Create mock model
        $model = m::mock('Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage');
        $model->shouldReceive('getAttribute')->with('template')->once()->andReturn('flatpages::custom');
        $model->shouldReceive('getAttribute')->with('title')->twice()->andReturn('Hello');
        $model->shouldReceive('getAttribute')->with('content')->once()->andReturn('Welcome to my page');

        // Create mock repository
        $repo = m::mock('Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage');
        $repo->shouldReceive('findBySlug')->with('/foo/')->once()->andReturn($model);

        // Create request
        $request = Request::create('http://example.com/foo/', 'GET');

        // Call middleware
        $middleware = new FlatpageMiddleware($repo);
        $resp = $middleware->handle($request, function () use ($response) {
            return $response;
        });
        $this->assertEquals(200, $resp->getStatusCode());
        $this->assertEquals('flatpages::custom', $resp->getOriginalContent()->getName());
    }
}
