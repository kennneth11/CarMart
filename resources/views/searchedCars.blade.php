@extends('layouts.main')


@section('content')
<!--Listing-grid-view-->
<section class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
        <div class="mobile_search">
              <div class="sidebar_widget">
                <div class="widget_heading">
                  <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Dream Car </h5>
                </div>
                <div class="sidebar_filter">
                  <form action="#" method="get">
                    <div class="form-group select">
                      <select class="form-control">
                        <option>Select Location</option>
                        <option>Location 1</option>
                        <option>Location 2</option>
                        <option>Location 3</option>
                        <option>Location 4</option>
                      </select>
                    </div>
                    <div class="form-group select">
                      <select class="form-control">
                        <option>Select Brand</option>
                        <option>Brand 1</option>
                        <option>Brand 2</option>
                        <option>Brand 3</option>
                        <option>Brand 4</option>
                      </select>
                    </div>
                    <div class="form-group select">
                      <select class="form-control">
                        <option>Select Model</option>
                        <option>Series 1</option>
                        <option>Series 2</option>
                        <option>Series 3</option>
                        <option>Series 4</option>
                      </select>
                    </div>
                    <div class="form-group select">
                      <select class="form-control">
                        <option>Year of Model </option>
                        <option>2016</option>
                        <option>2015</option>
                        <option>2014</option>
                        <option>2013</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Price Range (₱) </label>
                      <input id="price_range1" type="text" class="span2" value="" data-slider-min="50" data-slider-max="6000" data-slider-step="5" data-slider-value="[1000,5000]"/>
                    </div>
                    <div class="form-group select">
                      <select class="form-control">
                        <option>Type of Car </option>
                        <option>New Car</option>
                        <option>Used Car</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
                    </div>
                  </form>
                </div>
              </div>
          </div>

        @if(count($cars) < 0)
          <h5>No results found for "{{$search}}"</h1>
        @else
            @if ($search)
            <h5>Listings related to "{{$search}}"</h1>
                @else
                {{-- <h5>Listings related to "{{$result}}"</h1> --}}
            @endif
          <div class="row">

            <!--Start Card-->

            @foreach($cars as $car)
            <div class="col-md-4 grid_listing">
              <div class="product-listing-m gray-bg">

                {{-- embed-responsive --}}
                <div class="product-listing-img embed-responsive embed-responsive-4by3 "> <a href="{{ route('Car',$car->car_id) }}"><img src="{{ asset('CarsImages/'.$car->car_image) }}" class="img-responsive" alt="image" /> </a>
                @if($car->New_car)
                    <div class="label_icon">New</div>
                @else
                    <div class="label_icon">Used</div>
                @endif
                <div class="compare_item">

                  </div>
                </div>
                <div class="product-listing-content">
                  <h5><a href="{{ route('Car',$car->car_id) }}">{{  ucfirst($car->car_maker_name) .' '.ucfirst($car->car_model_name)}}</a></h5>
                  <p class="list-price"><strong>₱</strong>{{$car->price}}</p></br>
                  <div style="float:none;margin:0;" class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i>{{$car->city}}</span></div>
                  <ul class="features_list">
                    <li><i class="fa fa-road" aria-hidden="true"></i>35,000 km</li>
                    <li><i class="fa fa-tachometer" aria-hidden="true"></i>{{$car->millage}}</li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$car->year_manufactured}} model</li>
                    <li><i class="fa fa-car" aria-hidden="true"></i>{{$car->fuel_type_name}}</li>
                  </ul>
                </div>
              </div>
            </div>
            @endforeach
            <!--End Card-->
        @endif
          </div>
          {{-- <div class="pagination">
            <ul>
              <li class="current">1</li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
          </div> --}}
        </div>

        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget sidebar_search_wrap">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Dream Car </h5>
            </div>
            <div class="sidebar_filter">
              <form action="#" method="get">
                <div class="form-group select">
                  <select class="form-control" name="city" id="city">
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
                    <option value="NewCar">Brand New Car</option>
                    <option value="UsedCar">Used Car</option>
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car</button>
                </div>
              </form>
            </div>
          </div>


      </div>
    </div>
  </section>
  <!--/Listing-grid-view-->



<!-- /Blog-->
@endsection
