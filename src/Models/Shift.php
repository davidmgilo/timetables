<?php

namespace Scool\Timetables\Models;

use Acacha\Names\Traits\Nameable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shift
 * @package Scool\Timetables\Models
 */
class Shift extends Model
{
    use Nameable;

    protected $fillable = [
        'torn', 'name',
    ];

    //TODO falta la relació completa, falta la classe Timeslot. Traits
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function timeslots()
    {
        return $this->belongsToMany(App\Timeslot::class);
    }
}
