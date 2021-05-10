<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        return view('profiles.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) 
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000); //Using intervention/image package to resize pictures
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

         auth()->user()->profile->update(array_merge(
             $data,
             $imageArray ?? []      //Allows user to update profile without having to change profile pic - If no image uploaded $imageArray will just be empty array
         ));
        
        return redirect("/profile/{$user->id}");
    }
}
