<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Book;
use App\Models\Question;
use App\Models\KnowledgeCard;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //postsの単一レコードをidで取得
        $post = Post::findOrFail($id);

        //リレーション先のbooksの単一レコードを取得
        $book = $post->book;

        //記事のbook_idとbook_pageを共通して持ち、knowledge_cardとリレーションのあるquestionのレコードを、ナンバー順に並べて取得
        $Xquestions = Question::where('book_id', $post->book_id)->where('book_page', $post->book_page)->with('question_has_cards')->orderBy('question_number','asc')->get();

        // 記事のbook_idを共通して持つpostのレコードを、book_page順に並べて取得
        $Xposts = Post::where('book_id', $post->book_id)->orderBy('book_page','asc')->get();

        return view('posts.show', compact('post', 'book', 'Xquestions', 'Xposts'));
    }
}
