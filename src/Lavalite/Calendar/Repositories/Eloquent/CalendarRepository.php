<?php

namespace Lavalite\Calendar\Repositories\Eloquent;

use Lavalite\Calendar\Interfaces\CalendarRepositoryInterface;
use Litepie\Database\Eloquent\BaseRepository;

class CalendarRepository extends BaseRepository implements CalendarRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
         return config('package.calendar.calendar.model');
    }

    /**
     * Return the calendar data of the user.
     *
     * @param type $user_id
     * @param type $category
     *
     * @return type
     */
/*    public function getCalendar($user_id, $category)
    {
        $arr = $this->model->select(['start', 'end', 'title', 'id'])
                                ->whereUserId($user_id)
                            ->get()
                            ->toArray();

        foreach ($arr as $key => $value) {
            $arr[$key]['start'] = Carbon::createFromFormat('d-m-Y h:i A', $value['start'])->toDateTimeString();
            $arr[$key]['end'] = Carbon::createFromFormat('d-m-Y h:i A', $value['end'])->toDateTimeString();
        }

        return $arr;
    }*/

     public function getCalendars()
    {
      
        return $this->model->orderBy('id','DESC')->whereStatus('Draft')->get();
    }

    public function latestEvents()
    {
      
        return $this->model->orderBy('id','DESC')->where('status','<>','Draft')->get();
    }

    public function getCalendarList()
    {
        $arr    = $this->model->select(['start', 'end', 'title', 'id', 'color'])
                               ->where('status','<>','Draft')
                               ->get();
          $temp = [];  
          foreach ($arr as $key => $value) {
              $temp[$key]['id'] = $value['id'];
              $temp[$key]['title'] = $value['title'];
              $temp[$key]['start'] = date('Y-m-d H:i:s', strtotime($value['start']));
              $temp[$key]['end'] = date('Y-m-d H:i:s', strtotime($value['end']));
              $temp[$key]['backgroundColor'] = $value['color'];
              $temp[$key]['borderColor'] = $value['color'];
              $temp[$key]['textColor'] = '#fff';
          }

        return json_encode($temp);
    }

    public function getCount()
    {
        return  $this->model->count();
    }
}
