<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'description', 'student_id', 'project_id', 'status_id'
    ];
    
    public function student()
    {
        return $this->belongsTo('App\Student')->with('major');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function status()
    {
        return $this->belongsTo('App\OfferStatus');
    }
}
