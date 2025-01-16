<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function question_has_cards()
    {
        return $this->belongsToMany(KnowledgeCard::class)->withTimestamps();
    }
}
