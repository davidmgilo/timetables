<?php

namespace Scool\Timetables\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Day.
 *
 * @package Scool\Timetables\Models
 */
class Day extends Model
{
    // use Nameable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','code','lective'];

    /**
     * Convert the model to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return "PROVA";
    }

    public function lessons()
    {
        return $this->hasMany(\Scool\Timetables\Models\Lesson::class);
    }
}
