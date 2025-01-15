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

    public function attach(Request $request, Question $question)
    {
        $kId = $request->input('knowledge_card_id');

        $question->knowledge_cards()->syncWithoutDetaching($kId);

        return redirect()->route('question.show', $question);
    }

    public function detach(Request $request, Question $question)
    {
        $kId = $request->input('knowledge_card_id');
        $question->question_has_cards()->detach($kId);

        return redirect()->route('question.show', $question);
    }
}
