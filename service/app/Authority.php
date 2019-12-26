<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    public function user()
    {
        $this->belongsTo('APP\User');
    }

    public function projects()
    {
        $this->hasMany('APP\Project');
    }
}
