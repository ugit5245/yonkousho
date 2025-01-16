<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\KnowledgeCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CardhasQuestionController extends Controller
{
    public function show(Question $question)
    {
        $knowledge_cards = KnowledgeCard::all();

        return view('questions.show', compact('question', 'knowledge_cards'));
    }



    public function attach($a, $b)
    {
        KnowledgeCard::find($b)->card_has_questions()->syncWithoutDetaching($a);
        return back();
    }



    public function detach($a, $b)
    {
        KnowledgeCard::find($b)->card_has_questions()->detach($a);
        return back();
    }
}
