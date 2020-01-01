<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'end_date', 'category_id', 'authority_id'
    ];

    public function skills()
    {
        return $this->belongsToMany('App\Skill');
    }

    public function authority()
    {
        return $this->belongsTo('App\Authority');
    }

    public function status()
    {
        return $this->belongsTo('App\ProjectStatus');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function offers()
    {
        return $this->hasMany('App\Offer')->with('status')->with('student');
    }
}
