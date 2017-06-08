<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostList extends Model
{
    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
