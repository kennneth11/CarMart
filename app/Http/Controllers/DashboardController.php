<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('superadministrator')){
            $userdata = User::all();
            return view('Administrator/dashboard',['users'=>$userdata]);
        }
        else if(Auth::user()->hasRole('seller')){
            return view('Seller/dashboard');
        }
        else if(Auth::user()->hasRole('customer')){

            return view('Customer/dashboard');
        }
    }
}
