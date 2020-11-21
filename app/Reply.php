<?php

namespace App;

use App\User;
use App\Replies;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $fillable = [
    	'comment_id',
    	'name',
    	'reply',
		'user_id',
	];
	
	public function user()
    {
        return $this->hasOne('App\User','id', 'user_id');
    }

}
