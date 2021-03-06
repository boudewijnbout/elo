<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'users_modules')->withPivot('status')->withTimestamps();
    }
   
    public function users_done()
    {
        return $this->belongsToMany('App\User', 'users_modules')->withPivot('status')->withTimestamps()->wherePivot('status', '=' , 3);
    }

    public function challenges()
    {
        return $this->belongsToMany('App\Challenge', 'challenges_modules');
    }
}
