<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\CategoryPost;

class Post extends Model
{
    protected $table = "post";
    public function CategoryPost()
    {
        return $this->hasOne('App\CategoryPost','id', 'category_post_id');
    }
}
