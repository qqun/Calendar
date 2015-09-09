<?php namespace Lavalite\Calendar;

class Calendar
{

    protected $calendar;

    public function __construct(\Lavalite\Calendar\Interfaces\CalendarRepositoryInterface $calendar)
    {
        $this->calendar     = $calendar;
    }

    /**
     * Display Calendar of the user
     *
     * @return void
     *
     * @author
     **/
    public function display()
    {
        return view('calendar::admin.calendar.calendar');
    }
}
