<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
