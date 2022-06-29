<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AvatarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile.profilepic', compact('user'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'avatar' => ['required','image', 'mimes:jpg,jpeg,bmp,svg,png', 'max:5000'],
        ]);

        $user = Auth::user();
        $avataruploaded = $request->file('avatar');
        $avatarname = $user->id.'_avatar'.time(). '.'. $avataruploaded->getClientOriginalExtension();
        $avatarpath = public_path('/userProfiles/');
        $avataruploaded->move($avatarpath, $avatarname);
        $user->$avataruploaded = $avatarname;
        $user->save();

        return redirect()->back()
            ->with('success', 'Successfully updated profile picture');
    }
}
