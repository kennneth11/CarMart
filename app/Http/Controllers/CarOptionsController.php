<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarMaker;
use App\Models\CarModel;
use App\Models\CarBodyType;
use App\Models\CarTransmission;
use App\Models\CarFuelType;
use Illuminate\Support\Facades\Storage;



class CarOptionsController extends Controller
{
    public function carOptions()
    {
        $carMakerData = CarMaker::paginate(5, ['*'], 'carMakers');
        $carModelData = CarModel::join('car_makers', 'car_makers.car_maker_id', '=', 'car_models.car_maker_id')
            ->paginate(5, ['*'], 'carModels');
        $carBodyTypeData = CarBodyType::paginate(5, ['*'], 'carBodyTypes');
        $carFuelTypeData = CarFuelType::paginate(5, ['*'], 'carBodyTypes');
        $carTransmissionData = CarTransmission::paginate(5, ['*'], 'carBodyTypes');

        $carMakerData1 = CarMaker::all();
        return view('Administrator/car-options/car-options')
            ->with(['carModels'=>$carModelData])
            ->with(['carMakers1'=>$carMakerData1])
            ->with(['carBodyTypes'=>$carBodyTypeData])
            ->with(['carFuelTypes'=>$carFuelTypeData])
            ->with(['carTransmissions'=>$carTransmissionData])
            ->with(['carMakers'=>$carMakerData]);
    }


    public function store(Request $request)
    {

        // store car maker/brand
        if($request->has('form1'))
        {
            $request->validate([
                'car_maker_name' => ['required', 'string', 'max:255', 'unique:car_makers'],
                'car_maker_picture1' => ['required'],
            ]);

            $CarMaker = new CarMaker();
            $CarMaker->car_maker_name = $request->car_maker_name;

            $idPictureName = $request->car_maker_name.'-picture.png';
            $filePicture = $request->car_maker_picture1;
            $filePicture->move('Images/brands/', $idPictureName);

            $CarMaker->file_path_picture = 'Images/brands/'.$idPictureName;
            $CarMaker->save();

            return redirect()->route('CarOptions')
                            ->with('success','Car Maker created successfully.');
        }

        // store car model
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

        // store car body type
        if ($request->has('form3'))
        {
            $request->validate([
                'body_type_name' => ['required', 'string', 'max:255'],
            ]);

            CarBodyType::create($request->all());

            return redirect()->route('CarOptions')
                            ->with('success','Body Type created successfully.');
        }

        // store car transmission
        if ($request->has('form4'))
        {
            $request->validate([
                'transmission_name' => ['required', 'string', 'max:255'],
            ]);

            CarTransmission::create($request->all());

            return redirect()->route('CarOptions')
                            ->with('success','Transmission created successfully.');
        }

        // store car Fuel Type
        if ($request->has('form5'))
        {
            $request->validate([
                'fuel_type_name' => ['required', 'string', 'max:255'],
            ]);

            CarFuelType::create($request->all());

            return redirect()->route('CarOptions')
                            ->with('success','Fuel Type created successfully.');
        }



    }


}
