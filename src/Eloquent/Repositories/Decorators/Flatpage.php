<?php

namespace Matthewbdaly\LaravelFlatpages\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage as FlatpageContract;
use Illuminate\Contracts\Cache\Repository as Cache;

/**
 * Flatpage decorator
 */
class Flatpage extends BaseDecorator implements FlatpageContract
{
    /**
     * Constructor
     *
     * @param FlatpageContract $repository The repository to wrap.
     * @param Cache            $cache      The cache instance.
     * @return void
     */
    public function __construct(FlatpageContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * Get flatpage by slug
     *
     * @param string $slug The flatpage slug.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findBySlug(string $slug)
    {
        return $this->cache->tags($this->getModel())->remember('slug_'.$slug, 60, function () use ($slug) {
            return $this->repository->findBySlug($slug);
        });
    }
}
