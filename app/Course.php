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
    private static $startedByUserIdsCache = null;
    private static $completedByUserCache = [];

    public function usersWhoStartedCourse()
    {
        return $this->belongsToMany('App\User', 'user_courses')->withPivot('completed');
    }

    public function getStartedByUserAttribute()
    {
        if (Course::$startedByUserIdsCache === null) {
            $startedCourses = Auth::user()->startedCourses;
            Course::$startedByUserIdsCache = array_map(function ($course) {
                return $course['id'];
            }, $startedCourses->toArray());
        }
        return in_array($this->id, Course::$startedByUserIdsCache);
    }


    public function getCompletedByUserAttribute()
    {
        if (!array_key_exists($this->id, Course::$completedByUserCache)) {
            $courseWithUser = $this->usersWhoStartedCourse()->find(Auth::user()->id);
            if ($courseWithUser !== null) {
                $pivot = $courseWithUser->pivot;
                Course::$completedByUserCache[$this->id] = $pivot->completed;
            } else {
                Course::$completedByUserCache[$this->id] = false;
            }
        }
        return Course::$completedByUserCache[$this->id];
    }
}
