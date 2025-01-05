<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeCard extends Model
{
    use HasFactory;

    public function card_has_questions()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
