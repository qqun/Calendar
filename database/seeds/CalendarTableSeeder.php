<?php

namespace Lavalite\Calendar;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CalendarTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('calendars')->insert(array(
            // Uncomment  and edit this section for entering value to calendar table.
            /*
            array(
                'name'      => 'Some name',
            ),
            */

        ));

        DB::table('permissions')->insert(array(
            array(
                'name' => 'calendar.calendar.view',
                'readable_name' => 'View Calendar'
            ),
            array(
                'name' => 'calendar.calendar.create',
                'readable_name' => 'Create Calendar'
            ),
            array(
                'name' => 'calendar.calendar.edit',
                'readable_name' => 'Update Calendar'
            ),
            array(
                'name' => 'calendar.calendar.delete',
                'readable_name' => 'Delete Calendar'
            )
        ));

        DB::table('settings')->insert(array(
            // Uncomment  and edit this section for entering value to settings table.
            /*
            array(
                'key'      => 'calendar.calendar.key',
                'name'     => 'Some name',
                'value'    => 'Some value',
                'type'     => 'Default',
            ),
            */
        ));
    }
}
