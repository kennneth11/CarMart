<!-- <div class="card mb-2" style="border-color: #eee;">
    <div class="card-body">
        <div class="mb-2">
            <span class="float-end">
                <a href="{{ Forum::route('thread.show', $post) }}" class="text-muted">#{{ $post->sequence }}</a>
            </span>
            {{ $post->authorName }} <span class="text-muted">{{ $post->posted }}</span>
        </div>
        {!! \Illuminate\Support\Str::limit(Forum::render($post->content)) !!}
    </div>
</div> -->
<div class="app-card app-card-notification shadow-sm mb-4">
    <div class="app-card-header px-4 py-3">
        <div class="row g-3 align-items-center">

            <div class="col-12 col-lg-auto text-center text-lg-start">
                <h4 class="notification-title mb-1"></h4>
                <div style="color:black;" class="notification-content">{{ $post->authorName }}</div>
            </div><!--//col-->
        </div><!--//row-->
    </div><!--//app-card-header-->
    <div class="app-card-footer px-4 py-3">
        <div>
            {!! \Illuminate\Support\Str::limit(Forum::render($post->content)) !!}
        </div>
    </div><!--//app-card-footer-->
</div><!--//app-card-->



