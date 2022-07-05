@extends('layouts.profile-sidebar')

@section('contentNav')
        <div class="profile_wrap">
            <h5 class="uppercase underline">Post a New Vehicle</h5>
            <form method="POST" action="{{ route('Stor-Car') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label">Select Maker</label>
                    <div class="select">
                        <select name="car_maker_id" onchange="getMaker(this)" class="form-control white_bg" required>
                            <option >Select Brand</option>
                            @foreach($carMakers as $carMaker)
                                <option value="{{$carMaker->car_maker_id}}">{{ ucfirst($carMaker->car_maker_name)}}</option>
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
                                <option style="display:none" class="model-options {{$carModel->car_maker_id}}" value="{{$carModel->car_model_id}}">{{ ucfirst($carModel->car_model_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="control-label">Vehicle Overview  Description</label>
                    <textarea name="description" class="form-control white_bg" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">Price (₱)</label>
                    <input name="price" class="form-control white_bg" id="price" type="number" required>
                </div>




                <div class="form-group">
                    <label class="control-label">Upload Images  ( size = 900 x 560 )</label>
                    <div id="preview" class="vehicle_images">
                        <div><img src="assets/images/900x560.jpg" alt="image"></div>
                        <div><img src="assets/images/900x560.jpg" alt="image"></div>
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
                    <input name="millage" class="form-control white_bg" id="mileage" type="number" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Model Year</label>
                    <div class="select">
                        <select name="year_manufactured" class="form-control white_bg" required>
                            <option>Select Model Year</option>
                            @foreach(range(date("Y"), 1940, -1) as $year_number)
                                <option  value="{{$year_number}}">{{ $year_number }}</option>
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
                                <option  value="{{$carFuelType->fuel_type_id}}">{{ ucfirst($carFuelType->fuel_type_name) }}</option>
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
                                <option  value="{{$carTransmission->transmission_id}}">{{ ucfirst($carTransmission->transmission_name) }}</option>
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
                                <option  value="{{$carBodyType->body_type_id}}">{{ ucfirst($carBodyType->body_type_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
              
       
                <div class="gray-bg field-title">
                    <h6>Accessories</h6>
                </div>
                <div class="vehicle_accessories">

                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="air_condition" id="air_conditioner" type="checkbox">
                    <label  for="air_conditioner">Air Condition</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="power_steering" id="steering" type="checkbox">
                    <label   for="steering">Power Steering</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="driver_airbag" id="airbag" type="checkbox">
                    <label   for="airbag">Driver Airbag</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input  name="power_window" id="windows" type="checkbox">
                    <label   for="windows">Power Windows</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="passenger_airbag" id="passenger_airbag" type="checkbox">
                    <label   for="passenger_airbag">Passenger Airbag</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="cd_player"  id="player" type="checkbox">
                    <label for="player">CD Player</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input name="leather_seats" id="seats" type="checkbox">
                    <label   for="seats">Leather Seats</label>
                </div>
                <div class="form-group checkbox col-md-6 accessories_list">
                    <input  name="central_locking" id="locking" type="checkbox">
                    <label  for="locking">Central Locking</label>
                </div>
                
                </div>
                <div class="vehicle_type">
                <div class="form-group radio col-md-6 accessories_list">
                    <input type="radio" name="New_car" value="NewCar" id="newcar" required>
                    <label  for="newcar">New Car</label>
                </div>
                <div class="form-group radio col-md-6 accessories_list">
                    <input type="radio" name="New_car" value="UsedCar" id="usedcar">
                    <label for="usedcar">Used Car</label>
                </div>
                </div>
                <div class="form-group">
                <button type="submit" class="btn">Submit Vehicle <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                </div>
            </form>
        </div>
@endsection