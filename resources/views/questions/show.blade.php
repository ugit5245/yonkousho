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

<form method="POST">
  @csrf

  <table>
    @foreach ($knowledge_cards as $knowledge_card)
    <tr>
      <td>{{ $knowledge_card->id }}</td>
      <td>{{ $knowledge_card->card_title }}</td>
      <td>{{ $knowledge_card->card_content }}</td>
      <td>

        <input type="hidden" name="knowledge_card_id" value="{{$knowledge_card->id}}">



        @if($knowledge_card->card_has_questions()->where('question_id', $question->id)->exists())
        <a href="{{ route('QwithC.detach', $question->id) }}">ひもづけ解除</a>
        @else
        <a href="{{ route('QwithC.attach', $question) }}" onclick="event.preventDefault(); document.getElementById('QwithC.store-form').submit();">ひもづけ</a>
        @endif
</form>
<form id="QwithC.store-form" action="{{ route('QwithC.attach', $question->id) }}" method="POST">
  @csrf
</form>
</td>
</tr>
@endforeach
</table>

@endsection