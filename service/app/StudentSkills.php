<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSkills extends Model
{
    public function student()
    {
        return $this->belongsToMany('App\Student');
    }
}
