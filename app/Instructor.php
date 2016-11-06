<?php

namespace App;

class Instructor extends \Moloquent
{
    public function sections()
    {
        return $this->hasMany('App\Section');
    }

    public function program()
    {
        return $this->belongsTo('App\Program');
    }
}
