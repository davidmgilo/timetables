<?php

namespace Scool\Timetables\Presenters;

use Scool\Timetables\Transformers\DesiratumTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DesiratumPresenter
 *
 * @package namespace Scool\Timetables\Presenters;
 */
class DesiratumPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DesiratumTransformer();
    }
}
