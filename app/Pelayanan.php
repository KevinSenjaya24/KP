<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pelayan;
use App\CategoryReservation;

class Pelayanan extends Model
{
    protected $table = "pelayanan";

    public function pelayan()
    {
        return $this->hasOne('App\Pelayan','id', 'pelayan_id');
    }

    public function CategoryReservation()
    {
        return $this->hasOne('App\CategoryReservation','id', 'category_reservation_id');
    }
}
