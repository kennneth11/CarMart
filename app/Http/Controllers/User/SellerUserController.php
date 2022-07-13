<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarMaker;
use App\Models\CarModel;
use App\Models\CarBodyType;
use App\Models\CarTransmission;
use App\Models\CarFuelType;
use App\Models\Car;
use App\Models\CarImage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SellerUserController extends Controller
{
    public function viewSeller(Request $request)
    {
        $seller = User::where('id', '=', $request->key)
            ->first();

        $cars = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->join('users','users.id', '=', 'cars.seller_id')
            ->where('status', '=', 'Active')
            ->where('users.id','=', $request->key)
            ->take(6)
            ->get();

        foreach($cars as $car){
            if(str_contains($car->city, 'CITY')){
                $new = str_replace("CITY OF", '', $car->city) ;
                $new =str_replace(" (Capital)", '', $new) ;
                $car->city = $new . " CITY";
            }
            if(str_contains($car->city, 'MALAYBALAY')){
                $car->city = ltrim($car->city, $car->city[0]);
            }
        }

        foreach($cars as $car){
            $carID = $car->car_id;
            $image = CarImage::where('car_id', '=', $carID)->orderBy('car_id', 'ASC')->first();
            $car->car_image = $image->file_path;
        }

        return view('Seller/seller-pofile')
            ->with(['cars'=>$cars])
            ->with(['seller'=>$seller]);
    }

    public function viewSellers(){
        $sellers = User::whereRoleIs('seller')->get();

        foreach($sellers as $seller){
            $sellerCars = Car::where('seller_id','=', $seller->id)->count();
            $seller->num_car = $sellerCars;
        }
        $brands = CarMaker::take(7)->get();

        return view('sellers')
            ->with(['brands'=>$brands])
            ->with(['sellers'=>$sellers]);
    }
}
