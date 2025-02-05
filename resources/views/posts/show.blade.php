@extends('layouts.app')

@section('title','posts')

@section('content')
<h1>{{ $post->post_title }} 攻略</h1>


<div id="entry-date">
  <span>更新日：{{$post->updated_at->format('Y年m月d日')}}</span>
  <span>公開日：{{$post->created_at->format('Y年m月d日')}}</span>
</div>


<div id="relative-link-area" class="area">
  <span>ページ</span>
  <div id="relative-link">
    @foreach ($Xposts as $a)
    <a href="{{ route('posts.show',$a->id) }}">{{ $a->book_page }}</a>
    @endforeach
  </div>
</div>


<div id="table-of-contents" class="area">
  <div>目次</div>
  <ul>
    @foreach ($Xquestions as $Xquestion)
    <li><a href="#{{ $Xquestion->question_number }}">{{ $Xquestion->question_title }}</a></li>
    @endforeach
  </ul>
</div>


<h2>書籍紹介</h2>
<div class="area">
  <h3>{{ $book->book_name }}</h3>
  <div id="book-img"><img src="{{ asset($book->image) }}"></div>
</div>


<h2>設問攻略</h2>
@foreach ($Xquestions as $Xquestion)

<section>
  <H3><span id="{{$Xquestion->question_number}}">{{ $Xquestion->question_number }}</span>：<span id="{{$Xquestion->question_title}}">{{ $Xquestion->question_title }}</span></H3>
  <div>{!! nl2br(e($Xquestion->question_content)) !!}</div>

  @if ($Xquestion->question_has_cards->isEmpty())
  <div></div>
  @else

  <div id="cards-area">
    @foreach ($Xquestion->question_has_cards as $knowledge_card )
    <section id="one-card">
      <h4>{{ $knowledge_card->card_title }}</h4>
      <div>{{ $knowledge_card->card_content }}</div>
      <div>{{ $knowledge_card->source_category_code }}</div>
    </section>
    @endforeach
  </div>

  @endif
</section>
@endforeach


@endsection