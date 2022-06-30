<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use File;

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

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if($request->hasfile('avatar')){
            $destination = 'userProfiles/'.$user->avatar;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = $user_id. '_avatar'.time(). '.' . $extension;
            $file->move('userProfiles/', $filename);
            $user->avatar = $filename;
        }

        $user->save();
        Alert::success('Success', 'You\'ve Successfully Updated Profile Picture');
        return redirect()->back();
           //->with('success', 'Successfully updated profile picture');
    }
}
