<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FrontEndController extends Controller
{
    //Welcome Page
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }
}
