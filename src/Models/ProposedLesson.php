<?php

namespace Scool\Timetables\Models;

use Acacha\Stateful\Traits\StatefulTrait;
use Illuminate\Database\Eloquent\Model;

class ProposedLesson extends Model
{
    use StatefulTrait;

    protected $fillable = [
        'location_id', 'state', 'desideratum_id'
    ];

    //TODO falta la relació completa, falta la classe User. Traits
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(App\User::class);
    }

    //TODO falta la relació completa, falta la classe Studysubmodule. Traits
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function studysubmodules()
    {
        return $this->belongsToMany(App\StudySubmodule::class);
    }
}
