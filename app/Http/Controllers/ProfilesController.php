<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user())  ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index', compact('user', 'follows'));
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
            'image' => ''
        ]);
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            //$imagePath = profile/randomString.jpg            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(200, 200);
            $image->save();
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge($data, $imageArray ?? []));
        return redirect("/profile/{$user->id}");
    }
}
