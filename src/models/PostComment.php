<?php

namespace Php\Eloquent\Blog\models;

class PostComment extends \Illuminate\Database\Eloquent\Model
{
    public function user()
    {
        return $this->belongsTo(__NAMESPACE__ . '\User', 'creator_id');
    }

    public function post()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Post');
    }
}
