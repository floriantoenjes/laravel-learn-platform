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
    private static $coursesCompletedByUserCache = null;

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

        if (Track::$coursesCompletedByUserCache === null) {
            Track::$coursesCompletedByUserCache = Auth::user()->startedCourses;
        }

        $completedDuration = 0;
        foreach ($trackCourses as $trackCourse) {
            foreach (Track::$coursesCompletedByUserCache as $courseCompletedByUser) {
                if ($trackCourse->id === $courseCompletedByUser->id) {
                    $completedDuration += $trackCourse->duration;
                    break;
                }
            }
        }
        return $trackDuration - $completedDuration;
    }

    public function getOpenCoursesAttribute() {
        $openCourses = [];
        foreach ($this->courses as $course) {
            if (!$course->completedByUser) {
                $openCourses[] = $course;
            }
        }
        return $openCourses;
    }

    public function getCompletedCoursesAttribute() {
        $completedCourses = [];
        foreach ($this->courses as $course) {
            if ($course->completedByUser) {
                $completedCourses[] = $course;
            }
        }
        return $completedCourses;
    }
}
