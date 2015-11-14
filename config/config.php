<?php

return [
/*
* Provider .
*/
'provider'  => 'lavalite',

/*
* Package .
*/
'package'   => 'calendar',

/*
* Modules .
*/
'modules'   => ['calendar'],

'calendar' => [
                    'Name'          => 'Calendar',
                    'name'          => 'calendar',
                    'table'         => 'calendars',
                    'model'         => 'Lavalite\Calendar\Models\Calendar',
                    'image'         => [
                        'xs'        => ['width' => '60',     'height' => '45'],
                        'sm'        => ['width' => '100',    'height' => '75'],
                        'md'        => ['width' => '460',    'height' => '345'],
                        'lg'        => ['width' => '800',    'height' => '600'],
                        'xl'        => ['width' => '1000',   'height' => '750'],
                        ],
                    'fillable'          => ['id', 'user_id', 'category_id', 'start', 'end', 'location', 'title', 'details', 'created_by', 'created_at', 'updated_at', 'deleted_at'],
                    'listfields'        => ['id', 'user_id', 'category_id', 'start', 'end', 'location', 'title', 'details', 'created_by', 'created_at', 'updated_at', 'deleted_at'],
                    'translatable'      => ['id', 'user_id', 'category_id', 'start', 'end', 'location', 'title', 'details', 'created_by', 'created_at', 'updated_at', 'deleted_at'],
                    'upload-folder'     => '/uploads/calendar/calendar',
                    'uploadable'        => [
                                                'single'   => [],
                                                'multiple' => [],
                                            ],

                    ],
];
