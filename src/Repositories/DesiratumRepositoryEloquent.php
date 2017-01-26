<?php

namespace Scool\Timetables\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Scool\Timetables\Repositories\DesiratumRepository;
use Scool\Timetables\Models\Desiratum;
use Scool\Timetables\Validators\DesiratumValidator;

/**
 * Class DesiratumRepositoryEloquent
 * @package namespace Scool\Timetables\Repositories;
 */
class DesiratumRepositoryEloquent extends BaseRepository implements DesiratumRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Desiratum::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DesiratumValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
