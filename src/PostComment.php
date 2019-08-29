<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    public function creator()
    {
        return $this->belongsTo(__NAMESPACE__ . '\User');
    }

    public function post()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Post');
    }
}
