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
    private static $completedByUserIds = null;

    public function usersWhoCompletedCourse()
    {
        return $this->belongsToMany('App\User', 'user_courses');
    }

    public function getCompletedByUserAttribute()
    {
        if (Course::$completedByUserIds === null) {
            $completedCourses = Auth::user()->completedCourses;
            Course::$completedByUserIds = array_map(function ($course) {
                return $course['id'];
            }, $completedCourses->toArray());
        }
        return in_array($this->id, Course::$completedByUserIds);
    }
}
