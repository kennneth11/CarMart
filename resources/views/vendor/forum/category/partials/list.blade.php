@if (Auth::user()->hasRole('superadministrator'))
    <a style="text-decoration:none;" href="{{ Forum::route('category.show', $category) }}" >
    <div class="app-card app-card-notification shadow-sm mb-4">
        <div class="app-card-header px-4 py-3">
            <div class="row g-3 align-items-center">
                <div class="col-12 col-lg-auto text-center text-lg-start">						        
                    <div class="app-icon-holder icon-holder-mono">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                            <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                            <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                        </svg>
                    </div><!--//app-icon-holder-->
                </div><!--//col-->
                <div class="col-12 col-lg-auto text-center text-lg-start">
                    <h4 class="notification-title mb-1">{{ $category->title }}</h4>
                    <div style="color:black;" class="notification-content">{{ $category->description }}</div>
                    <ul class="notification-meta list-inline mb-0">
                        <li class="list-inline-item"><div class="notification-type mb-2"><span class="badge bg-info"> {{ trans_choice('forum::threads.thread', 2) }}: {{ $category->thread_count }}</span></div></li>
                        <li class="list-inline-item"><div class="notification-type mb-2"><span class="badge bg-info"> {{ trans_choice('forum::posts.post', 2) }}: {{ $category->post_count }}</span></div></li>
                    </ul>
                </div><!--//col-->
            </div><!--//row-->
        </div><!--//app-card-header-->
        <div class="app-card-footer px-4 py-3">
            @if ($category->accepts_threads)
                @if ($category->newestThread)
                    <div>
                        <a style="text-decoration:none;" href="{{ Forum::route('thread.show', $category->newestThread) }}">{{ $category->newestThread->title }}</a>
                        @include ('forum::partials.timestamp', ['carbon' => $category->newestThread->created_at])
                    </div>
                @endif
                @if ($category->latestActiveThread && $category->latestActiveThread->post_count > 1)
                    <div>
                        <a style="text-decoration:none;" href="{{ Forum::route('thread.show', $category->latestActiveThread->lastPost) }}">Re: {{ $category->latestActiveThread->title }}</a>
                        @include ('forum::partials.timestamp', ['carbon' => $category->latestActiveThread->lastPost->created_at])
                    </div>
                @endif
            @endif
        </div><!--//app-card-footer-->
    </div><!--//app-card-->
    </a>



    <div class="category list-group my-4">
        <!-- <div class="list-group-item shadow-sm">
            <div class="row align-items-center text-center">
                <div class="col-sm text-md-start">
                    <h5 class="card-title">
                        <a href="{{ Forum::route('category.show', $category) }}" style="color: {{ $category->color }};">{{ $category->title }}</a>
                    </h5>
                    <p class="card-text text-muted">{{ $category->description }}</p>
                </div>
                <div class="col-sm-2 text-md-end">
                    @if ($category->accepts_threads)
                        <span class="badge rounded-pill bg-primary" style="background: {{ $category->color }};">
                            {{ trans_choice('forum::threads.thread', 2) }}: {{ $category->thread_count }}
                        </span>
                        <br>
                        <span class="badge rounded-pill bg-primary" style="background: {{ $category->color }};">
                            {{ trans_choice('forum::posts.post', 2) }}: {{ $category->post_count }}
                        </span>
                    @endif
                </div>

                <div class="col-sm text-md-end text-muted">
                    @if ($category->accepts_threads)
                        @if ($category->newestThread)
                            <div>
                                <a href="{{ Forum::route('thread.show', $category->newestThread) }}">{{ $category->newestThread->title }}</a>
                                @include ('forum::partials.timestamp', ['carbon' => $category->newestThread->created_at])
                            </div>
                        @endif
                        @if ($category->latestActiveThread && $category->latestActiveThread->post_count > 1)
                            <div>
                                <a href="{{ Forum::route('thread.show', $category->latestActiveThread->lastPost) }}">Re: {{ $category->latestActiveThread->title }}</a>
                                @include ('forum::partials.timestamp', ['carbon' => $category->latestActiveThread->lastPost->created_at])
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div> -->

        @if ($category->children->count() > 0)
            <div class="subcategories">
                @foreach ($category->children as $subcategory)
                    <div class="list-group-item">
                        <div class="row align-items-center text-center">
                            <div class="col-sm text-md-start">
                                <a href="{{ Forum::route('category.show', $subcategory) }}" style="color: {{ $subcategory->color }};">{{ $subcategory->title }}</a>
                                <div class="text-muted">{{ $subcategory->description }}</div>
                            </div>
                            <div class="col-sm-2 text-md-end">
                                <span class="badge rounded-pill bg-primary" style="background: {{ $subcategory->color }};">
                                    {{ trans_choice('forum::threads.thread', 2) }}: {{ $subcategory->thread_count }}
                                </span>
                                <br>
                                <span class="badge rounded-pill bg-primary" style="background: {{ $subcategory->color }};">
                                    {{ trans_choice('forum::posts.post', 2) }}: {{ $subcategory->post_count }}
                                </span>
                            </div>
                            <div class="col-sm text-md-end text-muted">
                                @if ($subcategory->newestThread)
                                    <div>
                                        <a href="{{ Forum::route('thread.show', $subcategory->newestThread) }}">{{ $subcategory->newestThread->title }}</a>
                                        @include ('forum::partials.timestamp', ['carbon' => $subcategory->newestThread->created_at])
                                    </div>
                                @endif
                                @if ($subcategory->latestActiveThread && $subcategory->latestActiveThread->post_count > 1)
                                    <div>
                                        <a href="{{ Forum::route('thread.show', $subcategory->latestActiveThread->lastPost) }}">Re: {{ $subcategory->latestActiveThread->title }}</a>
                                        @include ('forum::partials.timestamp', ['carbon' => $subcategory->latestActiveThread->lastPost->created_at])
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>


