<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['email', 'first_name', 'last_name'];

    public function posts()
    {
        return $this->hasMany(__NAMESPACE__ . '\Post', 'creator_id');
    }

    public function postLikes()
    {
        return $this->hasMany(__NAMESPACE__ . '\PostLike');
    }
}
