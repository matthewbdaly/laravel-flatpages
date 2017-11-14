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
     * @param string $path The flatpage path.
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByPath(string $path)
    {
        return $this->model->where('path', $path)->first();
    }
}
