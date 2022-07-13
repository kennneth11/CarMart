@extends('layouts.main')


@section('content')
@include('banner')
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
                  <p class="list-price"><strong>₱</strong>{{$car->price}}</p>
                  <div  class="car-location"><span><i class="fa fa-map-marker" aria-hidden="true"></i>{{ str_replace("(Capital)", "",$car->city) }}</span></div>
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



          </div>
          <div class="pagination">
            <ul>
              <li class="current">1</li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
            </ul>
          </div>
        </div>

        <!--Side-Bar-->
        <aside class="col-md-3 col-md-pull-9">
          <div class="sidebar_widget sidebar_search_wrap">
            <div class="widget_heading">
              <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Dream Car </h5>
            </div>
            <div class="sidebar_filter">
              <form action="{{route('searchCar')}}" method="get">
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

          <div class="sidebar_widget sell_car_quote">
            <div class="white-text div_zindex text-center">
              <h3>Sell Your Car</h3>
              <p>Request a quote and sell your car now!</p>
              <a href="#" class="btn">Request a Quote <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
            <div class="dark-overlay"></div>
          </div>
          <div class="sidebar_widget">
            <div class="widget_heading">
              <h5><i class="fa fa-car" aria-hidden="true"></i> Recently Listed Cars</h5>
            </div>
            <div class="recent_addedcars">
              <ul>
                <li class="gray-bg">
                  <div class="recent_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                  <div class="recent_post_title"> <a href="#">Recently Listed Car Name</a>
                    <p class="widget_price">₱92,000</p>
                  </div>
                </li>
                <li class="gray-bg">
                  <div class="recent_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                  <div class="recent_post_title"> <a href="#">Recently Listed Car Name</a>
                    <p class="widget_price">₱92,000</p>
                  </div>
                </li>
                <li class="gray-bg">
                  <div class="recent_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                  <div class="recent_post_title"> <a href="#">Recently Listed Car Name </a>
                    <p class="widget_price">₱92,000</p>
                  </div>
                </li>
                <li class="gray-bg">
                  <div class="recent_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                  <div class="recent_post_title"> <a href="#">Recently Listed Car Name</a>
                    <p class="widget_price">₱92,000</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </aside>
        <!--/Side-Bar-->
      </div>
    </div>
  </section>
  <!--/Listing-grid-view-->





<!--Blog -->
<section class="section-padding">
  <div class="container">
    <div class="section-header text-center">
      <h2>Latest Updates In Automobile Industry </h2>
      <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
    </div>
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <article class="blog-list">
          <div class="blog-info-box">
            <div class="share_article">
            	<p><i class="fa fa-share-alt" aria-hidden="true"></i></p>
                <ul>
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <a href="#"><img src="assets/images/600x380.jpg" class="img-responsive" alt="image"></a>
            <ul>
              <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>Latest Cars</a></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i>15 Nov 2016</li>
              <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>10 Comments</a></li>
            </ul>
          </div>
          <div class="blog-content">
            <h5><a href="#">But I must explain to you how all this mistaken idea.</a></h5>
            <p>expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because</p>
            <a href="#" class="btn-link">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
        </article>
      </div>
      <div class="col-md-4 col-sm-4">
        <article class="blog-list">
          <div class="blog-info-box">
            <div class="share_article">
            	<p><i class="fa fa-share-alt" aria-hidden="true"></i></p>
                <ul>
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <a href="#"><img src="assets/images/600x380.jpg" class="img-responsive" alt="image"></a>
            <ul>
              <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>Latest Cars</a></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i>10 Nov 2016</li>
              <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>21 Comments</a></li>
            </ul>
          </div>
          <div class="blog-content">
            <h5><a href="#">On the other hand, we denounce with righteous indignation.</a></h5>
            <p>expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because</p>
            <a href="#" class="btn-link">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
        </article>
      </div>
      <div class="col-md-4 col-sm-4">
        <article class="blog-list">
          <div class="blog-info-box">
             <div class="share_article">
            	<p><i class="fa fa-share-alt" aria-hidden="true"></i></p>
                <ul>
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <a href="#"><img src="assets/images/600x380.jpg" class="img-responsive" alt="image"></a>
            <ul>
              <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>Latest Cars</a></li>
              <li><i class="fa fa-calendar" aria-hidden="true"></i>05 Nov 2016</li>
              <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i>18 Comments</a></li>
            </ul>
          </div>
          <div class="blog-content">
            <h5><a href="#">Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</a></h5>
            <p>expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because</p>
            <a href="#" class="btn-link">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> </div>
        </article>
      </div>
    </div>
  </div>
</section>
<!-- /Blog-->
@endsection
