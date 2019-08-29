<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function creator()
    {
        return $this->belongsTo(__NAMESPACE__ . '\User');
    }

    public function comments()
    {
        return $this->hasMany(__NAMESPACE__ . '\PostComments');
    }

    public function tags()
    {
        return $this->hasMany(__NAMESPACE__ . '\Tag');
    }

    public function likes()
    {
        return $this->hasMany(__NAMESPACE__ . '\PostLikes');
    }
}
