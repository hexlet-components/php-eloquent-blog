<?php

namespace App;

class User extends \Illuminate\Database\Eloquent\Model
{
    public function posts()
    {
        return $this->hasMany(__NAMESPACE__ . '\Post', 'creator_id');
    }

    public function postLikes()
    {
        return $this->hasMany(__NAMESPACE__ . '\PostLike', 'creator_id');
    }
}
