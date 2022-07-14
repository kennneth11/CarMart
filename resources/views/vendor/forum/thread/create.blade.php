@extends ('forum::master', ['breadcrumbs_append' => [trans('forum::threads.new_thread')]])

@section ('content')


    <!-- <div id="create-thread">
        <h3 class="app-page-title">{{ trans('forum::threads.new_thread') }} ({{ $category->title }})</h3>

        <form method="POST" action="{{ Forum::route('thread.store', $category) }}">
            @csrf

            <div class="mb-3">
                <label for="title">{{ trans('forum::general.title') }}</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control">
            </div>

            <div class="mb-3">
                <textarea name="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="text-end">
                <a href="{{ URL::previous() }}" class="btn btn-link">{{ trans('forum::general.cancel') }}</a>
                <button type="submit" class="btn btn-primary px-5">{{ trans('forum::general.create') }}</button>
            </div>
        </form>
    </div> -->

    <h3 class="app-page-title">{{ trans('forum::threads.new_thread') }} ({{ $category->title }})</h3>
    <div class="row gy-4">
        <form method="POST" action="{{ Forum::route('thread.store', $category) }}">
            @csrf
            <div class="col-12 col-lg-12">
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                    
                    <div class="app-card-body px-4 w-100">
                        
                        <div class="item  py-3 w-100">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12">
                                    <div class="item-label"><strong>{{ trans('forum::general.title') }}</strong></div>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//item-->

                        <div class="item border-bottom py-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12">
                                    <div class="item-label"><strong></strong></div>
                                    <textarea style="height:40vh;" name="content" class="form-control">{{ old('content') }}</textarea>
                                </div><!--//col-->
                                
                            </div><!--//row-->
                        </div><!--//item-->

    
                    </div><!--//app-card-body-->
                    <div class="app-card-footer p-4 mt-auto text-end w-100">
                        <a href="{{ URL::previous() }}" class="btn btn-link">{{ trans('forum::general.cancel') }}</a>
                        <button type="submit" class="btn btn-primary px-5">{{ trans('forum::general.create') }}</button>
                    </div><!--//app-card-footer-->
                    
                </div><!--//app-card-->
            </div><!--//col-->
        </form>
    </div>
@stop
