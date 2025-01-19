@extends('layouts.app')

@section('title','posts')

@section('content')
<div>記事名</div>
<div>{{ $post->post_title }}</div>
<div>書籍名</div>
<div>{{ $book->book_name }}</div>

@foreach ($Xquestions as $Xquestion)
<div>{{ $Xquestion->question_title }}</div>

@if ($Xquestion->question_has_cards->isEmpty())
<div>知識なし</div>
@else

@foreach ($Xquestion->question_has_cards as $knowledge_card )
<div>{{ $knowledge_card->card_title }}</div>
@endforeach

@endif
@endforeach

@endsection