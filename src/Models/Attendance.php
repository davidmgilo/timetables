<?php

namespace Scool\Timetables\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Attendance
 * @package Scool\Timetables\Models
 */
class Attendance extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];
}
