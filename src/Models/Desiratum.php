<?php

namespace Scool\Timetables\Models;

use Acacha\Names\Traits\Nameable;
use Acacha\Stateful\Traits\StatefulTrait;
use Illuminate\Database\Eloquent\Model;

class Desiratum extends Model
{
    use Nameable, StatefulTrait;

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
