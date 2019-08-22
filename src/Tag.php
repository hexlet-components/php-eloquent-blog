<?php

namespace App;

class Tag extends \Illuminate\Database\Eloquent\Model
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
