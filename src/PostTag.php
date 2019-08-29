<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    public function tag()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Tag');
    }

    public function post()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Post');
    }
}
