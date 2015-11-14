<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('/calendar/calendar/list', 'Lavalite\Calendar\Http\Controllers\CalendarAdminController@lists');
    Route::resource('/calendar/calendar', 'Lavalite\Calendar\Http\Controllers\CalendarAdminController');
});

Route::get('calendar', 'Lavalite\Calendar\Http\Controllers\PublicController@list');
Route::get('calendar/{slug?}', 'Lavalite\Calendar\Http\Controllers\PublicController@details');
