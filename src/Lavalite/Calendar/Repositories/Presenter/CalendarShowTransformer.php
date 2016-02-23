<?php

namespace Lavalite\Calendar\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class CalendarShowTransformer extends TransformerAbstract
{
    public function transform(\Lavalite\Calendar\Models\Calendar $calendar)
    {
        return [
            'id'      => $calendar->eid,
            'user_id' => $calendar->user_id,
            'category_id'   => $calendar->category_id,
            'start'   => $calendar->start,
            'end'   => $calendar->end,
            'location'   => $calendar->location,
            'color'   => $calendar->color,
            'title' => $calendar->title,
            'details' => $calendar->details,
            'created_by' => $calendar->created_by,
            'created' => $calendar->created_at
        ];
    }
}