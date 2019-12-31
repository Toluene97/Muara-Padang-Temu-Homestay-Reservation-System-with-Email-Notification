<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    //table name
    protected $table = 'reservations';
    //primary key
    public $primaryKey = 'ReservationId';

    protected $fillable = [ //kene letak foreign key dlm migration
        'check_in',
        'check_out',
        'num_of_guests',
        'final_price',
        'user_id',
        'HouseId',
    ];

    // protected $hidden = [
    //     'HouseId',
    // ];

    public function houses() {                            
         return $this->belongsTo('App\Model\House', 'HouseId');     
        //return $this->hasMany('App\Model\House');
    }

    public function user()
    {
        return $this -> belongsTo('App\User');
    }
    public function getTotalPrice()
    {
        return $this->houses()->sum(DB::raw('daysDiff'));
    }
}
