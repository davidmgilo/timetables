<?php

namespace Scool\Timetables\Models;

use Acacha\Stateful\Contracts\Stateful;
use Acacha\Stateful\Traits\StatefulTrait;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Scool\Timetables\Events\LessonCreated;

/**
 * Class Lesson
 * @package Scool\Timetables\Models
 */
class Lesson extends Model implements Transformable, Stateful
{
    use TransformableTrait, StatefulTrait;

    protected $fillable = ['id','location_id','day_id','timeslot_id','classroom_id', 'state'];

    protected $events = [
        'created' => LessonCreated::class
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locations()
    {
        return $this->belongsTo(\Scool\Timetables\Models\Location::class);
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

    /**
     * States.
     *
     * @var array
     */
    protected $states = [
        'step1' => ['initial' => true],
        'step2' => ['final' => true]
    ];
    /**
     * Transaction State Transitions
     *
     * @var array
     */
    protected $transitions = [
        'step1step2' => [
            'from' => 'step1',
            'to' => 'step2'
        ],
        'step2step1' => [
            'from' => 'step2',
            'to' => 'step1'
        ]
    ];
    /**
     * @return bool
     */
    protected function validateStep1step2()
    {
        if ($this->location_id != null) return true;
        return false;
    }
    /**
     * @return bool
     */
    protected function validateStep2step1()
    {
        return false;
    }

}
