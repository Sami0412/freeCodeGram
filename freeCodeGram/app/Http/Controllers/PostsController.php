<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');      //Makes sure post creation only available to signed in (authenticated) user - redirects to login page if not logged in
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        //Get authenticated user - create post against that user id:
        auth()->user()->posts()->create($data);

        dd(request()->all());
    }
}
