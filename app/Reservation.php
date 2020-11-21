<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CategoryReservation;
use App\Jemaat;

class Reservation extends Model
{
    protected $table = "reservation";
    public function CategoryReservation()
    {
        return $this->hasOne('App\CategoryReservation','id', 'category_reservation_id');
    }
    
    public function Jemaat()
    {
        return $this->hasOne('App\Jemaat','id', 'jemaat_id');
    }

}
