<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function getDurationLeftAttribute()
    {
        $trackCourses = $this->courses;
        $trackDuration = $trackCourses->sum('duration');

        $coursesCompletedByUser = Auth::user()->completedCourses;

        $completedDuration = 0;
        foreach ($trackCourses as $trackCourse) {
            foreach ($coursesCompletedByUser as $courseCompletedByUser) {
                if ($trackCourse->id === $courseCompletedByUser->id) {
                    $completedDuration += $trackCourse->duration;
                    break;
                }
            }
        }
        return $trackDuration - $completedDuration;
    }
}
