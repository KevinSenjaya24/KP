<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lagu;
use App\CategoryReservation;

class LaguIbadah extends Model
{
    protected $table = "lagu_ibadah";

    public function lagu()
    {
        return $this->hasOne('App\Lagu','id', 'lagu_id');
    }

    public function CategoryReservation()
    {
        return $this->hasOne('App\CategoryReservation','id', 'category_reservation_id');
    }
}
