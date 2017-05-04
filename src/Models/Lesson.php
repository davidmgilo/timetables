<?php

namespace Scool\Timetables\Models;

use Acacha\Stateful\Contracts\Stateful;
use Acacha\Stateful\Traits\StatefulTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Lesson
 * @package Scool\Timetables\Models
 */
class Lesson extends Model implements Transformable, Stateful
{
    use TransformableTrait, StatefulTrait;

    protected $fillable = ['id','location_id','day_id','timeslot_id','classroom_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locations()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Location::class); //TODO
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function days()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Day::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timeslots()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Timeslot::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classrooms()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Classroom::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function submodules()
    {
        return $this->belongsToMany(\Submodule::class); //TODO
    }
}
