<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Track
 *
 * @mixin Builder
 */
class Track extends Model
{
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function getDurationAttribute()
    {
        $durationInMinutes = 0;
        foreach ($this->courses as $course) {
            $durationInMinutes += $course->duration;
        }
        return $durationInMinutes;
    }
}
