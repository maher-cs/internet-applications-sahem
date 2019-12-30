<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function major()
    {
        return $this->belongsTo('App\Major');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
