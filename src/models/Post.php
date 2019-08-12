<?php

namespace Php\Eloquent\Blog\models;

class Post extends \Illuminate\Database\Eloquent\Model
{
    public function user()
    {
        return $this->belongsTo(__NAMESPACE__ . '\User', 'creator_id');
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
