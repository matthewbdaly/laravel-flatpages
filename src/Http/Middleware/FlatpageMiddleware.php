<?php

namespace Matthewbdaly\LaravelFlatpages\Http\Middleware;

use Closure;
use Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage;
use Illuminate\Http\Response;

class FlatpageMiddleware
{
    protected $repo;

    public function __construct(Flatpage $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ($response->getStatusCode() == 404) {
            $page = $this->repo->findBySlug($request->getPathInfo());
            if ($page) {
                if (!$template = $page->template) {
                    $template = 'flatpages::base';
                }
                return new Response(view($template, ['flatpage' => $page]));
            }
        }
        return $response;
    }
}
