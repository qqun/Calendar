<?php

// Admin routes for module
Route::group(['prefix' => trans_setlocale() . '/admin/calendar'], function () {
    Route::resource('calendar', 'CalendarAdminWebController');
    Route::get('calendar/ajax/list', 'CalendarAdminWebController@calendarList');
});
