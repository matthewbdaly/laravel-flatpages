<?php

namespace Matthewbdaly\LaravelFlatpages\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Flatpage model
 */
class Flatpage extends Model
{
    use SoftDeletes;
}
