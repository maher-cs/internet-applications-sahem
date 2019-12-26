<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function project()
    {
        $this->belongsTo('App\Project');
    }
}
