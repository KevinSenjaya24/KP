<?php

namespace App;

use App\User;
use App\Replies;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = array(
        'name',
        'comment',
        'user_id'
    );

    public function user()
    {
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function replies(){
    	return $this->hasMany('App\Reply');
    }
}
