<?php

namespace Lavalite\Calendar\Http\Controllers;

use App\Http\Controllers\PublicController as CMSPublicController;

class CalendarPublicController extends CMSPublicController
{
    /**
     * Constructor.
     *
     * @param type \Lavalite\Calendar\Interfaces\CalendarRepositoryInterface $calendar
     *
     * @return type
     */
    public function __construct(\Lavalite\Calendar\Interfaces\CalendarRepositoryInterface $calendar)
    {
        $this->model = $calendar;
        parent::__construct();
    }

    /**
     * Show calendar's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index($slug)
    {
        $data['calendar'] = $this->model->all();

        return $this->theme->of('calendar::public.calendar.index', $data)->render();
    }

    /**
     * Show calendar.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $data['calendar'] = $this->model->getCalendar($slug);

        return $this->theme->of('calendar::public.calendar.show', $data)->render();
    }
}
