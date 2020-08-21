<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Course
 *
 * @mixin Builder
 */
class Course extends Model
{
    public function usersWhoCompletedCourse()
    {
        return $this->belongsToMany('App\User', 'user_courses');
    }
}
