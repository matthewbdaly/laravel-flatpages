<?php

namespace Matthewbdaly\LaravelFlatpages\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage;

/**
 * Flatpage controller
 */
class FlatpageController extends BaseController
{
    /**
     * Flatpage repository
     *
     * @var $repository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param Flatpage $repository The flatpage repository.
     * @return void
     */
    public function __construct(Flatpage $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Look up and return a flat page
     *
     * @param  string $path The path.
     * @return \Illuminate\Http\Response
     */
    public function page($path)
    {
        $page = $this->repository->findBySlug($path);
        return response()->json($page, 200);
    }
}
