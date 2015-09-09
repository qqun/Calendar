<?php
Route::get('calendar', 'Lavalite\Calendar\Http\Controllers\PublicController@list');
Route::get('calendar/{slug?}', 'Lavalite\Calendar\Http\Controllers\PublicController@details');