@extends('Administrator.layouts.sidebar')

@section('contentDashboard')

    <div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
            <h1 class="app-page-title">User</h1>
            <div class="row gy-4">
            <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                                            <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        </svg>
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Profile Picture</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <div class="wrapper">
                                <img class="img-fluid" src="{{ asset('userProfiles/'. $user->avatar) }}" alt="">
                            </div>
                        </div><!--//app-card-body-->
                       
                        <br/>
                    </div><!--//app-card-->
                </div><!--//col-->

                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        </svg>
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">User Details</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Name</strong></div>
                                        <div class="item-data">{{ $user->first_name . ' '. $user->last_name}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Username</strong></div>
                                        <div class="item-data">{{ $user->username . ' '. $user->last_name}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email</strong></div>
                                        <div class="item-data">{{ $user->email}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Phone Number</strong></div>
                                        <div class="item-data">{{ $user->mobile_num}}</div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->

                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Role</strong></div>

                                        
                                        @if($user->hasRole('superadministrator'))
                                            <div class="item-data">Administrator</div>
                                        @elseif($user->hasRole('seller'))
                                            <div class="item-data">Seller</div>
                                        @elseif($user->hasRole('customer'))
                                            <div class="item-data">Customer</div>
                                        @endif
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->

                            @if($user->hasRole(['seller', 'customer']))
                            <div class="item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Created at</strong></div>
                                        <div class="item-data">
                                            {{ date_format($user->created_at,"F d,Y") . ' at ' .date_format($user->created_at,"g:i A")}}
                                        </div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                            @endif


                            <div class="item  py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Location</strong></div>
                                        <div class="item-data">
                                            {{ $user->purok . ', '. $user->barangay . ', '. $user->city}}
                                        </div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//item-->
                        </div><!--//app-card-body-->
                       
                        
                    </div><!--//app-card-->
                </div><!--//col-->
            </div>
    </div>


    




@endsection
