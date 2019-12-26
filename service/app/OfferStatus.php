<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferStatus extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
