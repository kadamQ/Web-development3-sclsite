<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Http\Requests\CommentRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index() 
    {}

    public function create()
    {
        $tags = Tag::orderBy('title', 'asc')->get();

        return view('posts.create')
            ->with([
                'tag_options' => $tags
            ]);
    }

    public function store(PostRequest $request)
    {
        $post = Auth::user()
            ->posts()
            ->create($request->post);
        return redirect()
            ->route('post.show', ['post' => $post]);
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(compact('post'));
    }

    public function edit(Post $post)
    {
        $tags = Tag::orderBy('title', 'asc')->get();
        return view('posts.edit')->with(compact('post', 'tags'));
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->post);

        return redirect()
            ->route('post.show', ['post' => $post]);
    }

    public function destory(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('feed.index');
    }

    public function comment(Post $post, CommentRequest $request)
    {
        $post->comments()->create([
            'user_id' => Auth::user()->id,
            'text' => $request->comment['text'],
        ]);

        return back();
    }
}
