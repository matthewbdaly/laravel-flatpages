<?php

namespace Matthewbdaly\LaravelFlatpages\Eloquent\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage as FlatpageContract;
use Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage as Model;

/**
 * Flatpage repository
 */
class Flatpage extends Base implements FlatpageContract
{
    /**
     * Constructor
     *
     * @param Model $model The model for the repository.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get flatpage
     *
     * @param string $slug The flatpage slug.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }
}
