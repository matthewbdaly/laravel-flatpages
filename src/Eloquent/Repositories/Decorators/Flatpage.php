<?php

namespace Matthewbdaly\LaravelFlatpages\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage as FlatpageContract;
use Illuminate\Contracts\Cache\Repository as Cache;

class Flatpage extends BaseDecorator implements FlatpageContract
{
    public function __construct(FlatpageContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }

    /**
     * Get flatpage by path
     *
     * @param string $path The flatpage path.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByPath(string $path)
    {
        return $this->cache->tags($this->getModel())->remember('path_'.$path, 60, function () use ($path) {
            return $this->repository->findPath($path);
        });
    }
}
