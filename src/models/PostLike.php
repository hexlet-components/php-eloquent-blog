<?php

namespace Php\Eloquent\Blog\models;

class PostLike extends \Illuminate\Database\Eloquent\Model
{
    public function user()
    {
        return $this->belongsTo(__NAMESPACE__ . '\User');
    }

    public function post()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Post');
    }
}
