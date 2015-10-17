<?php

namespace Lavalite\Calendar\Http\Controllers;

use Former;
use Response;
use App\Http\Controllers\AdminController as AdminController;

use Lavalite\Calendar\Http\Requests\CalendarRequest;
use Lavalite\Calendar\Interfaces\CalendarRepositoryInterface;

/**
 *
 * @package Calendars
 */

class CalendarAdminController extends AdminController
{

    /**
     * Initialize calendar controller
     * @param type CalendarRepositoryInterface $calendar
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
        $this->theme->prependTitle(trans('calendar::calendar.names').' :: ');

        $this->theme->asset()->add('fullcalendar',            'packages/fullcalendar/fullcalendar.min.css');
        $this->theme->asset()->container('extra')->add('fullcalendar',            'packages/fullcalendar/fullcalendar.min.js');

        return $this->theme->of('calendar::admin.calendar.index')->render();
    }

    /**
     * Return list of calendar as json.
     *
     * @param  Request  $request
     *
     * @return Response
     */
    public function lists(CalendarRequest $request)
    {
        $array = $this->model->json();
        foreach ($array as $key => $row) {
            $array[$key] = array_only($row, config('calendar.calendar.listfields'));
        }

        return array('data' => $array);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return Response
     */
    public function show(CalendarRequest $request, $id)
    {
        $calendar = $this->model->findOrNew($id);

        Former::populate($calendar);

        return view('calendar::admin.calendar.show', compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function create(CalendarRequest $request)
    {
        $calendar = $this->model->findOrNew(0);
        Former::populate($calendar);

        return view('calendar::admin.calendar.create', compact('calendar'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CalendarRequest $request)
    {
        if ($row = $this->model->create($request->all())) {
            return Response::json(['message' => 'Calendar created sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } else {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function edit(CalendarRequest $request, $id)
    {
        $calendar = $this->model->find($id);

        Former::populate($calendar);

        return view('calendar::admin.calendar.edit', compact('calendar'));
    }

    /**
     * Update the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CalendarRequest $request, $id)
    {
        if ($row = $this->model->update($request->all(), $id)) {
            return Response::json(['message' => 'Calendar updated sucessfully', 'type' => 'success', 'title' => 'Success'], 201);
        } else {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(CalendarRequest $request, $id)
    {
        try {
            $this->model->delete($id);
            return Response::json(['message' => 'Calendar deleted sucessfully'.$id, 'type' => 'success', 'title' => 'Success'], 201);
        } catch (Exception $e) {
            return Response::json(['message' => $e->getMessage(), 'type' => 'error', 'title' => 'Error'], 400);
        }
    }

    public function ajaxList($user_id, $category){

        return $this->model->getCalendar($user_id, $category);
    }

}
