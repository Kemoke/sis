<?php

namespace App;

/**
 * Class Section
 * @property string id
 * @property string name
 * @property string room
 * @property int capacity
 * @method static Section find(string $id)
 * @package App
 * @mixin \Moloquent
 */
class Section extends \Moloquent
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany('App\User');
    }

    public function instructor()
    {
        return $this->hasOne('App\Instructor');
    }

    /**
     * @return \Jenssegers\Mongodb\Relations\EmbedsMany
     */
    public function timetable()
    {
        return $this->embedsMany('App\CourseTime');
    }
}
