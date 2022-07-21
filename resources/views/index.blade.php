@extends('layouts.main')


@section('content')
@include('banner')
<!--Listing-grid-view-->
<section class="listing-page" id="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-md-push-3">
            {{-- include mobileSearch --}}
            @include('mobileSearch')
            {{-- include mobileSearch --}}

          <div class="row">
            <!--Start Card-->
            @foreach($cars as $car)
            <div class="col-md-4 grid_listing">
              <div class="product-listing-m gray-bg">
                {{-- embed-responsive --}}
                <div class="product-listing-img  img-container-card-car"> <a href="{{ route('Car',$car->car_id) }}"><img src="{{ asset('CarsImages/'.$car->car_image) }}" class="img-responsive" alt="image" /> </a>
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
            {{-- include SearchSideBar Web --}}
            @include('searchSideBar')
            {{-- include SearchSideBar Web --}}

            {{-- include sellCarSideBar --}}
            @include('sellCarSideBar')
            {{-- include sellCarSideBar --}}
        </aside>
            <!--/Side-Bar-->
      </div>
    </div>
  </section>
  <!--/Listing-grid-view-->





<!--Blog -->
@include('forumCards')
<!-- /Blog-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript">
    var my_handlers = {
            fill_cities: function(){
                var province_code = $(this).val();
                $('#municipality').ph_locations( 'fetch_list', [{"province_code": 1013}]);
            },

            fill_barangays: function(){
            var city_code = $(this).val();
            $('#barangay').ph_locations('fetch_list', [{"city_code": city_code}]);
            }
        };

        $(function(){
            $('#municipality').on('change', my_handlers.fill_barangays);
            $('#municipality').ph_locations({'location_type': 'cities'});
            $('#municipality').ph_locations('fetch_list', [{"province_code": 1013}]);
        });
</script>
<script type="text/javascript">
    $('#municipality').change(function(){
         var select_city = $('#municipality :selected').text();
        $('input[name=cities]').val(select_city);
    });
</script>

@endsection

