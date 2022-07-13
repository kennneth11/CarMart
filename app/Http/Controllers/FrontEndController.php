<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMaker;
use App\Models\CarModel;
use App\Models\CarBodyType;
use App\Models\CarTransmission;
use App\Models\CarFuelType;
use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FrontEndController extends Controller
{
    //Welcome Page
    public function index()
    {
        $carMakerData = CarMaker::get();
        $carModelData = CarModel::get();
        $carBodyTypeData = CarBodyType::get();
        $carFuelTypeData = CarFuelType::get();
        $carTransmissionData = CarTransmission::get();

         $cars = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
         ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
         ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
         ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
         ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
         ->join('users','users.id', '=', 'cars.seller_id')
         ->where('status', '=', 'Active')
         ->orderBy('car_id', 'ASC')
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

        return view('index')
            ->with(['cars'=>$cars])
            ->with(['carModels'=>$carModelData])
            ->with(['carBodyTypes'=>$carBodyTypeData])
            ->with(['carFuelTypes'=>$carFuelTypeData])
            ->with(['carTransmissions'=>$carTransmissionData])
            ->with(['carMakers'=>$carMakerData]);
    }

    public function about()
    {
        return view('about');
    }

    public function searchCar(Request $request){
        $carMakerData = CarMaker::get();
        $carModelData = CarModel::get();
        $carBodyTypeData = CarBodyType::get();
        $carFuelTypeData = CarFuelType::get();
        $carTransmissionData = CarTransmission::get();

        $r = $request->input('carSearch');
        $cars = Car::where('status', '=', 'Active')
        ->join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
        ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
        ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
        ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
        ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
        ->join('cars', 'car_id', '=', 'cars.car_id')
        ->join('users','users.id', '=', 'cars.seller_id')
        ->select('car_body_types.body_type_name', 'car_fuel_types.fuel_type_name',
        'car_makers.car_maker_name', 'car_models.car_model_name', 'car_transmissions.transmission_name',
        'cars.year_manufactured', 'users.city', 'cars.New_car')
        ->where('city', 'LIKE', "%.$r.%")
        ->orWhere('body_type_name', 'LIKE', "%.$r.%")
        ->orWhere('fuel_type_name', 'LIKE', "%.$r.%")
        ->orWhere('transmission_name', 'LIKE', "%.$r.%")
        ->orWhere('year_manufactured', 'LIKE', "%.$r.%")
        ->orWhere('car_maker_name', 'LIKE', "%.$r.%")
        ->orWhere('car_model_name', 'LIKE', "%.$r.%")
        ->orWhere('New_car', 'LIKE', "%.$r.%")
        ->orWhere('city', 'LIKE', "%.$r.%");

         foreach($cars as $car){
         $carID = $car->car_id;
             $image = CarImage::where('car_id', '=', $carID)->orderBy('car_id', 'ASC')->first();
             $car->car_image = $image->file_path;
         }

        return view('searchedCars')
            ->with(['cars'=>$cars])
            ->with(['carModels'=>$carModelData])
            ->with(['carBodyTypes'=>$carBodyTypeData])
            ->with(['carFuelTypes'=>$carFuelTypeData])
            ->with(['carTransmissions'=>$carTransmissionData])
            ->with(['carMakers'=>$carMakerData]);
    }

}
