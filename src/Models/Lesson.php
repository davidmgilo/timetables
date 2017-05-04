<?php

namespace Scool\Timetables\Models;

use Acacha\Stateful\Contracts\Stateful;
use Acacha\Stateful\Traits\StatefulTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Lesson extends Model implements Transformable, Stateful
{
    use TransformableTrait, StatefulTrait;

    protected $fillable = ['id','location_id','day_id','timeslot_id','classroom_id'];

    public function locations()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Location::class); //TODO
    }

    public function days()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Day::class);
    }

    public function timeslots()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Timeslot::class);
    }

    public function classrooms()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Classroom::class);
    }

    public function users()
    {
        return $this->belongsToMany(\App\User::class);
    }

    public function submodules()
    {
        return $this->belongsToMany(\Submodule::class); //TODO
    }
}