@else
    <article class="article_wrap">
        <div class="article_img">
            <div class="articale_header">
                <h2><a href="#"> <i class="fa fa-tags" aria-hidden="true"></i> {{ $category->title }}</a></h2>
                <div class="article_meta">
                <ul>
                    <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> <a href="#">Admin</a></li>
                    <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ date_format($category->created_at,"d M Y")  }}</li>
                    <li><i class="fa fa-comment" aria-hidden="true"></i> <a href="#">{{ $category->thread_count }} {{ trans_choice('forum::threads.thread', 2) }}</a></li>
                    <li><i class="fa fa-comments" aria-hidden="true"></i> <a href="#">{{ $category->post_count }} {{ trans_choice('forum::posts.post', 2) }}</a></li>
                </ul>
                </div>
            </div>
        </div>
        <div class="article_info">
        <p>{{ $category->description }}</p>
        <a href="#" class="btn">Read More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
    </article>


<div class="category list-group my-4">
    <div class="list-group-item shadow-sm">
        <div class="row align-items-center text-center">
            <div class="col-sm text-md-start">
                <h5 class="card-title">
                    <a href="{{ Forum::route('category.show', $category) }}" style="color: {{ $category->color }};">{{ $category->title }}</a>
                </h5>
                <p class="card-text text-muted">{{ $category->description }}</p>
            </div>
            <div class="col-sm-2 text-md-end">
                @if ($category->accepts_threads)
                    <span class="badge rounded-pill bg-primary" style="background: {{ $category->color }};">
                        {{ trans_choice('forum::threads.thread', 2) }}: {{ $category->thread_count }}
                    </span>
                    <br>
                    <span class="badge rounded-pill bg-primary" style="background: {{ $category->color }};">
                        {{ trans_choice('forum::posts.post', 2) }}: {{ $category->post_count }}
                    </span>
                @endif
            </div>
            <div class="col-sm text-md-end text-muted">
                @if ($category->accepts_threads)
                    @if ($category->newestThread)
                        <div>
                            <a href="{{ Forum::route('thread.show', $category->newestThread) }}">{{ $category->newestThread->title }}</a>
                            @include ('forum::partials.timestamp', ['carbon' => $category->newestThread->created_at])
                        </div>
                    @endif
                    @if ($category->latestActiveThread && $category->latestActiveThread->post_count > 1)
                        <div>
                            <a href="{{ Forum::route('thread.show', $category->latestActiveThread->lastPost) }}">Re: {{ $category->latestActiveThread->title }}</a>
                            @include ('forum::partials.timestamp', ['carbon' => $category->latestActiveThread->lastPost->created_at])
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    @if ($category->children->count() > 0)
        <div class="subcategories">
            @foreach ($category->children as $subcategory)
                <div class="list-group-item">
                    <div class="row align-items-center text-center">
                        <div class="col-sm text-md-start">
                            <a href="{{ Forum::route('category.show', $subcategory) }}" style="color: {{ $subcategory->color }};">{{ $subcategory->title }}</a>
                            <div class="text-muted">{{ $subcategory->description }}</div>
                        </div>
                        <div class="col-sm-2 text-md-end">
                            <span class="badge rounded-pill bg-primary" style="background: {{ $subcategory->color }};">
                                {{ trans_choice('forum::threads.thread', 2) }}: {{ $subcategory->thread_count }}
                            </span>
                            <br>
                            <span class="badge rounded-pill bg-primary" style="background: {{ $subcategory->color }};">
                                {{ trans_choice('forum::posts.post', 2) }}: {{ $subcategory->post_count }}
                            </span>
                        </div>
                        <div class="col-sm text-md-end text-muted">
                            @if ($subcategory->newestThread)
                                <div>
                                    <a href="{{ Forum::route('thread.show', $subcategory->newestThread) }}">{{ $subcategory->newestThread->title }}</a>
                                    @include ('forum::partials.timestamp', ['carbon' => $subcategory->newestThread->created_at])
                                </div>
                            @endif
                            @if ($subcategory->latestActiveThread && $subcategory->latestActiveThread->post_count > 1)
                                <div>
                                    <a href="{{ Forum::route('thread.show', $subcategory->latestActiveThread->lastPost) }}">Re: {{ $subcategory->latestActiveThread->title }}</a>
                                    @include ('forum::partials.timestamp', ['carbon' => $subcategory->latestActiveThread->lastPost->created_at])
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endif