@extends('layouts.main')


@section('content')
<!--Page Header-->
<section id="Banner-page" class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>{{$seller->first_name . ' ' .$seller->last_name}}</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Seller Profile</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Dealer-profile-->
<section class="dealer_profile inner_pages">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-3 col-xs-4">
        <div class="dealer_logo"> <img id="banner-source"  src="{{ asset('userProfiles/'. $seller->avatar) }}" alt="image"> </div>
      </div>
      <div class="col-md-6 col-sm-5 col-xs-8">
        <div class="dealer_info">
          <h4> {{$seller->first_name . ' ' .$seller->last_name}}</h4>
          <p>{{$seller->purok . ' ' . $seller->barangay}}<br>
            {{$seller->city}}</p>
          
        </div>
      </div>
      <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="dealer_contact_info gray-bg">
          <h6><i class="fa fa-envelope" aria-hidden="true"></i> Email Address</h6>
          <a href="mailto:contact@example.com"> {{$seller->email}}</a> </div>
        <div class="dealer_contact_info gray-bg">
          <h6><i class="fa fa-phone" aria-hidden="true"></i> Phone Number</h6>
          <a href="tel:61-1234-5678-09"> {{$seller->mobile_num}}</a> </div>
      </div>
    </div>
    <div class="space-60"></div>
    <div class="row">
      <div class="col-md-9">
        <div class="dealer_more_info">
          <h5 class="gray-bg info_title"> About Autospot Used Cars Center</h5>
           <div class="dealer_map">
            <iframe src="https://maps.google.com/maps?q=bukidnon&t=&z=9&ie=UTF8&iwloc=&output=embed" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
          </div>
          <div class="dealer_listings">
            <h6>Inventorys Listing By {{$seller->first_name . ' ' .$seller->last_name}}</h6>
            <div class="row">
                @foreach($cars as $car)
                <div class="col-md-4 grid_listing">
                    <div class="product-listing-m gray-bg">
                    <div class="product-listing-img img-container-card-car"> <a href="{{ route('Car',$car->car_id) }}"><img src="{{ asset('CarsImages/'.$car->car_image) }}" class="img-responsive" alt="image" /> </a>
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
        </div>
      </div>
      <aside class="col-md-3">
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i> Message to Dealer</h5>
          </div>
          <form action="#">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <textarea rows="4" class="form-control" placeholder="Message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-block">
            </div>
          </form>
        </div>
      </aside>
    </div>
  </div>
</section>
<!--/Dealer-profile--> 
@endsection
