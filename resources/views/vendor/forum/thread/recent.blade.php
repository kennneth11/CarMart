@extends ('forum::master', ['thread' => null, 'breadcrumbs_append' => [trans('forum::threads.recent')]])

@section ('content')
    <h1 class="app-page-title">{{ trans('forum::threads.recent') }}</h1>

    <div id="new-posts">


        @if (! $threads->isEmpty())
            <div class="threads list-group my-3 shadow-sm">
                @foreach ($threads as $thread)
                    @include ('forum::thread.partials.list')
                @endforeach
            </div>
        @else
            <div class="card my-3">
                <div class="card-body text-center text-muted">
                    {{ trans('forum::threads.none_found') }}
                </div>
            </div>
        @endif
    </div>
@stop
