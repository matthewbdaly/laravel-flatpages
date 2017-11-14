<?php

namespace Matthewbdaly\LaravelFlatpages\Contracts\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface;

interface Flatpage extends AbstractRepositoryInterface
{
    /**
     * Get flatpage
     *
     * @param string $path The flatpage path.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByPath(string $path);
}
