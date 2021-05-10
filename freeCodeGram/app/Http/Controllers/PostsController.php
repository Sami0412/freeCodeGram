<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');      //Makes sure post creation only available to signed in (authenticated) user - redirects to login page if not logged in
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->paginate(5);

        return view('posts.index', compact('posts'));
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
        
        //Save image into uploads folder inside storage/public - not accessible to users - run php artisan storage:link - creates symbolic link between private storage and public directory
        $imagePath = request('image')->store('/uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200); //Using intervention/image package to resize pictures
        $image->save();

        //Get authenticated user - create post against that user id:
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        //Redirect to user's profile page
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
        //Same as:
        // return view('posts.show', [
        //     'post' => $post,
        // ]);
    }
}
