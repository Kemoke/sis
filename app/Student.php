<?php

namespace App;

/**
 * Class Student
 * @property string id
 * @property int student_id
 * @property string name
 * @property string surname
 * @property int year
 * @property int semester
 * @property boolean active
 * @package App
 * @mixin \Moloquent
 */
class Student extends \Moloquent
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo('App\Program');
    }
}
