<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    public function creator()
    {
        return $this->belongsTo(__NAMESPACE__ . '\User');
    }

    public function post()
    {
        return $this->belongsTo(__NAMESPACE__ . '\Post');
    }
}
