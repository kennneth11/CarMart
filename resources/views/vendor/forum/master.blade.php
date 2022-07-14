@extends('Administrator.layouts.sidebar')

@section('contentDashboard')

    <div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
            
        @include('forum::partials.alerts')

        @yield('content')
        </div>
    </div>

    <div class="mask"></div>


@endsection
