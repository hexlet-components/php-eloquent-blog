<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function creator()
    {
        return $this->belongsTo(__NAMESPACE__ . '\User');
    }

    public function comments()
    {
        return $this->hasMany(__NAMESPACE__ . '\PostComment');
    }

    public function tags()
    {
        return $this->hasMany(__NAMESPACE__ . '\Tag');
    }

    public function likes()
    {
        return $this->hasMany(__NAMESPACE__ . '\PostLike');
    }
}
