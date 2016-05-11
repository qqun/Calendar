<?php

namespace Lavalite\Calendar\Http\Requests;

use App\Http\Requests\Request;

class CalendarAdminWebRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(\Illuminate\Http\Request $request)
    {
        $calendar = $this->route('calendar');

// Determine if the user is authorized to access calendar module,
        if (is_null($calendar)) {
            return $request->user('admin.web')->canDo('calendar.calendar.view');
        }

// Determine if the user is authorized to create an entry,
        if ($request->isMethod('POST') || $request->is('*/create')) {
            return $request->user('admin.web')->can('create', $calendar);
        }

// Determine if the user is authorized to update an entry,
        if ($request->isMethod('PUT') || $request->isMethod('PATCH') || $request->is('*/edit')) {
            return $request->user('admin.web')->can('update', $calendar);
        }

// Determine if the user is authorized to delete an entry,
        if ($request->isMethod('DELETE')) {
            return $request->user('admin.web')->can('delete', $calendar);
        }

        // Determine if the user is authorized to view the module.
        return $request->user('admin.web')->can('view', $calendar);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(\Illuminate\Http\Request $request)
    {

// validation rule for create request.
        if ($request->isMethod('POST')) {
            return [
            ];
        }

// Validation rule for update request.
        if ($request->isMethod('PUT') || $request->isMethod('PATCH')) {
            return [
            ];
        }

        // Default validation rule.
        return [

        ];
    }

}
