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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post();
        $post->post_title = $request->input('post_title');
        $post->book_id = $request->input('book_id');
        $post->book_page = $request->input('book_page');
        $post->save();

        return to_route('posts.index');
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

        //book_idとbook_pageが共通するすべてのquestionsレコードを取得
        $questions = Question::where('book_id', $post->book_id)->where('book_page', $post->book_page)->get();

        return view('posts.show', compact('post', 'book', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = new post();
        $post->post_title = $request->input('post_title');
        $post->book_id = $request->input('book_id');
        $post->book_page = $request->input('book_page');
        $post->save();

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return to_route('posts.index');
    }
}
