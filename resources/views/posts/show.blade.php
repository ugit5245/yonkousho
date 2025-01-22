@extends('layouts.app')

@section('title','posts')

@section('content')
<h1>{{ $post->post_title }} 攻略</h1>

<div>entry-status
<ul>
<li style="display:inline">更新日</li>|<li style="display:inline">公開日</li>
</ul>
</div>

<div>関連リンク</div>

<div>目次</div>
@foreach ($Xquestions as $Xquestion)
<div><a href="#{{$Xquestion->question_title}}">{{ $Xquestion->question_title }}</a></div>
@endforeach

<h2>書籍紹介</h2>
<div>{{ $book->book_name }}</div>


<h2>設問攻略</h2>
@foreach ($Xquestions as $Xquestion)

<H3><span id="{{$Xquestion->question_title}}">{{ $Xquestion->question_title }}</span></H3>
<div>{{ $Xquestion->question_content }}</div>

@if ($Xquestion->question_has_cards->isEmpty())
<div></div>
@else

<div id="cards-area">
@foreach ($Xquestion->question_has_cards as $knowledge_card )
<div id="one-card">
<div>{{ $knowledge_card->card_title }}</div>
<div>{{ $knowledge_card->card_content }}</div>
</div>
@endforeach
</div>

@endif
@endforeach

@endsection