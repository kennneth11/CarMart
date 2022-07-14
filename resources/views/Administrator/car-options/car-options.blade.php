@extends('Administrator.layouts.sidebar')

@section('contentDashboard')


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
                        <a class="btn btn-block-color" data-bs-toggle="modal" href="#carMakerModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table app-table-hover mb-0 text-left">
                        <tr>
                            <th class="cell">ID #</th>
                            <th class="cell">Name</th>
                            <th class="cell">Action</th>
                        </tr>
                        @foreach($carMakers as $carMaker)
                        <tr>
                            <td class="align-middle cell">{{$carMaker->car_maker_id}}</td>
                            <td class="align-middle cell">{{$carMaker->car_maker_name}}</td>
                            <img id="{{$carMaker->car_maker_id.$carMaker->car_maker_name}}" style="display:none;" src="{{ asset($carMaker->file_path_picture) }}">
                            <td class="cell">
                                <button data-bs-toggle="modal" href="#view_maker_modal" onclick="viewMaker('{{$carMaker->car_maker_id}}','{{$carMaker->car_maker_name}}')" type="button" class="btn btn-outline-Themecolor">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    {{ $carMakers->appends(['carModels' => $carModels->currentPage()])->appends(['carBodyTypes' => $carBodyTypes->currentPage()])->appends(['carTransmissions' => $carTransmissions->currentPage()])->appends(['carFuelTypes' => $carFuelTypes->currentPage()])->links() }}
                    </div>

                    <div class="modal fade" id="carMakerModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('Setting') }} "enctype="multipart/form-data" >
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
                                        <button class="btn btn-block-color"  type="submit"  name="form1">Submit</button>
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
                        <a class="btn btn-block-color" data-bs-toggle="modal" href="#carModelModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table app-table-hover mb-0 text-left">
                        <tr>
                            <th class="cell">ID #</th>
                            <th class="cell">Maker</th>
                            <th class="cell">Name</th>
                            <th class="cell">Action</th>
                        </tr>
                        
                        @foreach($carModels as $carModel)
                        <tr>
                            <td class="align-middle cell">{{$carModel->car_model_id}}</td>
                            <td class="align-middle cell">{{$carModel->car_maker_name}}</td>
                            <td class="align-middle cell">{{$carModel->car_model_name}}</td>
                            <td class="cell">
                                <button onclick="viewModel('{{$carModel->car_model_id}}','{{$carModel->car_model_name}}', '{{$carModel->car_maker_name}}')" type="button" class="btn btn-outline-Themecolor" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    {{ $carModels->appends(['carMakers' => $carMakers->currentPage()])->appends(['carBodyTypes' => $carBodyTypes->currentPage()])->appends(['carTransmissions' => $carTransmissions->currentPage()])->appends(['carFuelTypes' => $carFuelTypes->currentPage()])->links() }}
                    </div>

                    <div class="modal fade" id="carModelModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('Setting') }}">
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
                                        <button class="btn btn-block-color"  type="submit" name="form2">Submit</button>
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
                            <a class="btn btn-block-color" data-bs-toggle="modal" href="#BodyTypeModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table app-table-hover mb-0 text-left">
                        <tr>
                            <th class="cell">ID #</th>
                            <th class="cell">Name</th>
                            <th class="cell">Action</th>
                        </tr>
                        
                        @foreach($carBodyTypes as $carBodyType)
                        <tr>
                            <td class="align-middle cell">{{$carBodyType->body_type_id}}</td>
                            <td class="align-middle cell">{{$carBodyType->body_type_name}}</td>
                            <td class="cell">
                                <button onclick="view('{{$carBodyType->body_type_id}}', '{{$carBodyType->body_type_name}}', '#view_bodytype_modal')" type="button" class="btn btn-outline-Themecolor" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    {{ $carBodyTypes->appends(['carMakers' => $carMakers->currentPage()])->appends(['carModels' => $carModels->currentPage()])->appends(['carTransmissions' => $carTransmissions->currentPage()])->appends(['carFuelTypes' => $carFuelTypes->currentPage()])->links() }}
                    </div>

                    <div class="modal fade" id="BodyTypeModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('Setting') }}">
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
                                        <button class="btn btn-block-color"  type="submit" name="form3">Submit</button>
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
                            <a class="btn btn-block-color" data-bs-toggle="modal" href="#transmissioneModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table app-table-hover mb-0 text-left">
                        <tr>
                            <th class="cell">ID #</th>
                            <th class="cell">Name</th>
                            <th class="cell">Action</th>
                        </tr>
                        
                        @foreach($carTransmissions as $carTransmission)
                        <tr>
                            <td class="align-middle cell">{{$carTransmission->transmission_id}}</td>
                            <td class="align-middle cell">{{$carTransmission->transmission_name}}</td>
                            <td class="cell">
                                <button onclick="view('{{$carTransmission->transmission_id}}', '{{$carTransmission->transmission_name}}', '#view_transmission_modal')" type="button" class="btn btn-outline-Themecolor">
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    {{ $carTransmissions->appends(['carMakers' => $carMakers->currentPage()])->appends(['carModels' => $carModels->currentPage()])->appends(['carBodyTypes' => $carBodyTypes->currentPage()])->appends(['carFuelTypes' => $carFuelTypes->currentPage()])->links() }}
                    </div>

                    <div class="modal fade" id="transmissioneModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('Setting') }}">
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
                                        <button class="btn btn-block-color"  type="submit" name="form4">Submit</button>
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
                            <a class="btn btn-block-color" data-bs-toggle="modal" href="#FuelTypeModal" role="button">Add</a>
                        </div>
                    </div>
                    <table class="table app-table-hover mb-0 text-left">
                        <tr>
                            <th class="cell">ID #</th>
                            <th class="cell">Name</th>
                            <th class="cell">Action</th>
                        </tr>
                        
                        @foreach($carFuelTypes as $carFuelType)
                        <tr>
                            <td class="align-middle cell">{{$carFuelType->fuel_type_id}}</td>
                            <td class="align-middle cell">{{$carFuelType->fuel_type_name}}</td>
                            <td class="cell">
                                <button  data-bs-toggle="modal" data-bs-target="#view_fueltype_modal" onclick="view('{{$carFuelType->fuel_type_id}}', '{{$carFuelType->fuel_type_name}}', '#view_fueltype_modal')" type="button" class="btn btn-outline-Themecolor" >
                                    View
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-end col-12">
                    {{ $carFuelTypes->appends(['carMakers' => $carMakers->currentPage()])->appends(['carModels' => $carModels->currentPage()])->appends(['carBodyTypes' => $carBodyTypes->currentPage()])->appends(['carTransmissions' => $carTransmissions->currentPage()])->links() }}
                    </div>

                    <div class="modal fade" id="FuelTypeModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form id="login-form" method="POST" action="{{ route('Setting') }}">
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
                                        <button class="btn btn-block-color"  type="submit" name="form5">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Car Maker view modal -->
    <div class="modal fade" id="view_maker_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Car Maker</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="body-container">
                            <div class="mb-3">
                                <img id="maker_picture_modal" src="" class="img-fluid">
                            </div>
                            <div class="mb-3">
                                <label for="modal_Maker_id" class="input-title">{{ __('Car Maker ID #') }}</label>
                                <input id="modal_Maker_id" type="text" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="modal_Maker_name" class="input-title">{{ __('Car Maker') }}</label>
                                <input id="modal_Maker_name" type="text" class="form-control" readonly>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Car model view modal -->
    <div class="modal fade" id="view_model_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Car Model</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="body-container">
                            <div class="mb-3">
                                <label for="modal_Model_id" class="input-title">{{ __('Car Model ID #') }}</label>
                                <input id="modal_Model_id" type="text" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="modal_Model_maker" class="input-title">{{ __('Car Maker') }}</label>
                                <input id="modal_Model_maker" type="text" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="modal_Model_name" class="input-title">{{ __('Car Model') }}</label>
                                <input id="modal_Model_name" type="text" class="form-control" readonly>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- Car body type view modal -->
    <div class="modal fade" id="view_bodytype_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Car Body Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="body-container">
                            <div class="mb-3">
                                <label for="modal_bodytype_id" class="input-title">{{ __('Car Body Type ID #') }}</label>
                                <input id="modal_bodytype_id" type="text" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="modal_bodytype_name" class="input-title">{{ __('Car Maker') }}</label>
                                <input id="modal_bodytype_name" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- Car Transmission view modal -->
    <div class="modal fade" id="view_transmission_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Car Transmission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="body-container">
                            <div class="mb-3">
                                <label for="modal_transmission_id" class="input-title">{{ __('Car Transmission ID #') }}</label>
                                <input id="modal_transmission_id" type="text" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="modal_transmission_name" class="input-title">{{ __('Car Transmission') }}</label>
                                <input id="modal_transmission_name" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- Car Fuel Type view modal -->
    <div class="modal fade" id="view_fueltype_modal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Car Fuel Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="body-container">
                            <div class="mb-3">
                                <label for="modal_fueltype_id" class="input-title">{{ __('Car Fuel Type ID #') }}</label>
                                <input id="modal_fueltype_id" type="text" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="modal_fueltype_name" class="input-title">{{ __('Car Fuel Type') }}</label>
                                <input id="modal_fueltype_name" type="text" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection
