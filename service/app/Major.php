<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function student()
    {
        $this->belongsTo('App\Student');
    }
}
