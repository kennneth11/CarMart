{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('forum::master', ['category' => null])


@section ('content')
    @if (Auth::user()->hasRole('superadministrator'))
        <div class="d-flex flex-row justify-content-between mb-2">
            <h1 class="app-page-title">{{ trans('forum::general.index') }}</h1>

            @can ('createCategories')
                <button type="button" class="btn btn-block-color" data-open-modal="create-category">
                    {{ trans('forum::categories.create') }}
                </button>

                @include ('forum::category.modals.create')
            @endcan
        </div>

        @foreach ($categories as $category)
            @include ('forum::category.partials.list', ['titleClass' => 'lead'])
        @endforeach


    @else
     
        @foreach ($categories as $category)
            @include ('forum::category.partials.list', ['titleClass' => 'lead'])
        @endforeach


            
    @endif

@stop
