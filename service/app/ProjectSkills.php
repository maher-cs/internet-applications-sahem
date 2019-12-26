<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSkills extends Model
{
    public function project()
    {
        return $this->belongsToMany('App\Project');
    }
}
