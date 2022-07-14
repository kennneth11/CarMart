<!-- <div class="list-group-item {{ $thread->pinned ? 'pinned' : '' }} {{ $thread->locked ? 'locked' : '' }} {{ $thread->trashed() ? 'deleted' : '' }}" :class="{ 'border-primary': selectedThreads.includes({{ $thread->id }}) }">
    <div class="row align-items-center text-center">

        <div class="col-sm text-md-start">
            <span class="lead">
                <a href="{{ Forum::route('thread.show', $thread) }}" @if (isset($category))style="color: {{ $category->color }};"@endif>{{ $thread->title }}</a>
            </span>
            <br>
            {{ $thread->authorName }} <span class="text-muted">@include ('forum::partials.timestamp', ['carbon' => $thread->created_at])</span>

            @if (! isset($category))
                <br>
                <a href="{{ Forum::route('category.show', $thread->category) }}" style="color: {{ $thread->category->color }};">{{ $thread->category->title }}</a>
            @endif
        </div>

        <div class="col-sm text-md-end">
            @if ($thread->pinned)
                <span class="badge rounded-pill bg-info">{{ trans('forum::threads.pinned') }}</span>
            @endif
            @if ($thread->locked)
                <span class="badge rounded-pill bg-warning">{{ trans('forum::threads.locked') }}</span>
            @endif
            @if ($thread->userReadStatus !== null && ! $thread->trashed())
                <span class="badge rounded-pill bg-success">{{ trans($thread->userReadStatus) }}</span>
            @endif
            @if ($thread->trashed())
                <span class="badge rounded-pill bg-danger">{{ trans('forum::general.deleted') }}</span>
            @endif
            <span class="badge rounded-pill bg-primary" @if (isset($category))style="background: {{ $category->color }};"@endif>
                {{ trans('forum::general.replies') }}: 
                {{ $thread->reply_count }}
            </span>
        </div>

        @if ($thread->lastPost)
            <div class="col-sm text-md-end text-muted">
                <a href="{{ Forum::route('thread.show', $thread->lastPost) }}">{{ trans('forum::posts.view') }} &raquo;</a>
                <br>
                {{ $thread->lastPost->authorName }}
                <span class="text-muted">@include ('forum::partials.timestamp', ['carbon' => $thread->lastPost->created_at])</span>
            </div>
        @endif

        @if (isset($category) && isset($selectableThreadIds) && in_array($thread->id, $selectableThreadIds))
            <div class="col-sm" style="flex: 0;">
                <input type="checkbox" name="threads[]" :value="{{ $thread->id }}" v-model="selectedThreads">
            </div>
        @endif
    </div>
</div> -->


<div class="app-card app-card-notification shadow-sm  {{ $thread->pinned ? 'pinned' : '' }} {{ $thread->locked ? 'locked' : '' }} {{ $thread->trashed() ? 'deleted' : '' }}" :class="{ 'border-primary': selectedThreads.includes({{ $thread->id }}) }">
    <div class="app-card-header px-4 py-3">
        <div class="row g-3 align-items-center">

            <div class="col-12 col-lg-6 text-center text-lg-start">
                <h4 class="notification-title mb-1"><a href="{{ Forum::route('thread.show', $thread) }}" @if (isset($category))style="color: {{ $category->color }};"@endif>{{ $thread->title }}</a></h4>
                
                <ul class="notification-meta list-inline mb-0">
                    <li class="list-inline-item">{{ $thread->authorName }}</li>
                    <li class="list-inline-item">|</li>
                    <li class="list-inline-item">@include ('forum::partials.timestamp', ['carbon' => $thread->created_at])</li>
                </ul>
                
                @if (! isset($category))
                <div class="notification-type mb-2"><a href="{{ Forum::route('category.show', $thread->category) }}"><span style="background-color: #E91E63;" class="badge ">{{ $thread->category->title }}</span></a></div>
                @endif
        
            </div><!--//col-->


            <div class="col-12 col-lg-2 text-center text-lg-start">

                @if ($thread->pinned)
                    <div class="notification-type mb-2"><span class="badge bg-info">{{ trans('forum::threads.pinned') }}</span></div>
                    @endif
                @if ($thread->locked)
                    <div class="notification-type mb-2"><span class="badge bg-warning">{{ trans('forum::threads.locked') }}</span></div>
                @endif
                @if ($thread->userReadStatus !== null && ! $thread->trashed())
                    <div class="notification-type mb-2"><span class="badge bg-success">{{ trans($thread->userReadStatus) }}</span></div>
                @endif
                @if ($thread->trashed())
                    <div class="notification-type mb-2"><span class="badge bg-danger">{{ trans('forum::general.deleted') }}</span></div>
                @endif

                <div class="notification-type mb-2">
                    <span @if (isset($category))style="background: {{ $category->color }};"@endif class="badge bg-primary">
                    {{ trans('forum::general.replies') }}: 
                    {{ $thread->reply_count }}
                    </span>
                </div>
                
            </div><!--//col-->


            <div class="col-12 col-lg-4 text-center text-lg-end">
                @if (isset($category) && isset($selectableThreadIds) && in_array($thread->id, $selectableThreadIds))
                <div class="row">

                    <div class="col-12 col-lg-10">
                    @endif
                        <h4 class="notification-content mb-1"><a href="{{ Forum::route('thread.show', $thread->lastPost) }}">{{ trans('forum::posts.view') }} &raquo;</a></h4>
                        
                        <ul class="notification-meta list-inline mb-0">
                            <li class="list-inline-item">{{ $thread->lastPost->authorName }}</li>
                            <li class="list-inline-item">|</li>
                            <li class="list-inline-item">@include ('forum::partials.timestamp', ['carbon' => $thread->lastPost->created_at])</li>
                        </ul>

                    @if (isset($category) && isset($selectableThreadIds) && in_array($thread->id, $selectableThreadIds))
                    </div>

                    <div class="col-12 col-lg-2 ">
                        
                            
                                <input type="checkbox" name="threads[]" :value="{{ $thread->id }}" v-model="selectedThreads">
                     
                
                    </div>
                </div>
                @endif
            </div><!--//col-->

        </div><!--//row-->
    </div><!--//app-card-header-->

    
</div><!--//app-card-->
