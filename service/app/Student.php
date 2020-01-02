<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'breif', 'user_id', 'major_id'
    ];

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
        return $this->hasMany('App\Offer')->with('project')->with('status');
    }
}
