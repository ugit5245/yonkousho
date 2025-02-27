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




<!-- foreach内のgetElementByIdとその相手先の組合せはユニークに -->

<table>
  @foreach ($knowledge_cards as $knowledge_card)
  <tr>
    <td>{{ $knowledge_card->id }}</td>
    <td>{{ $knowledge_card->card_title }}</td>
    <td>{{ $knowledge_card->card_content }}</td>
    <td>
      <form method="POST">
        @csrf

        @if($knowledge_card->card_has_questions()->where('question_id', $question->id)->exists())
        <a href="{{ route('QwithC.detach', ['x' => $question->id, 'y' => $knowledge_card->id]) }}" onclick="event.preventDefault(); document.getElementById('QwithC.detach-form-{{$knowledge_card->id}}').submit();">ひもづけ解除</a>

        @else
        <a href="{{ route('QwithC.attach', ['x' => $question->id, 'y' => $knowledge_card->id]) }}" onclick="event.preventDefault(); document.getElementById('QwithC.store-form-{{$knowledge_card->id}}').submit();">ひもづけ</a>
        @endif
      </form>

      <form id="QwithC.detach-form-{{$knowledge_card->id}}" action="{{ route('QwithC.attach', ['x' => $question->id, 'y' => $knowledge_card->id]) }}" method="POST">
        @csrf
        @method('DELETE')
      </form>

      <form id="QwithC.store-form-{{$knowledge_card->id}}" action="{{ route('QwithC.attach', ['x' => $question->id, 'y' => $knowledge_card->id]) }}" method="POST">
        @csrf
      </form>

    </td>
  </tr>
  @endforeach
</table>

@endsection