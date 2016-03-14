<?php

// Admin routes for module
Route::group(['prefix' => trans_setlocale().'/admin/calendar', 
			  'middleware' => ['web', 'auth.role:admin|superuser']], function () {
    Route::resource('calendar', 'CalendarAdminController');
    Route::get('calendar/ajax/list', 'CalendarAdminController@calendarList');
});
