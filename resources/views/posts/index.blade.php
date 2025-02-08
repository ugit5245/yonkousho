@extends('layouts.app')

@section('title','posts')

@section('content')
<h1>記事一覧</h1>

@foreach ($books as $book)
<div>{{ $book->book_name }}</div>

<div id="pages-link">
@foreach ($posts as $a)
@if ($a['book_id'] === $book['id'] )
<a href="{{ route('posts.show',$a->id) }}">{{ $a->book_page }}</a>
@else

@endif

@endforeach
</div>

@endforeach

@endsection