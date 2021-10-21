<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start_date', 'end_date',
        'recurrence_period',
        'recurrence_day',
        'recurrence_month_duration'
    ];

    public function getRecurrenceAttribute()
    {
        $recurrence = []; // initialzing blank array

        // getting the period from the inerval month
        $period = CarbonInterval::months($this->recurrence_month_duration ?? '1')
            ->toPeriod($this->start_date, $this->end_date);

        foreach ($period as $key => $interval) {

            // writing query to generate carbon date
            // Query e.g. First Monday of January 2021
            $carbonQuery = $this->recurrence_period . ' ' . $this->recurrence_day . ' of ' . $interval->monthName . ' ' . $interval->year;
            $occurence = new Carbon($carbonQuery);

            // creating carbon object for start and end date
            $carbonStartDate = Carbon::parse($this->start_date);
            $carbonEndDate = Carbon::parse($this->end_date);
            if (
                $carbonStartDate->lessThanOrEqualTo($occurence)
                && $carbonEndDate->greaterThanOrEqualTo($occurence)
            ) {
                $recurrence[$key]['date'] = $occurence->format('Y-m-d');
                $recurrence[$key]['day'] = $occurence->format('l');
            }
        }
        return $recurrence;
    }
}
