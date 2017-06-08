<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function postList()
    {
        return $this->belongsTo('App\PostList');
    }
}
