<?php

namespace Scool\Timetables\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Scool\Timetables\Repositories\LessonRepository;
use Scool\Timetables\Models\Lesson;
use Scool\Timetables\Validators\LessonValidator;

/**
 * Class LessonRepositoryEloquent
 * @package namespace Scool\Timetables\Repositories;
 */
class LessonRepositoryEloquent extends BaseRepository implements LessonRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Lesson::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return LessonValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
