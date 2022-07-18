<!--Side-Bar-->

    <div class="sidebar_widget sidebar_search_wrap">
      <div class="widget_heading">
        <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Dream Car </h5>
      </div>
      <div class="sidebar_filter">
        <form action="{{route('searchCar')}}" method="get">
          <div class="form-group select">
            <input type="hidden"  name="cities"/>
            <select class="form-control" id="municipality">
              <option>Select Location</option>
            </select>
          </div>
          <div class="form-group select">
            <select class="form-control" name="brand">
              <option>Select Brand</option>
                  @foreach($carMakers as $carMaker)
                      <option value="{{$carMaker->car_maker_id}}">{{ ucfirst($carMaker->car_maker_name)}}</option>
                  @endforeach
            </select>
          </div>
          <div class="form-group select">
              <select class="form-control" onchange="getMaker(this)" name="transmission">
                <option>Select Transmission Type</option>
                  @foreach($carTransmissions as $carTransmission)
                      <option  value="{{$carTransmission->transmission_id}}">{{ ucfirst($carTransmission->transmission_name) }}</option>
                  @endforeach
              </select>
            </div>
          <div class="form-group select">
              <select class="form-control" onchange="getMaker(this)" name="fuel">
                <option>Select Fuel Type</option>
                  @foreach($carFuelTypes as $carFuelType)
                      <option  value="{{$carFuelType->fuel_type_id}}">{{ ucfirst($carFuelType->fuel_type_name) }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group select">
            <select class="form-control" onchange="getMaker(this)" name="model">
              <option>Select Model</option>
                  @foreach($carModels as $carModel)
                      <option class="model-options {{$carModel->car_maker_id}}" value="{{$carModel->car_model_id}}">{{ ucfirst($carModel->car_model_name) }}</option>
                  @endforeach
            </select>
          </div>
          <div class="form-group select">
            <select class="form-control" name="year_model">
              <option>Year of Model </option>
              @foreach(range(date("Y"), 1940, -1) as $year_number)
                          <option  value="{{$year_number}}">{{ $year_number }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group select">
            <select class="form-control"  name="New_car">
              <option>Type of Car </option>
              <option value="1">Brand New Car</option>
              <option value="0">Used Car</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
          </div>
        </form>
      </div>
    </div>

