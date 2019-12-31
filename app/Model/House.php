<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'name',
        'price_weekend',
        'price_weekday',
        'details'
    ];

    public function reservations() {
        return $this->hasMany('App\Model\Reservation');
        //return $this->belongsTo('App\Model\Reservation');  
    }
}
