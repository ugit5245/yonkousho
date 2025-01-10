@extends('layouts.app')

@section('title','questions')
@section('content')
<p>show単独設問</p>
<p>{{$question->question_number}}</p>
<p>{{$question->question_title}}</p>
<p>{{$question->question_content}}</p>
<p>{{$question->recommended_approach}}</p>


@endsection