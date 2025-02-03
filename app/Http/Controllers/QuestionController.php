<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\KnowledgeCard;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $knowledge_cards = KnowledgeCard::all();

        return view('questions.show', compact('question', 'knowledge_cards'));
    }
}
