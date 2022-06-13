@extends('Administrator.layouts.sidebar')

@section('content')


    <div class="page-content-wrapper">
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
    </div>


@endsection
