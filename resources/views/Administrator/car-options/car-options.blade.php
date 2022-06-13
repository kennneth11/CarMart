@extends('Administrator.layouts.sidebar')

@section('content')


    <div class="page-content-wrapper car-options">
        <div class="container-fluid" id="content-container">
            <h2>Car Options</h2>
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



            
            <div class="container-fluid">
                <div class="row">

                    <div class="tbl-container col-6">
                        <div class="row title">
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
                                <td class="align-middle">{{$carMaker->car_maker_name}}</td>
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
                                    <form id="login-form" method="POST" action="{{ route('CarOptions') }}">
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
                        
                

                    
                    <div class="tbl-container col-6">
                        <div class="row title">
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







                </div>
            </div>
        </div>
    </div>


@endsection
