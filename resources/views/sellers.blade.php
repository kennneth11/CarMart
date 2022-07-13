@extends('layouts.main')


@section('content')
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Seller List</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Seller List</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Dealers-list-->
<section class="inner_pages">
    <div class="container">
        <div class="result-sorting-wrapper">
            <div class="sorting-count">
                <p>1 - 6 <span>of 50 Results for your search.</span></p>
            </div>
        </div>

        @foreach($sellers as $seller)
        <div class="dealers_list_wrap">
            <div class="dealers_listing">
                <div class="row">
                    <div class="col-sm-3 col-xs-4">
                        <div class="dealer_logo "> 
                            <div class="sellerProfile "> 
                                <a href="{{ route('dealer',$seller->id) }}">
                                    <img src="{{ asset('userProfiles/'. $seller->avatar) }}" alt="image">
                                </a> 
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                        <div class="dealer_info">
                        <h5><a href="{{ route('dealer',$seller->id) }}">{{$seller->first_name . ' ' .$seller->last_name}}</a></h5>
                        <p>{{$seller->purok . ' ' . $seller->barangay}}<br>
                                {{$seller->city}}</p>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="view_profile"> <a href="{{ route('dealer',$seller->id) }}" class="btn btn-xs outline">View Profile</a>
                        <p>({{$seller->num_car}} Cars)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

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
</section>
<!--/Dealers-list--> 

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
