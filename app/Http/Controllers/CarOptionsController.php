<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMaker;
use App\Models\CarModel;



class CarOptionsController extends Controller
{
    public function index()
    {
        $carMakerData = CarMaker::paginate(5, ['*'], 'carMakers');
        $carModelData = CarModel::join('car_makers', 'car_makers.car_maker_id', '=', 'car_models.car_maker_id')
            ->paginate(5, ['*'], 'carModels');

        $carMakerData1 = CarMaker::all();
        return view('Administrator/car-options/car-options')
            ->with(['carModels'=>$carModelData])
            ->with(['carMakers1'=>$carMakerData1])
            ->with(['carMakers'=>$carMakerData]);
    }


    public function store(Request $request)
    {
        if($request->has('form1'))
        {
            $request->validate([
                'car_maker_name' => ['required', 'string', 'max:255', 'unique:car_makers'],
            ]);
      
            CarMaker::create($request->all());
       
            return redirect()->route('CarOptions')
                            ->with('success','Car Maker created successfully.');
        }
        if ($request->has('form2'))
        {
            $request->validate([
                'car_maker_id' =>  ['required'],
                'car_model_name' => ['required', 'string', 'max:255'],
            ]);
      
            CarModel::create($request->all());
       
            return redirect()->route('CarOptions')
                            ->with('success','Car Model created successfully.');
        }
        
    }

   
}
