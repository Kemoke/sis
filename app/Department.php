<?php

namespace App;

/**
 * Class Department
 * @property string id
 * @property string name
 * @method static Department find(string $id)
 * @package App
 * @mixin \Moloquent
 */
class Department extends \Moloquent
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programs(){
        return $this->hasMany('App\Program');
    }
}