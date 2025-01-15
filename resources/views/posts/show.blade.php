@extends('layouts.app')

@section('title','posts')
@section('content')
<p>show単独記事</p>
<div>記事名</div>
<div>{{ $post->post_title }}</div>
<div>書籍名</div>
<div>{{ $book->book_name }}</div>
@foreach ($questions as $question)
<div>{{ $question->question_title }}</div>
@endforeach
@endsection