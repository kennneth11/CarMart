@extends('Administrator.layouts.sidebar')

@section('content')


    <div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">


            <h1 class="app-page-title">Car Options</h1>
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @error('car_maker_name')
            <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @enderror

            <!-- Car Maker/Brand section -->
            <div class="row g-4 mb-4">
                <div class="tbl-container col-6">
                    <div class="row g-4 mb-4">
                        <div class="col-6">
                            <h5 >Car Makers</h5>
                        </div>
                        <div class="d-flex justify-content-end col-6">
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#carMakerModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        @foreach($carMakers as $carMaker)
                        <tr>
                            <td class="align-middle">{{$carMaker->car_maker_id}}</td>
                            <td class="align-middle">{{$carMaker->car_maker_name}}
                                <img style="display:none;" src="{{ asset($carMaker->file_path_picture) }}" class="" alt="...">
                            </td>
                            <td>
                                <button onclick="" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    {{ $carMakers->appends(['carModels' => $carModels->currentPage()])->links() }}
                    </div>

                    <div class="modal fade" id="carMakerModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('CarOptions') }} "enctype="multipart/form-data" >
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Add New Car Maker</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="body-container">
                                            <div class="mb-3">
                                                <label for="car_maker_name" class="input-title">{{ __('Car Maker') }}</label>
                                                <input id="car_maker_name" type="text" class="form-control input-data @error('car_maker_name') is-invalid @enderror" name="car_maker_name" required autocomplete="car_maker_name" autofocus>
                                            </div>
                                            <div class="mb-3">
                                                <label for="car_maker_picture1" class="input-title">{{ __('Car Maker Picture') }}</label>
                                                <input id="car_maker_picture1" type="file" accept="image/png" class="form-control input-data @error('car_maker_picture1') is-invalid @enderror" name="car_maker_picture1" required autocomplete="car_maker_picture" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"  type="submit"  name="form1">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    
            

                <!-- Car Model section -->
                <div class="tbl-container col-6">
                    <div class="row g-4 mb-4 title">
                        <div class="col-6">
                            <h5 >Car Model</h5>
                        </div>
                        <div class="d-flex justify-content-end col-6">
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#carModelModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>ID #</th>
                            <th>Maker</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach($carModels as $carModel)
                        <tr>
                            <td class="align-middle">{{$carModel->car_model_id}}</td>
                            <td class="align-middle">{{$carModel->car_maker_name}}</td>
                            <td class="align-middle">{{$carModel->car_model_name}}</td>
                            <td>
                                <button onclick="" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    {{ $carModels->appends(['carMakers' => $carMakers->currentPage()])->links() }}
                    </div>

                    <div class="modal fade" id="carModelModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('CarOptions') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Add New Car Model</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div id="body-container">
                                            
                                            <div class="mb-3">
                                                <label for="car_maker_id" class="input-title">{{ __('Car Maker') }}</label>
                                                <select name="car_maker_id" class="form-select form-control input-data @error('car_maker_id') is-invalid @enderror" aria-label="Disabled select example" >
                                                    @foreach($carMakers1 as $carMaker1)
                                                    <option value="{{$carMaker1->car_maker_id}}">{{$carMaker1->car_maker_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="car_model_name" class="input-title">{{ __('Car Model') }}</label>
                                                <input id="car_model_name" type="text" class="form-control input-data @error('car_model_name') is-invalid @enderror" name="car_model_name" required autocomplete="car_maker_name" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"  type="submit" name="form2">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Car Body type section -->
                <div class="tbl-container col-6">
                    <div class="row g-4 mb-4 title">
                        <div class="col-6">
                            <h5 >Car Body Type</h5>
                        </div>
                        <div class="d-flex justify-content-end col-6">
                            <a class="btn btn-primary" data-bs-toggle="modal" href="#BodyTypeModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach($carBodyTypes as $carBodyType)
                        <tr>
                            <td class="align-middle">{{$carBodyType->body_type_id}}</td>
                            <td class="align-middle">{{$carBodyType->body_type_name}}</td>
                            <td>
                                <button onclick="" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    <!-- {{ $carModels->appends(['carMakers' => $carMakers->currentPage()])->links() }} -->
                    </div>

                    <div class="modal fade" id="BodyTypeModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('CarOptions') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Add New Body Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div id="body-container">
                                            <div class="mb-3">
                                                <label for="body_type_name" class="input-title">{{ __('Car Body Type') }}</label>
                                                <input id="body_type_name" type="text" class="form-control input-data @error('body_type_name') is-invalid @enderror" name="body_type_name" required autocomplete="body_type_name" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"  type="submit" name="form3">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Car Transmission section -->
                <div class="tbl-container col-6">
                    <div class="row g-4 mb-4 title">
                        <div class="col-6">
                            <h5 >Car Transmission</h5>
                        </div>
                        <div class="d-flex justify-content-end col-6">
                            <a class="btn btn-primary" data-bs-toggle="modal" href="#transmissioneModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach($carTransmissions as $carTransmission)
                        <tr>
                            <td class="align-middle">{{$carTransmission->transmission_id}}</td>
                            <td class="align-middle">{{$carTransmission->transmission_name}}</td>
                            <td>
                                <button onclick="" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    <!-- {{ $carModels->appends(['carMakers' => $carMakers->currentPage()])->links() }} -->
                    </div>

                    <div class="modal fade" id="transmissioneModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('CarOptions') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Add New Transmission</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div id="body-container">
                                            <div class="mb-3">
                                                <label for="transmission_name" class="input-title">{{ __('Car Transmission') }}</label>
                                                <input id="transmission_name" type="text" class="form-control input-data @error('transmission_name') is-invalid @enderror" name="transmission_name" required autocomplete="transmission_name" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"  type="submit" name="form4">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Car Fuel type section -->
                <div class="tbl-container col-6">
                    <div class="row g-4 mb-4 title">
                        <div class="col-6">
                            <h5 >Car Fuel Type</h5>
                        </div>
                        <div class="d-flex justify-content-end col-6">
                            <a class="btn btn-primary" data-bs-toggle="modal" href="#FuelTypeModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>ID #</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        
                        @foreach($carFuelTypes as $carFuelType)
                        <tr>
                            <td class="align-middle">{{$carFuelType->fuel_type_id}}</td>
                            <td class="align-middle">{{$carFuelType->fuel_type_name}}</td>
                            <td>
                                <button onclick="" type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    <!-- {{ $carModels->appends(['carMakers' => $carMakers->currentPage()])->links() }} -->
                    </div>

                    <div class="modal fade" id="FuelTypeModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('CarOptions') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Add New Fuel Type</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div id="body-container">
                                            <div class="mb-3">
                                                <label for="fuel_type_name" class="input-title">{{ __('Car Fuel Type') }}</label>
                                                <input id="fuel_type_name" type="text" class="form-control input-data @error('fuel_type_name') is-invalid @enderror" name="fuel_type_name" required autocomplete="fuel_type_name" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary"  type="submit" name="form5">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
