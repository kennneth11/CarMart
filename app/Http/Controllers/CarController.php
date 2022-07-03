<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMaker;
use App\Models\CarModel;
use App\Models\CarBodyType;
use App\Models\CarTransmission;
use App\Models\CarFuelType;
use App\Models\Car;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function viewMyCar()
    {
        

        return view('Seller/car/my-cars');
    }

    public function viewPostCar()
    {
        $carMakerData = CarMaker::get();
        $carModelData = CarModel::get();
        $carBodyTypeData = CarBodyType::get();
        $carFuelTypeData = CarFuelType::get();
        $carTransmissionData = CarTransmission::get();
        
        return view('Seller/car/post-car')
            ->with(['carModels'=>$carModelData])
            ->with(['carBodyTypes'=>$carBodyTypeData])
            ->with(['carFuelTypes'=>$carFuelTypeData])
            ->with(['carTransmissions'=>$carTransmissionData])
            ->with(['carMakers'=>$carMakerData]);
    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->car_maker_id = $request->car_maker_id;
        $car->car_model_id = $request->car_model_id;
        $car->body_type_id = $request->body_type_id;
        $car->transmission_id = $request->transmission_id;
        $car->fuel_type_id = $request->fuel_type_id;

        $car->seller_id = Auth::user()->id;

        $car->price = $request->price;
        $car->millage = $request->millage;
        $car->description = $request->description;
        $car->year_manufactured = $request->year_manufactured;
        $car->status = "Active";

        if( $request->has('air_condition') ){
            $car->air_condition = true;
        }else $car->air_condition = false;
        if( $request->has('power_steering') ){
            $car->power_steering = true;
        }else $car->power_steering = false;
        if( $request->has('power_window') ){
            $car->power_window = true;
        }else $car->power_window = false;
        if( $request->has('cd_player') ){
            $car->cd_player = true;
        }else $car->cd_player = false;
        if( $request->has('leather_seats') ){
            $car->leather_seats = true;
        }else $car->leather_seats = false;
        if( $request->has('central_locking') ){
            $car->central_locking = true;
        }else $car->central_locking = false;
        if( $request->has('driver_airbag') ){
            $car->driver_airbag = true;
        }else $car->driver_airbag = false;
        if( $request->has('passenger_airbag') ){
            $car->passenger_airbag = true;
        }else $car->passenger_airbag = false;

        if( $request->New_car == "NewCar"){
            $car->New_car = "true";
        }$car->New_car = 0;

        $car->save();

        return redirect()->route('dashboard');
    }


}
