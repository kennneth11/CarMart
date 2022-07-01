@extends('layouts.profile-sidebar')

@section('contentNav')

        <div class="profile_wrap">
            <h5 class="uppercase underline">My Vehicles <span>(20 Cars)</span></h5>
            <div class="my_vehicles_list">
                <ul class="vehicle_listing">
                <li>
                    <div class="vehicle_img"> <a href="#"><img src="assets/images/600x380.jpg" alt="image"></a> </div>
                    <div class="vehicle_title">
                    <h6><a href="#">Your Car Listing Name</a></h6>
                    </div>
                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                    <div class="clearfix"></div>
                    <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
                </li>
                <li class="deactive_vehicle">
                    <div class="vehicle_img"> <a href="#"><img src="assets/images/600x380.jpg" alt="image"></a> </div>
                    <div class="vehicle_title">
                    <h6><a href="#">Your Car Listing Name</a></h6>
                    </div>
                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Deactive</a>
                    <div class="clearfix"></div>
                    <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
                </li>
                <li>
                    <div class="vehicle_img"> <a href="#"><img src="assets/images/600x380.jpg" alt="image"></a> </div>
                    <div class="vehicle_title">
                    <h6><a href="#">Your Car Listing Name</a></h6>
                    </div>
                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                    <div class="clearfix"></div>
                    <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
                </li>
                <li>
                    <div class="vehicle_img"> <a href="#"><img src="assets/images/600x380.jpg" alt="image"></a> </div>
                    <div class="vehicle_title">
                    <h6><a href="#">Your Car Listing Name</a></h6>
                    </div>
                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                    <div class="clearfix"></div>
                    <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
                </li>
                <li>
                    <div class="vehicle_img"> <a href="#"><img src="assets/images/600x380.jpg" alt="image"></a> </div>
                    <div class="vehicle_title">
                    <h6><a href="#">Your Car Listing Name</a></h6>
                    </div>
                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                    <div class="clearfix"></div>
                    <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
                </li>
                <li>
                    <div class="vehicle_img"> <a href="#"><img src="assets/images/600x380.jpg" alt="image"></a> </div>
                    <div class="vehicle_title">
                    <h6><a href="#">Your Car Listing Name</a></h6>
                    </div>
                    <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Active</a>
                    <div class="clearfix"></div>
                    <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a> </div>
                </li>
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