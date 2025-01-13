@extends('layouts.app')

@section('title','questions')
@section('content')
<p>show単独設問</p>

<div>
<table>
<td>{{$question->question_number}}</td>
<td>{{$question->question_title}}</td>
<td>{{$question->question_content}}</td>
<td>{{$question->recommended_approach}}</td>
</table>
</div>

<p>知識カードリスト</p>

<table>
@foreach ($knowledge_cards as $knowledge_card)
<tr>
<td>{{ $knowledge_card->card_title }}</td>
<td>{{ $knowledge_card->card_content }}</td>
@if(question()->question_has_cards()->where('knowledge_card_id',$knowledge_card->id)->exists())
attach($knowledge_card_id);
<a href="{{route('')}}"
@else
</tr>
@endforeach
</table>

@endsection