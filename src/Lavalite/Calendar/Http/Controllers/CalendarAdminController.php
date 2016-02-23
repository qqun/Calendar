<?php

namespace Lavalite\Calendar\Http\Controllers;

use App\Http\Controllers\AdminController as AdminController;
use Form;
use Lavalite\Calendar\Http\Requests\CalendarRequest;
use Lavalite\Calendar\Interfaces\CalendarRepositoryInterface;
use Lavalite\Calendar\Models\Calendar;

/**
 *
 */
class CalendarAdminController extends AdminController
{
    /**
     * Initialize calendar controller.
     *
     * @param type CalendarRepositoryInterface $calendar
     *
     * @return type
     */
    public function __construct(CalendarRepositoryInterface $calendar)
    {
        $this->model = $calendar;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(CalendarRequest $request)
    {
        $this->theme->asset()->add('fullcalendar', 'packages/fullcalendar/fullcalendar.min.css');
        $this->theme->asset()->container('extra')->add('fullcalendar', 'packages/fullcalendar/fullcalendar.min.js');
        $this->theme->asset()->add('icheck', 'packages/icheck/css/icheck/square/blue.css');
        $this->theme->asset()->container('extra')->add('icheckjs', 'packages/icheck/js/icheck.min.js');
        //$calendars  = $this->model->setPresenter('\\Lavalite\\Calendar\\Repositories\\Presenter\\CalendarListPresenter')->paginate(NULL, ['*']);
        $calendars = $this->model->getCalendars();
        $this   ->theme->prependTitle(trans('calendar::calendar.names').' :: ');
        $view   = $this->theme->of('calendar::admin.calendar.index', compact('calendars'))->render();

        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Calendar']);
    /*        $this->responseData = $calendars['data'];
            $this->responseMeta = $calendars['meta'];*/
        $this->responseView = $view;
        $this->responseRedirect = '';
        return $this->respond($request);
    }

 

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function show(CalendarRequest $request,Calendar $calendar)
    {
        $calendars = $this->model->getCalendars();
       if (!$calendar->exists) {
            $this->responseCode = 404;
            $this->responseMessage = trans('messages.success.notfound', ['Module' => 'Calendar']);
            $this->responseData = $calendar;
            $this->responseView = view('calendar::admin.calendar.new');
            return $this -> respond($request);
        }

        Form::populate($calendar);
        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Calendar']);
        $this->responseData = $calendar;
        $this->responseView = view('calendar::admin.calendar.show', compact('calendars'));
        return $this -> respond($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(CalendarRequest $request)
    {
       
        $calendar = $this->model->newInstance([]);

        Form::populate($calendar);

        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Calendar']);
        $this->responseData = $calendar;
        $this->responseView = view('calendar::admin.calendar.create', compact('calendar'));
        return $this -> respond($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(CalendarRequest $request)
    {
       try {
            $attributes = $request->all();
            
            $calendar = $this->model->create($attributes);

            $this->responseCode = 201;
            $this->responseMessage = trans('messages.success.created', ['Module' => 'Calendar']);
            $this->responseData = $calendar;
            $this->responseMeta = '';
            $this->responseRedirect = trans_url('/admin/calendar/calendar');
            // $this->responseView = view('calendar::admin.calendar.create', compact('calendar'));

            return $this -> respond($request);

        } catch (Exception $e) {
            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            return $this -> respond($request);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    
    public function edit(CalendarRequest $request, Calendar $calendar)
    {
        Form::populate($calendar);
        $this->responseCode = 200;
        $this->responseMessage = trans('messages.success.loaded', ['Module' => 'Calendar']);
        $this->responseData = $calendar;
        $this->responseView = view('calendar::admin.calendar.edit', compact('calendar'));

        return $this -> respond($request);
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return Response
     */
    public function update(CalendarRequest $request, Calendar $calendar)
    {

         try {
            // $attributes = $request->all();
            parse_str($request->get('data'), $attributes);
            if (isset($attributes['status']) && $attributes['status'] == 'Both')
                $calendar -> create($attributes);
            else
                $calendar -> update($attributes);

            $this->responseCode = 204;
            $this->responseMessage = trans('messages.success.updated', ['Module' => 'Calendar']);
            $this->responseData = $calendar;
            $this->responseRedirect = trans_url('/admin/calendar/calendar/'.$calendar->getRouteKey());

            return $this -> respond($request);

        } catch (Exception $e) {

            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            $this->responseRedirect = trans_url('/admin/calendar/calendar/'.$calendar->getRouteKey());

            return $this -> respond($request);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(CalendarRequest $request, Calendar $calendar)
    {  try {

            $t = $calendar->delete();

            $this->responseCode = 202;
            $this->responseMessage = trans('messages.success.deleted', ['Module' => 'Calendar']);
            $this->responseData = $calendar;
            $this->responseMeta = '';
            $this->responseRedirect = trans_url('/admin/calendar/calendar/0');

            return $this -> respond($request);

        } catch (Exception $e) {

            $this->responseCode = 400;
            $this->responseMessage = $e->getMessage();
            $this->responseRedirect = trans_url('/admin/calendar/calendar/'.$calendar->getRouteKey());

            return $this -> respond($request);

        }
    }

    public function ajaxList($user_id, $category)
    {
        return $this->model->getCalendar($user_id, $category);
    }

    public function calendarList()
    {
        return $this->model->getCalendarList();
    }
}
