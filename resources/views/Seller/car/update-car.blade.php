@extends('layouts.profile-sidebar')

@section('contentNav')
        <div class="profile_wrap">
            <h5 class="uppercase underline">Update Vehicle</h5>
            <form method="POST" action="{{ route('Updating-Car') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label">Select Maker</label>
                    <div class="select">
                        <select name="car_maker_id" onchange="getMaker(this)" class="form-control white_bg" required>
                            <option>Select Model</option>
                            @foreach($carMakers as $carMaker)
                                <option value="{{$carMaker->car_maker_id}}" @if($car->car_maker_id == $carMaker->car_maker_id) selected @endif >{{ ucfirst($carMaker->car_maker_name)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Model</label>
                    <div class="select">
                        <select name="car_model_id"  class="form-control white_bg" required>
                            <option>Select Model</option>
                            @foreach($carModels as $carModel)
                                <option style="display:none" class="model-options {{$carModel->car_maker_id}}" value="{{$carModel->car_model_id}}" @if($car->car_model_id == $carModel->car_model_id) selected @endif>{{ ucfirst($carModel->car_model_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Vehicle Overview  Description</label>
                    <textarea name="description" class="form-control white_bg" rows="4">{{$car->description}}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Price (₱)</label>
                    <input name="price" class="form-control white_bg" id="price" value="{{$car->price}}" type="number" required>
                </div>




                <div class="form-group">
                    <label class="control-label">Upload Images  </label>
                    <div id="preview" class="vehicle_images">
                        <div class="upload_more_img">
                            <input id="file-input" name="image[]" multiple="multiple" type="file" required>
                        </div>
                    </div>
                </div>




                <div class="gray-bg field-title">
                    <h6>Basic Info</h6>
                </div>

                <div class="form-group">
                    <label class="control-label">Mileage</label>
                    <input name="millage" class="form-control white_bg" id="mileage" value="{{$car->millage}}" type="number" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Model Year</label>
                    <div class="select">
                        <select name="year_manufactured" class="form-control white_bg" required>
                            <option>Select Model Year</option>
                            @foreach(range(date("Y"), 1940, -1) as $year_number)
                                <option  value="{{$year_number}}" @if($car->year_manufactured == $year_number) selected @endif>{{ $year_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Fuel Type</label>
                    <div class="select">
                        <select name="fuel_type_id" class="form-control white_bg" required>
                            <option>Select Fuel Type</option>
                            @foreach($carFuelTypes as $carFuelType)
                                <option  value="{{$carFuelType->fuel_type_id}}" @if($car->fuel_type_id == $carFuelType->fuel_type_id) selected @endif>{{ ucfirst($carFuelType->fuel_type_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Transmission</label>
                    <div class="select">
                        <select name="transmission_id" class="form-control white_bg" required>
                            <option>Select Transmission</option>
                            @foreach($carTransmissions as $carTransmission)
                                <option  value="{{$carTransmission->transmission_id}}" @if($car->transmission_id == $carTransmission->transmission_id) selected @endif>{{ ucfirst($carTransmission->transmission_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Body Type</label>
                    <div class="select">
                        <select name="body_type_id" class="form-control white_bg" required>
                            <option>Select Body Type</option>
                            @foreach($carBodyTypes as $carBodyType)
                                <option  value="{{$carBodyType->body_type_id}}" @if($car->body_type_id == $carBodyType->body_type_id) selected @endif>{{ ucfirst($carBodyType->body_type_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="gray-bg field-title">
                    <h6>Accessories</h6>
                </div>
                <div class="vehicle_accessories">

                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="air_condition" id="air_conditioner" type="checkbox" @if($car->air_condition) checked @endif>
                    <label  for="air_conditioner">Air Condition</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="power_steering" id="steering" type="checkbox" @if($car->power_steering) checked @endif>
                    <label   for="steering">Power Steering</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="driver_airbag" id="airbag" type="checkbox" @if($car->driver_airbag) checked @endif>
                    <label   for="airbag">Driver Airbag</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input  name="power_window" id="windows" type="checkbox" @if($car->power_window) checked @endif>
                    <label   for="windows">Power Windows</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="passenger_airbag" id="passenger_airbag" type="checkbox" @if($car->passenger_airbag) checked @endif>
                    <label   for="passenger_airbag">Passenger Airbag</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="cd_player"  id="player" type="checkbox" @if($car->cd_player) checked @endif>
                    <label for="player">CD Player</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="leather_seats" id="seats" type="checkbox" @if($car->leather_seats) checked @endif>
                    <label   for="seats">Leather Seats</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input  name="central_locking" id="locking" type="checkbox" @if($car->central_locking) checked @endif>
                    <label  for="locking">Central Locking</label>
                </div>

                </div>
                <div class="vehicle_type">
                <div class="form-group radio col-md-6 accessories_list">
                    <input type="radio" name="New_car" value="NewCar" id="newcar" required @if($car->New_car) checked @endif>
                    <label  for="newcar">New Car</label>
                </div>
                <div class="form-group radio col-md-6 accessories_list">
                    <input type="radio" name="New_car" value="UsedCar" id="usedcar" @if(!$car->New_car) checked @endif>
                    <label for="usedcar">Used Car</label>
                </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn">Submit Vehicle <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
            </form>
        </div>
@endsection
