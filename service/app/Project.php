<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }
}
