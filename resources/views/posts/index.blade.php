@extends('layouts.app')

@section('title','posts')
@section('content')
<h1>記事一覧</h1>
@foreach ($posts as $a)
<div><a href="{{ route('posts.show',$a->id) }}">{{ $a->book_page }}</a></div>
@endforeach
@endsection