
<div style="border:1px solid rgba(0,0,0,.125);" class="app-card app-card-notification shadow-sm mb-4">
    <div class="app-card-header px-4 py-3">
        <div class="row g-3 align-items-center">

            <div class="col-12 col-lg-auto text-center text-lg-start">
                <h4 class="notification-title mb-1">{{ $post->authorName }}</h4>
                <div style="color:black;" class="notification-content"> 
                    @include ('forum::partials.timestamp', ['carbon' => $post->created_at])
                    @if ($post->hasBeenUpdated())
                        ({{ trans('forum::general.last_updated') }} @include ('forum::partials.timestamp', ['carbon' => $post->updated_at]))
                    @endif
                </div>
            </div><!--//col-->
        </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-footer px-4 py-3">
        <div>
            @if ($post->parent !== null)
                @include ('forum::post.partials.quote', ['post' => $post->parent])
            @endif

            @if ($post->trashed())
                @can ('viewTrashedPosts')
                    {!! Forum::render($post->content) !!}
                    <br>
                @endcan
                <span class="badge rounded-pill bg-danger">{{ trans('forum::general.deleted') }}</span>
            @else
                {!! Forum::render($post->content) !!}
            @endif

            @if (! isset($single) || ! $single)
                <div class="text-end">
                    @if (! $post->trashed())
                        <a href="{{ Forum::route('post.show', $post) }}" class="card-link text-muted">{{ trans('forum::general.permalink') }}</a>
                        @if ($post->sequence != 1)
                            @can ('deletePosts', $post->thread)
                                @can ('delete', $post)
                                    <a href="{{ Forum::route('post.confirm-delete', $post) }}" class="card-link text-danger">{{ trans('forum::general.delete') }}</a>
                                @endcan
                            @endcan
                        @endif
                        @can ('edit', $post)
                            <a href="{{ Forum::route('post.edit', $post) }}" class="card-link">{{ trans('forum::general.edit') }}</a>
                        @endcan
                        @can ('reply', $post->thread)
                            <a href="{{ Forum::route('post.create', $post) }}" class="card-link">{{ trans('forum::general.reply') }}</a>
                        @endcan
                    @else
                        @can ('restorePosts', $post->thread)
                            @can ('restore', $post)
                                <a href="{{ Forum::route('post.confirm-restore', $post) }}" class="card-link">{{ trans('forum::general.restore') }}</a>
                            @endcan
                        @endcan
                    @endif
                </div>
            @endif
        </div>
    </div><!--//app-card-footer-->
</div><!--//app-card-->




