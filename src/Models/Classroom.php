<?php

namespace Scool\Timetables\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Classroom
 * @package Scool\Timetables\Models
 */
class Classroom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(\Scool\Timetables\Models\Lesson::class);
    }
}
