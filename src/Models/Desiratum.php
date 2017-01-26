<?php

namespace Scool\Timetables\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Desiratum extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
