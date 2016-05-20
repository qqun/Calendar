<?php

namespace Lavalite\Calendar\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class CalendarShowPresenter extends FractalPresenter
{

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CalendarShowTransformer();
    }
}
