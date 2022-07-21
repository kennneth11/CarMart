<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\CarMaker;
use App\Models\CarModel;
use App\Models\CarBodyType;
use App\Models\CarTransmission;
use App\Models\CarFuelType;
use App\Models\Car;
use App\Models\CarImage;
use Carbon\Carbon;


class DashboardController extends Controller
{
    // FA2837 
    // FFECED

    public function index()
    {
        if(Auth::user()->hasRole('superadministrator')){
            $userdata = User::all();
            $countCar = Car::count();
            $countSeller = User::whereRoleIs('seller')->count();
            $countCustomer = User::whereRoleIs('customer')->count();

            $monthCar = array();
            for ($i=0; $i < 5; $i++) {
                $carCount = Car::WhereMonth('created_at', date('m', strtotime(date('Y-m-d'). "-". $i ." month")))
                    ->whereYear('created_at', date('Y', strtotime(date('Y-m-d'). "-". $i ." month")))
                    ->count();
                $monthCar[$i] = array(date('F', strtotime(date('Y-m-d'). "-". $i ." month")), $carCount);
            }

            $monthUser = array();
            for ($i=0; $i < 5; $i++) {

                $userCount = User::whereMonth('created_at', date('m', strtotime(date('Y-m-d'). "-". $i ." month")))
                    ->whereYear('created_at', date('Y', strtotime(date('Y-m-d'). "-". $i ." month")))
                    ->count();

                $monthUser[$i] = array(date('F', strtotime(date('Y-m-d'). "-". $i ." month")), $userCount);
            }

            $userPie = array(
                array("Seller",$countSeller),
                array("Customer",$countCustomer),
            );
            

        


            return view('Administrator/dashboard')
                ->with(['countSeller'=>$countSeller])
                ->with(['userPie'=>$userPie])
                ->with(['monthUser'=>$monthUser])
                ->with(['monthCar'=>$monthCar])
                ->with(['countCustomer'=>$countCustomer])
                ->with(['countCar'=>$countCar]);
        }

        else if(Auth::user()->hasRole('seller')){
            return redirect()->route('index');
        }
        else if(Auth::user()->hasRole('customer')){
            return redirect()->route('index');
        }
    }



    public function adminCar(){
        $cars = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->join('users','users.id', '=', 'cars.seller_id')
            ->select('cars.car_id',
                'cars.price',
                'cars.millage',
                'cars.description',
                'cars.year_manufactured',
                'cars.status',
                'cars.New_car',
                'cars.created_at',
                'car_models.car_model_name',
                'car_body_types.body_type_name',
                'car_transmissions.transmission_name',
                'car_fuel_types.fuel_type_name',
                'car_makers.car_maker_name',
                'users.first_name',
                'users.last_name',
                'users.purok',
                'users.barangay',
                'users.city')
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


        return view('Administrator/admin-cars')
            ->with(['cars'=>$cars]);
    }




    public function adminSearchCar(Request $request){
        $cars = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->join('users','users.id', '=', 'cars.seller_id')
            ->where('car_makers.car_maker_name','like', '%' . $request->word .'%')
            ->orWhere('car_models.car_model_name','like', '%' . $request->word .'%')
            ->select('cars.car_id',
                'cars.price',
                'cars.millage',
                'cars.description',
                'cars.year_manufactured',
                'cars.status',
                'cars.New_car',
                'cars.created_at',
                'car_models.car_model_name',
                'car_body_types.body_type_name',
                'car_transmissions.transmission_name',
                'car_fuel_types.fuel_type_name',
                'car_makers.car_maker_name',
                'users.purok',
                'users.barangay',
                'users.city')
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


        return view('Administrator/admin-cars')
            ->with(['cars'=>$cars]);
    }

    public function adminViewCar(Request $request)
    {
        $car = Car::join('car_makers', 'car_makers.car_maker_id', '=', 'cars.car_maker_id')
            ->join('car_models', 'car_models.car_model_id', '=', 'cars.car_model_id')
            ->join('car_body_types', 'car_body_types.body_type_id', '=', 'cars.body_type_id')
            ->join('car_transmissions', 'car_transmissions.transmission_id', '=', 'cars.transmission_id')
            ->join('car_fuel_types', 'car_fuel_types.fuel_type_id', '=', 'cars.fuel_type_id')
            ->where('car_id', '=', $request->key)
            ->select('cars.car_id',
                'cars.price',
                'cars.millage',
                'cars.seller_id',
                'cars.description',
                'cars.year_manufactured',
                'cars.status',
                'cars.New_car',
                'cars.created_at',
                'cars.year_manufactured',
                'car_models.car_model_name',
                'car_body_types.body_type_name',
                'car_transmissions.transmission_name',
                'car_fuel_types.fuel_type_name',
                'car_makers.car_maker_name')
            ->first();

        $user = User::where('id', '=', $car->seller_id)->first();
        
        
   
      

            $carID = $car->car_id;
            $image = CarImage::where('car_id', '=', $carID)->orderBy('car_id', 'ASC')->first();
            $car->car_image = $image->file_path;


        return view('Administrator/admin-view-car')
            ->with(['user'=>$user])
            ->with(['car'=>$car]);
    }

    public function adminUsers()
    {
        $users = User::get();

        return view('Administrator/admin-users')
            ->with(['users'=>$users]);
    }


    public function adminSearchUser(Request $request)
    {
        $users = User::where('first_name','like', '%' . $request->word .'%')
            ->orWhere('last_name','like', '%' . $request->word .'%')
            ->get();

        return view('Administrator/admin-users')
            ->with(['users'=>$users]);
    }


    public function adminViewhUser(Request $request)
    {
        $user = User::where('id', '=', $request->key)->first();

        return view('Administrator/admin-view-user')
            ->with(['user'=>$user]);
    }


    
}
