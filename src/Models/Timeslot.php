<?php

namespace Scool\Timetables\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Timeslot
 * @package Scool\Timetables\Models
 */
class Timeslot extends Model
{
    use Nameable;

    protected $fillable = [
         'name', 'init_hour', 'final_hour'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function shifts()
    {
        return $this->belongsToMany(Shift::class)->withTimestamps();
    }

    public function lessons()
    {
        return $this->hasMany(\Scool\Timetables\Models\Lesson::class);
    }
}
