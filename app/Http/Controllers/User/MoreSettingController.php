<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MoreSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(){
        $user = Auth::user();
        return view('profile.updatePassword', compact('user'));
    }

    public function updatePassword(Request $request){
        $this->validate($request,[
            'current_password' => ['required', 'min:8', 'max:32'],
            'new_password' => ['required', 'min:8', 'max:32'],
            'password_confirmation' => ['required', 'same:new_password'],
        ]);

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if(Hash::check($request->current_password, $user->password)){
            $user->update([
                'password'=>bcrypt($request->new_password)
            ]);

            Alert::success('Success', 'You\'ve Successfully Updated Your Password');
            return redirect()->back();
        }else{
            Alert::error('Error', 'Old Password does not match or Password Confirmation do not match');
            return redirect()->back()
                ->with('error', 'Old Password does not match or Password Confirmation do not match');
        }


    }

}
