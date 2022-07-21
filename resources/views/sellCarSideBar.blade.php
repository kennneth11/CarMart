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
        @foreach($recentCars as $recentCar)
        <li class="gray-bg">
          <div class="recent_post_img recent-img-container">
            <a href="{{ route('Car',$recentCar->car_id) }}">
              <img src="{{ asset('CarsImages/'.$recentCar->car_image) }}" alt="image">
            </a>
          </div>
          <div class="recent_post_title"> <a href="{{ route('Car',$recentCar->car_id) }}">{{ ucfirst($recentCar->car_maker_name) .' '.ucfirst($recentCar->car_model_name) }}</a>
            <p class="widget_price"><strong>₱</strong>{{$recentCar->price}}</p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>


