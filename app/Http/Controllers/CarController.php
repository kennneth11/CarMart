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
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class CarController extends Controller
{
    public function viewMyCar()
    {
        $myCars = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->where('seller_id', '=', Auth::user()->id)
            ->orderBy('car_id', 'ASC')
            ->get();

        foreach($myCars as $myCar){
            $carID = $myCar->car_id;
            $image = CarImage::where('car_id', '=', $carID)->orderBy('car_id', 'ASC')->first();
            $myCar->car_image = $image->file_path;
        }

        $MyCarsCount = $myCars->count();

        return view('Seller/car/my-cars')
            ->with(['NumOfCars'=>$MyCarsCount])
            ->with(['myCars'=>$myCars]);
    }

    public function destroy(Request $request)
    {
        Car::where('car_id', '=', $request->key)->delete();
        CarImage::where('car_id', '=', $request->key)->delete();
        $images = CarImage::where('car_id', '=', $request->key)->get();


        foreach($images as $image){


            if(File::exists(public_path('CarsImages/'.$image->file_path))){
                File::delete(public_path('CarsImages/'.$image->file_path));
            }else{
                dd('File does not exists.');
            }
        }

        Alert::success('Successfully Deleted The Car','Welcome to CART MART BUKIDNON');
        return redirect()->route('My-Cars');

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
        $images = $request->file('image');

        $insertedId = $car->id;

        $num = 1;
        if($request->hasFile('image'))
        {
            foreach($images as $image)
            {
                $car_images = new CarImage();

                $file = $image;
                $extension = $file->getClientOriginalExtension();
                $filename = $insertedId. '-Car'.time() . $num++ . '.' . $extension;
                $file->move('CarsImages/', $filename);

                $car_images->car_id = $insertedId;
                $car_images->file_path = $filename;

                $car_images->save();
            }
        }

        Alert::success('Successfully Posted a Car','Welcome to CART MART BUKIDNON');
        return redirect()->route('Post-Car');
    }

    

    public function viewCar(Request $request)
    {
        $myCar = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->join('users', 'users.id', '=', 'cars.seller_id')
            ->where('car_id', '=', $request->key)
            ->first();

        $bannerImage = CarImage::where('car_id', '=', $request->key)->orderBy('car_id', 'ASC')->first();
        $images = CarImage::where('car_id', '=', $request->key)->orderBy('car_id', 'ASC')->get();

        $cars = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->join('users','users.id', '=', 'cars.seller_id')
            ->where('status', '=', 'Active')
            ->where('car_models.car_model_id','=', $myCar->car_model_id)
            ->orWhere('car_makers.car_maker_id','=', $myCar->car_maker_id)
            ->orWhere('users.id','=', $myCar->seller_id)
            ->take(4)
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

        $brands = CarMaker::take(7)->get();

        return view('car')
            ->with(['imageBanner'=>$bannerImage])
            ->with(['brands'=>$brands])
            ->with(['cars'=>$cars])
            ->with(['images'=>$images])
            ->with(['myCar'=>$myCar]);
    }

    public function deactiveCar(Request $request)
    {
        Car::where("car_id",  $request->key)->update(
            ["status" => "Deactive"]);

        Alert::success('Successfully','The Car is Deactivated');
        return redirect()->route('My-Cars');
    }


    public function activeCar(Request $request)
    {
        Car::where("car_id",  $request->key)->update(
            ["status" => "Active"]);

        Alert::success('Successfully','The Car is Activated');
        return redirect()->route('My-Cars');
    }

    public function updateCar(Request $request){

        $carMakerData = CarMaker::get();
        $carModelData = CarModel::get();
        $carBodyTypeData = CarBodyType::get();
        $carFuelTypeData = CarFuelType::get();
        $carTransmissionData = CarTransmission::get();


        $car = Car::where('car_id', '=', $request->key)
        ->first();


        return view('seller/car/update-car')
            ->with(['car'=>$car])
            ->with(['carModels'=>$carModelData])
            ->with(['carBodyTypes'=>$carBodyTypeData])
            ->with(['carFuelTypes'=>$carFuelTypeData])
            ->with(['carTransmissions'=>$carTransmissionData])
            ->with(['carMakers'=>$carMakerData]);

    }

   

}
