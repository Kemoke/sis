<?php

namespace App;
use bar\baz\source_with_namespace;

/**
 * Class Program
 * @property string id
 * @property string name
 * @method static Program find(string $id)
 * @package App
 * @mixin \Moloquent
 */
class Program extends \Moloquent
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
