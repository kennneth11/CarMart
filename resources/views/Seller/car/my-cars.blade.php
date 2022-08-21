@extends('layouts.profile-sidebar')

@section('contentNav')

        <div class="profile_wrap">
            <h5 class="uppercase underline">My Vehicles <span>({{$NumOfCars}})</span></h5>
            <div class="my_vehicles_list">
                <ul class="vehicle_listing">

                @foreach($myCars as $myCar)

                @if($myCar->status == "Active")
                <li>
                @else($myCar->status == "Deactive")
                <li class="deactive_vehicle">
                @endif
                
                    <div class="vehicle_img wrapper seller-car-img">
                        <a href="{{ route('Car',$myCar->car_id) }}"><img src="{{ asset('CarsImages/'.$myCar->car_image) }}" alt="image"></a>
                    </div>
                    <div class="vehicle_title">
                    <h6><a href="{{ route('Car',$myCar->car_id) }}">{{  ucfirst($myCar->car_maker_name) .' '.ucfirst($myCar->car_model_name) .' '.  $myCar->year_manufactured}}</a></h6>
                    </div>
                    @if($myCar->status == "Active")
                    <div class="vehicle_status"> <a href="{{ route('Deactive-Car',$myCar->car_id) }}" class="btn outline btn-xs active-btn">Active</a>
                    <div class="clearfix"></div>
                    <a href="{{ route('Update-Car',$myCar->car_id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    <a href="{{ route('Destroy-Car',$myCar->car_id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
                    @else($myCar->status == "Deactive")
                    <div class="vehicle_status"> <a href="{{ route('Active-Car',$myCar->car_id) }}" class="btn outline btn-xs">Deactive</a>
                    <div class="clearfix"></div>
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i><i class="fa fa-trash" aria-hidden="true"></i> </div>
                    @endif
                </li>
                @endforeach

                
                </ul>
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
        </div>
@endsection