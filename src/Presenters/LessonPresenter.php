<?php

namespace Scool\Timetables\Presenters;

use Scool\Timetables\Transformers\LessonTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LessonPresenter
 *
 * @package namespace Scool\Timetables\Presenters;
 */
class LessonPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LessonTransformer();
    }
}
