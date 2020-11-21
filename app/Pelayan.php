<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jemaat;
use App\CategoryPelayan;

class Pelayan extends Model
{
    protected $table = "pelayan";

    public function jemaat()
    {
        return $this->hasOne('App\Jemaat','id', 'jemaat_id');
    }

    public function CategoryPelayan()
    {
        return $this->hasOne('App\CategoryPelayan','id', 'category_pelayan_id');
    }

}
