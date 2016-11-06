<?php

namespace App;

/**
 * Class Course
 * @property string id
 * @property string name
 * @property string code
 * @property int ects
 * @method static Course find(string $id)
 * @package App
 * @mixin \Moloquent
 */
class Course extends \Moloquent
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
