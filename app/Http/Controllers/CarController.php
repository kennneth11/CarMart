<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMaker;
use App\Models\CarModel;
use App\Models\CarBodyType;
use App\Models\CarTransmission;
use App\Models\CarFuelType;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function viewMyCar()
    {
        
        return view('Seller/car/my-cars');
    }

    public function viewPostCar()
    {
        
        return view('Seller/car/post-car');
    }
}
