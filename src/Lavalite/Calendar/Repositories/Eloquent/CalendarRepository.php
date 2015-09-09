<?php
namespace Lavalite\Calendar\Repositories\Eloquent;
use Lavalite\Calendar\Interfaces\CalendarRepositoryInterface;
class CalendarRepository extends BaseRepository implements CalendarRepositoryInterface
{
    /**
    * Specify Model class name
    *
    * @return string
    */
    function model()
    {
        return "Lavalite\\Calendar\\Models\\Calendar";
    }

    /**
     * Return the calendar data of the user
     * @param type $user_id
     * @param type $category
     * @return type
     */
    public function getCalendar($user_id, $category){
            $arr    = $this->model->select(['start', 'end', 'title', 'id'])
                                ->whereUserId($user_id)
                            ->get()
                            ->toArray();

        foreach ($arr as $key => $value) {
            $arr[$key]['start']     = Carbon::createFromFormat('d-m-Y h:i A', $value['start'])->toDateTimeString();
            $arr[$key]['end']       = Carbon::createFromFormat('d-m-Y h:i A', $value['end'])->toDateTimeString();
        }
        return $arr;
    }
}