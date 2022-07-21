@extends('layouts.main')


@section('content')
<!-- Listing-detail-header -->
<section id="Banner-page" class="listing_detail_header">
  <div class="container">
    <div class="listing_detail_head white-text div_zindex row">
      <div class="col-md-9">
        <img style="display:none;" id="banner-source" src="{{ asset('CarsImages/'.$imageBanner->file_path) }}">
        <h2>{{ ucfirst($myCar->car_maker_name) . ' ' . ucfirst($myCar->car_model_name) }}</h2>
        <div class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $myCar->city . ', ' . $myCar->barangay . ', ' . $myCar->purok}} </span></div>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>₱ {{ $myCar->price }}</p>
          {{-- <p class="old_price">$95,000</p> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>
<!-- /Listing-detail-header -->



<!-- <section class="listing_other_info secondary-bg">
  <div class="container">
    <div id="filter_toggle" class="search_other"> <i class="fa fa-filter" aria-hidden="true"></i> Search Car </div>
    <div id="other_info"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
    <div id="info_toggle">
      <button type="button" data-toggle="modal" data-target="#schedule"> <i class="fa fa-car" aria-hidden="true"></i> Schedule Test Drive </button>
      <button type="button" data-toggle="modal" data-target="#make_offer"> <i class="fa fa-money" aria-hidden="true"></i> Make an Offer </button>
      <button type="button" data-toggle="modal" data-target="#email_friend"> <i class="fa fa-envelope" aria-hidden="true"></i> Email to a Friend </button>
      <button type="button" data-toggle="modal" data-target="#more_info"> <i class="fa fa-file-text-o" aria-hidden="true"></i> Request More Info </button>
    </div>
  </div>
</section> -->

<!-- Filter-Form -->
<section id="filter_form" class="inner-filter gray-bg">
  <div class="container">
    <h3>Find Your Dream Car <span>(Easy search from here)</span></h3>
    <div class="row">
      <form action="#" method="get">
        <div class="form-group col-md-3 col-sm-6 black_input">
          <div class="select">
            <select class="form-control">
              <option value="">Select Location </option>
              <option value="">Location 1 </option>
              <option value="">Location 1 </option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-3 col-sm-6 black_input">
          <div class="select">
            <select class="form-control">
              <option>Select Brand</option>
              <option>Brand 1</option>
              <option>Brand 2</option>
              <option>Brand 3</option>
              <option>Brand 4</option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-3 col-sm-6 black_input">
          <div class="select">
            <select class="form-control">
              <option>Select Model</option>
              <option>Series 1</option>
              <option>Series 2</option>
              <option>Series 3</option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-3 col-sm-6 black_input">
          <div class="select">
            <select class="form-control">
              <option>Year of Model </option>
              <option>2016</option>
              <option>2015</option>
              <option>2014</option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-6 col-sm-6 black_input">
          <label class="form-label">Price Range ($)</label>
          <input id="price_range" type="text" class="span2" value="" data-slider-min="50" data-slider-max="6000" data-slider-step="5" data-slider-value="[1000,5000]"/>
        </div>
        <div class="form-group col-md-3 col-sm-6 black_input">
          <div class="select">
            <select class="form-control">
              <option>Type of Car </option>
              <option>New Car</option>
              <option>Used Car</option>
            </select>
          </div>
        </div>
        <div class="form-group col-md-3 col-sm-6">
          <button type="submit" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i> Search Car </button>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- /Filter-Form -->

<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="listing_images">
          <div id="listing_images_slider" class="sidebar_widget listing_images_slider">


            <!-- <div><img src="assets/images/900x560.jpg" alt="image"></div> -->

            @foreach($images as $image)
                <div id="my-img1" class="slected-img-custom my-img"><img src="{{ asset('CarsImages/'.$image->file_path) }}" alt="image"></div>
            @endforeach


          </div>
          <div id="listing_images_slider_nav" class="listing_images_slider_nav">


            <!-- <div><img src="assets/images/900x560.jpg" alt="image"></div> -->

            @foreach($images as $image)
                <div class="nav-img-custom img-nav-selector"><img src="{{ asset('CarsImages/'.$image->file_path) }}" alt="image"></div>
            @endforeach



          </div>
        </div>



        <div  class="main_features  ">
          <ul >
            <li> <i class="fa fa-tachometer" aria-hidden="true"></i>
              <h5>{{ $myCar->millage }}</h5>
              <p>Total Millage</p>
            </li>
            <li> <i class="fa fa-calendar" aria-hidden="true"></i>
              <h5>{{ $myCar->year_manufactured }}</h5>
              <p>Manufac.Year</p>
            </li>
            <li> <i class="fa fa-cogs" aria-hidden="true"></i>
              <h5>{{ $myCar->fuel_type_name }}</h5>
              <p>Fuel Type</p>
            </li>
            <li> <i class="fa fa-power-off" aria-hidden="true"></i>
              <h5>{{ $myCar->transmission_name }}</h5>
              <p>Transmission</p>
            </li>
            <li> <i class="fa fa-car" aria-hidden="true"></i>
              <h5>{{ $myCar->body_type_name }}</h5>
              <p>Car Type</p>
            </li>
            <li> <i class="fa fa-files-o" aria-hidden="true"></i>
              @if($myCar->New_car)
                <h5>Brand New</h5>
              @else
                <h5>Used</h5>
              @endif
              <p>Car</p>
            </li>
          </ul>
        </div>


        <div class="listing_more_info">
          <div class="listing_detail_wrap">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation" class="active"><a href="#vehicle-overview " aria-controls="vehicle-overview" role="tab" data-toggle="tab">Vehicle Overview </a></li>
              <li role="presentation"><a href="#accessories" aria-controls="accessories" role="tab" data-toggle="tab">Accessories</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <!-- vehicle-overview -->
              <div role="tabpanel" class="tab-pane active" id="vehicle-overview">
                <h4>Description</h4>
                <p>{{ $myCar->description }}</p>
              </div>

              <!-- Accessories -->
              <div role="tabpanel" class="tab-pane" id="accessories">
                <!--Accessories-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">Accessories</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Air Condition</td>
                      @if($myCar->air_condition)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                    <tr>
                      <td>Power Steering</td>
                      @if($myCar->power_steering)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                    <tr>
                      <td>Power Windows</td>
                      @if($myCar->power_window)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                    <tr>
                      <td>CD Player</td>
                      @if($myCar->cd_player)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                    <tr>
                      <td>Leather Seats</td>
                      @if($myCar->leather_seats)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                    <tr>
                      <td>Central Locking</td>
                      @if($myCar->central_locking)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                    <tr>
                      <td>Driver Airbag</td>
                      @if($myCar->driver_airbag)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                    <tr>
                      <td>Passenger Airbag</td>
                      @if($myCar->passenger_airbag)
                      <td><i class="fa fa-check" aria-hidden="true"></i></td>
                      @else
                      <td><i class="fa fa-close" aria-hidden="true"></i></td>
                      @endif
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!--Side-Bar-->
      <aside class="col-md-3">
        @if(Auth::check())
            @if (Auth::user()->hasRole('customer'))
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-address-card-o" aria-hidden="true"></i> Dealer Contact </h5>
          </div>
          <div class="dealer_detail "> <img src="{{ asset('userProfiles/'. $myCar->avatar) }}" alt="image">
            <p><span>Name:</span> {{ $myCar->first_name . ' '  . $myCar->last_name}}</p>
            <p><span>Email:</span> {{$myCar->email}}</p>
            <p><span>Phone:</span> {{$myCar->mobile_num}}</p>
            <a href="{{ route('dealer',$myCar->seller_id) }}" class="btn btn-xs">View Profile</a> </div>
        </div>
            @endif
        @endif

        @if(Auth::check())
        @if (Auth::user()->hasRole('customer'))
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i> Message to Seller</h5>
          </div>
          <form action="{{route('send.message')}}" method="POST">
            <input type="hidden" name="seller_id" value="{{$myCar->id}}">
            <div class="form-group" >
              <textarea rows="4" name="message" class="form-control" placeholder="Type your message.." required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-block">
            </div>
          </form>
        </div>
        @endif
        @endif
      </aside>
      <!--/Side-Bar-->

    </div>
    <div class="space-20"></div>
    <div class="divider"></div>

    <!--Similar-Cars-->
    <div class="similar_cars">
        <h3>Similar Listings</h3>
        <div class="row">
            @foreach($cars as $car)
            <div class="col-md-3 grid_listing">
            <div class="product-listing-m gray-bg">
                <div class="product-listing-img embed-responsive embed-responsive-4by3 "> <a href="{{ route('Car',$car->car_id) }}"><img src="{{ asset('CarsImages/'.$car->car_image) }}" class="img-responsive" alt="image" /> </a>
                @if($car->New_car)
                    <div class="label_icon">New</div>
                @else
                    <div class="label_icon">Used</div>
                @endif

                </div>
                <div class="product-listing-content">
                <h5><a href="{{ route('Car',$car->car_id) }}">{{  ucfirst($car->car_maker_name) .' '.ucfirst($car->car_model_name)}}</a></h5>
                <p class="list-price"><strong>₱</strong>{{$car->price}}</p>
                  <div  class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i>{{$car->city }}</span></div>
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

        </div>
      </div>
    <!--/Similar-Cars-->

  </div>
</section>
<!--/Listing-detail-->

<!--Brands-->
<section class="brand-section gray-bg">
  <div class="container">
    <div class="brand-hadding">
      <h5>Popular Brands</h5>
    </div>
    <div class="brand-logo-list">
      <div id="popular_brands">
        @foreach($brands as $brand)
            <div class="brand"><a href="#"><img src="{{ asset($brand->file_path_picture) }}" class="img-responsive" alt="image"></a></div>
        @endforeach


      </div>
    </div>
  </div>
</section>
<!-- /Brands-->
@endsection
