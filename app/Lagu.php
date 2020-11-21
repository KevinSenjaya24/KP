<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lagu extends Model
{
    protected $table = "lagu";
    protected $fillable = ['judul', 'category', 'isi'];
}
