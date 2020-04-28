<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index()
    {
    }

    // http GET - /posting
    public function create()
    {
        $tags = Tag::orderBy('title', 'asc')->get();

        return view('posts.create')
            ->with([
                'tag_options' => $tags
            ]);
    }

    // http POST - /posting
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
        return view('posts.show')
            ->with(compact('post'));
    }
}
