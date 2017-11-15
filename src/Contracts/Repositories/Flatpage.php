<?php

namespace Matthewbdaly\LaravelFlatpages\Contracts\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Interfaces\AbstractRepositoryInterface;

interface Flatpage extends AbstractRepositoryInterface
{
    /**
     * Get flatpage
     *
     * @param string $slug The flatpage slug.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findBySlug(string $slug);
}
