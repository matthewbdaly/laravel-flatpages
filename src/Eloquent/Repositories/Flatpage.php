<?php

namespace Matthewbdaly\LaravelFlatpages\Eloquent\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use Matthewbdaly\LaravelFlatpages\Contracts\Repositories\Flatpage as FlatpageContract;
use Matthewbdaly\LaravelFlatpages\Eloquent\Models\Flatpage as Model;

class Flatpage extends Base implements FlatpageContract
{
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
        return $this->model->where('slug', $slug)->first();
    }
}
