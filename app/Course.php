<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Course
 *
 * @mixin Builder
 */
class Course extends Model
{
    private static $startedByUserIds = null;

    public function usersWhoStartedCourse()
    {
        return $this->belongsToMany('App\User', 'user_courses')->withPivot('completed');
    }

    public function getStartedByUserAttribute()
    {
        if (Course::$startedByUserIds === null) {
            $startedCourses = Auth::user()->startedCourses;
            Course::$startedByUserIds = array_map(function ($course) {
                return $course['id'];
            }, $startedCourses->toArray());
        }
        return in_array($this->id, Course::$startedByUserIds);
    }


    public function getCompletedByUserAttribute()
    {
        $courseWithUser = $this->usersWhoStartedCourse()->find(Auth::user()->id);
        if ($courseWithUser !== null)
        {
            $pivot = $courseWithUser->pivot;
            return $pivot->completed;
        }
        return false;
    }
}
