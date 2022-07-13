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
        //  dd($cars);

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

        $r = $request->search;
        $city = $request->city;
        $brand = $request->brand;
        $transmission = $request->transmission;
        $fuel = $request->fuel;
        $model = $request->model;
        $year = $request->year_model;
        $type = $request->New_car;

        if($r){
            $cars = Car::where('status', '=', 'Active')
            ->join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->join('users','users.id', '=', 'cars.seller_id')
            // ->select('car_makers.car_maker_name', 'car_models.car_model_name', 'car_transmissions.transmission_name',
            // 'car_fuel_types.fuel_type_name',)
            ->orWhere('car_makers.car_maker_name', 'LIKE', "%{$r}%")
            ->orWhere('car_models.car_model_name', 'LIKE', "%{$r}%")->get();
            // dd($cars);
        }
        else{

            $cars = Car::where('status', '=', 'Active')
            ->join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->join('users','users.id', '=', 'cars.seller_id')
            // ->select('car_makers.car_maker_name', 'car_models.car_model_name', 'car_transmissions.transmission_name',
            // 'car_fuel_types.fuel_type_name',)
            ->orWhere('car_makers.car_maker_name', 'LIKE', "%{$brand}%")
            ->orWhere('car_models.car_model_name', 'LIKE', "%{$model}%")
            ->orWhere('users.city', 'LIKE', "%{$city}%")
            ->orWhere('car_fuel_types.fuel_type_name', 'LIKE', "%{$fuel}%")
            ->orWhere('car_transmissions.transmission_name', 'LIKE', "%{$transmission}%")
            ->orWhere('cars.year_manufactured', 'LIKE', "%{$year}%")
            ->orWhere('cars.New_car', 'LIKE', "%{$type}%");
            dd($cars);
        }


        foreach($cars as $car){
        $carID = $car->car_id;
             $image = CarImage::where('car_id', '=', $carID)->orderBy('car_id', 'ASC')->first();
             $car->car_image = $image->file_path;
         }

        return view('searchedCars')
            ->with(['cars'=>$cars])
            ->with(['search'=>$r])
            ->with(['carModels'=>$carModelData])
            ->with(['carBodyTypes'=>$carBodyTypeData])
            ->with(['carFuelTypes'=>$carFuelTypeData])
            ->with(['carTransmissions'=>$carTransmissionData])
            ->with(['carMakers'=>$carMakerData]);
    }



}
