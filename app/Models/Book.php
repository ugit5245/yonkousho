<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }
}
