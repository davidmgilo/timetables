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

    protected $states = [
        'draft' => ['inital' => true],
//        'processing',
//        'errored',
//        'active',
//        'closed' => ['final' => true]
    ];

    protected $transitions = [
//        'process' => [
//            'from' => ['draft', 'errored'],
//            'to' => 'processing'
//        ],
//        'activate' => [
//            'from' => 'processing',
//            'to' => 'active'
//        ],
//        'fail' => [
//            'from' => 'processing',
//            'to' => 'errored'
//        ],
//        'close' => [
//            'from' => 'active',
//            'to' => 'close'
//        ]
    ];

//    /**
//     * @return bool
//     */
//    protected function validateProcess()
//    {
//        $validate = true;
//        if (!$validate) {
//            $this->addValidateProcessMessage();
//        }
//
//        return $validate;
//    }
//
//    /**
//     * @return bool
//     */
//    protected function validateActivate()
//    {
//        //dd("validateActivate");
//        return true;
//    }

}
