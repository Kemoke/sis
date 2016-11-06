<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 * @property string id
 * @property string name
 * @property string email
 * @property string password
 * @property int usertype
 * @mixin \Moloquent
 */

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'usertype'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function student()
    {
        return $this->embedsOne('App\Student');
    }

    public function instructor()
    {
        return $this->embedsOne('App\Instructor');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sections()
    {
        return $this->belongsToMany('App\Section');
    }
}