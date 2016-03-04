<?php

namespace Lavalite\Calendar;

class Calendar
{
    protected $calendar;

    public function __construct(\Lavalite\Calendar\Interfaces\CalendarRepositoryInterface $calendar)
    {
        $this->calendar = $calendar;
    }

     /**
    * Returns count of calendar.
    *
    * @param array $filter
    *
    * @return int
    */
    public function count()
    {
        return  $this->calendar->getCount();
    }

    /**
     * Display Calendar of the user.
     *
     * @return void
     *
     * @author
     **/
    public function display($view)
    {
        return view('calendar::admin.calendar.'.$view);
    }

     public function LatestEvents()
    {
        return  $this->calendar->LatestEvents();
    }
}
