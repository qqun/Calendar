<?php

namespace Lavalite\Calendar\Models;

use Lavalite\Filer\FilerTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Calendar extends Model
{
    use FilerTrait;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Initialiaze page modal
     *
     * @param $name
     */
    public function __construct()
    {
        parent::__construct();
        $this->initialize();
    }

    /**
     * Initialize the modal variables.
     *
     * @return void
     */
    public function initialize()
    {
        $this->fillable             = config('calendar.calendar.fillable');
        $this->uploads              = config('calendar.calendar.uploadable');
        $this->uploadRootFolder     = config('calendar.calendar.upload_root_folder');
        $this->table                = config('calendar.calendar.table');
    }

}
