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

    public function getFinishedPercentageAttribute()
    {
        $trackCourses = $this->courses;
        $totalCourseCount = count($trackCourses->toArray());

        $coursesCompletedByUser = Auth::user()->completedCourses;

        $courseToId = function ($course) {
            return $course['id'];
        };

        $trackCoursesIds = array_map($courseToId, $trackCourses->toArray());
        $coursesCompletedByUserIds = array_map($courseToId, $coursesCompletedByUser->toArray());

        $completedTrackCourses = 0;
        foreach ($trackCoursesIds as $trackCourseId) {
            if (in_array($trackCourseId, $coursesCompletedByUserIds)) {
                $completedTrackCourses++;
            }
        }
        return  $completedTrackCourses / $totalCourseCount * 100;
    }
}
