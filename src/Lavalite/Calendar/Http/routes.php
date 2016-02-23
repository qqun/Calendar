<?php

Route::group(
[
'prefix' => Trans::setLocale().'/admin/calendar'
],
function () {
    Route::resource('calendar', 'CalendarAdminController');
    Route::get('/calendar/ajax/list', 'CalendarAdminController@calendarList');
});

Route::get('calendar', 'CalendarPublicController@list');
Route::get('calendar/{slug?}', 'CalendarPublicController@details');





