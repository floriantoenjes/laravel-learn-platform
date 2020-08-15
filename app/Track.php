<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Track
 * @package App
 *
 * @@mixin \Illuminate\Database\Eloquent\Builder
 */
class Track extends Model
{
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
