<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jemaat;

class Bpj extends Model
{
    protected $table = "bpj";

    public function jemaat()
    {
        return $this->hasOne('App\Jemaat','id', 'jemaat_id');
    }
}
