<?php

namespace Lavalite\Calendar\Repositories\Presenter;

use Litepie\Database\Presenter\FractalPresenter;

class CalendarListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CalendarListTransformer();
    }
}