@extends('Administrator.layouts.sidebar')

@section('content')

    <div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
            <h1 class="app-page-title">Dashboard</h1>

            <div class="row g-4 mb-4">
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat green-border h-100">
                        <div class="app-card-body p-5 p-lg-5">
                            <h4 class="stats-type mb-1">Total Users</h4>
                            <div class="stats-figure">12,628</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                
                <div class="col-6 col-lg-3">
                    <div class="app-card app-card-stat green-border h-100">
                        <div class="app-card-body p-5 p-lg-5">
                            <h4 class="stats-type mb-1">cars</h4>
                            <div class="stats-figure">250</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
                <div class="col-6 col-lg-6">
                    <div class="app-card app-card-stat green-border h-100">
                        <div class="app-card-body p-5 p-lg-5">
                            <h4 class="stats-type mb-1">Total Cars</h4>
                            <div class="stats-figure">654</div>
                        </div><!--//app-card-body-->
                        <a class="app-card-link-mask" href="#"></a>
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
        </div>
    </div>

    <!-- <div class="page-content-wrapper">
        <div class="container-fluid" id="content-container">
            <div class="tab-pane fade show active" id="nav-requested" role="tabpanel" aria-labelledby="nav-requested-tab">
                <table class="table table-striped">
                <tr>
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>
                        <button onclick="sendid({{$user['id']}}, '{{$user['name']}}', '{{$user['email']}}')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            View
                        </button>
                    </td>
                </tr>

                @endforeach
                
                </table>

                <table class="table table-striped">
                <tr>
                    <th>ID #</th>
                    <th>Name</th>
                    <th>Disaplay Name</th>
                    <th>Action</th>
                </tr>
                
                </table>
            </div>
            

        </div>
    </div> -->


@endsection
