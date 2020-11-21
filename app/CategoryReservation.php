<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryReservation extends Model
{
    protected $table = "category_reservation";
    
    public function Reservation()
    {
        return $this->hasMany('App\Reservation','category_reservation_id', 'id');
    }

}
