<?php

namespace Scool\Timetables\Models;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    //fillable


    //TODO falta la relació completa, falta la classe Timeslot. Traits
    public function timeslots()
    {
        return $this->belongsToMany(App\Timeslot::class);
    }
}
