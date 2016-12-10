<?php

namespace Scool\Timetables\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Scool\Timetables\Repositories\AttendanceRepository;
use Scool\Timetables\Models\Attendance;
use Scool\Timetables\Validators\AttendanceValidator;

/**
 * Class AttendanceRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AttendanceRepositoryEloquent extends BaseRepository implements AttendanceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Attendance::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return AttendanceValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
