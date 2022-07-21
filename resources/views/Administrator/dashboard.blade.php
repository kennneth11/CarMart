@extends('Administrator.layouts.sidebar')

@section('contentDashboard')

    <div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
            <h1 class="app-page-title">Dashboard</h1>
            

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat green-border h-100">
                        <div class="app-card-body p-5 p-lg-5">
                            <h4 class="stats-type mb-1">Total Seller Users</h4>
                            <div class="stats-figure">{{ $countSeller}}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat green-border h-100">
                        <div class="app-card-body p-5 p-lg-5">
                            <h4 class="stats-type mb-1">Total Customer Users</h4>
                            <div class="stats-figure">{{ $countCustomer}}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-stat green-border h-100">
                        <div class="app-card-body p-5 p-lg-5">
                            <h4 class="stats-type mb-1">Total Cars</h4>
                            <div class="stats-figure">{{ $countCar}}</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->



            <div class="row g-4 mb-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3 border-0">
                            <h4 class="app-card-title">Car Chart</h4>
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-4">					   
                            <div class="chart-container">
                                <canvas id="mychart-CarCountbar" ></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-12 col-lg-6">		        
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3 border-0">
                            <h4 class="app-card-title">User Chart</h4>
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-4">					   
                            <div class="chart-container">
                                <canvas id="mychart-UserCountbar" ></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-12 col-lg-7">		        
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3 border-0">
                            <h4 class="app-card-title">User Roles Chart</h4>
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-4">					   
                            <div class="chart-container">
                                <canvas id="mychart-UserPie" ></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->
            </div>






        </div>
    </div>


    




@endsection
