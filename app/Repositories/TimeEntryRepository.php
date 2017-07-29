<?php

namespace App\Repositories;

use App\Models\TimeEntry;
use InfyOm\Generator\Common\BaseRepository;

class TimeEntryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TimeEntry::class;
    }
}
