<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('superadministrator')){
            return view('Administrator/dashboard');
        }
        else if(Auth::user()->hasRole('seller')){
            return view('Seller/dashboard');
        }
        else if(Auth::user()->hasRole('customer')){
            return view('Customer/dashboard');
        }
    }
}
