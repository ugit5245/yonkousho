<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QusetionsHaveCardsController extends Controller
{
    public function store($knowledge_card_id)
    {
        Auth::question()->question_has_cards()->attach($knowledge_card_id);

        return back();
    }

    public function destroy($knowledge_card_id)
    {
        Auth::knowledge_card()->question_has_cards()->detach($knowledge_card_id);

        return back();
    }
}
