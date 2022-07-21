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
use TeamTeaTime\Forum\Models\Thread;
use TeamTeaTime\Forum\Models\Category;
use TeamTeaTime\Forum\Models\Post;
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

        $recentCars = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
         ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
         ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
         ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
         ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
         ->join('users','users.id', '=', 'cars.seller_id')
         ->where('status', '=', 'Active')
         ->orderBy('cars.created_at', 'ASC')
         ->take(5)
         ->get();

         foreach($recentCars as $recentCar){
            $carID = $recentCar->car_id;
                $image = CarImage::where('car_id', '=', $carID)->orderBy('car_id', 'ASC')->first();
                $recentCar->car_image = $image->file_path;
            }

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


        $posts = Post::get();
        $categories = Category::get();

        $threads = Thread::join('users', 'users.id', '=', 'forum_threads.author_id')
            ->select('forum_threads.id',
                'forum_threads.category_id',
                'forum_threads.author_id',
                'forum_threads.title',
                'forum_threads.created_at',
                'forum_threads.first_post_id',
                'forum_threads.updated_at',
                'users.first_name',
                'users.last_name',
                'users.username',
                'users.avatar')
            ->take(3)
            ->get();

        foreach($threads as $thread){
            foreach($categories as $category){
                if($thread->category_id == $category->id){
                    $thread->category_name = $category->title;
                }
            }
            foreach($posts as $post){
                if($thread->first_post_id == $post->id){
                    $thread->content = $post->content;
                }
            }
            $thread->content = mb_strimwidth($thread->content, 0, 200, "...");
        }

        return view('index')
            ->with(['recentCars'=>$recentCars])
            ->with(['threads'=>$threads])
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
        $city = $request->cities;
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
            ->where('car_model_name', 'LIKE', "%{$r}%")
            ->orWhere('car_maker_name','LIKE', "%{$r}%" )->get();
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
            ->where('car_maker_name', 'LIKE', "%{$brand}%")
            ->orWhere('car_model_name', 'LIKE', "%{$model}%")
            ->orWhere('city', 'LIKE', "%{$city}%")
            ->orWhere('fuel_type_name', 'LIKE', "%{$fuel}%")
            ->orWhere('transmission_name', 'LIKE', "%{$transmission}%")
            ->orWhere('year_manufactured', 'LIKE', "%{$year}%")
            ->orWhere('New_car', 'LIKE', "%{$type}%")->get();
            // dd($cars);

            $result = $brand . $model . $city . $fuel . $transmission. $year. $type;
        }


        foreach($cars as $car){
        $carID = $car->car_id;
             $image = CarImage::where('car_id', '=', $carID)->orderBy('car_id', 'ASC')->first();
             $car->car_image = $image->file_path;
         }

        return view('searchedCars')
            ->with(['cars'=>$cars])
            ->with(['search'=>$r])
            // ->with(['result'=>$result])
            ->with(['carModels'=>$carModelData])
            ->with(['carBodyTypes'=>$carBodyTypeData])
            ->with(['carFuelTypes'=>$carFuelTypeData])
            ->with(['carTransmissions'=>$carTransmissionData])
            ->with(['carMakers'=>$carMakerData]);
    }
}
