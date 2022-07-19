@extends('layouts.main')

@section('content')


    <!--Our-Blog-->
    <section class="our_blog">
    <div class="container">
        <div class="row">
        <div class="col-lg-9 col-md-8"> 
            <!--article-1-->
            <article class="article_wrap article_full_info">
            <div class="articale_header">
                <h2>{{ $thread->title }}</h2>
                <div class="article_meta">
                <ul>
                <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $thread->first_name }}</li>
                  <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{date_format($thread->created_at,"d M Y")  }} </li>
                  <li><i class="fa fa-tags" aria-hidden="true"></i> {{$thread->category_name}}</li>
                  <li><i class="fa fa-comment" aria-hidden="true"></i> <a href="#">{{$thread->reply_count}} Comments</a></li>
                </ul>
                </div>
            </div>

            <div class="article_info">
                
                <p>{!! str_replace("\n", '<br>' ,$thread->content)  !!}</p>
            </div>
            <div class="article_tag gray-bg">
                <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="share_article ">
                    <h6>Share:</h6>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </article>
            
            <!--Comments-->
            <div class="articale_comments">
            <div id="comments">
                <h5>{{$postsCount - 1}} Comments</h5>
                <ul class="commentlist">
                    @foreach($posts as $post)
                        @if($post->sequence != '1')
                        <li class="comment">
                            <div class="comment-body">
                            <div class="comment-author"> <img class="default-avatar avatar" src=" {{ asset('userProfiles/'.$post->avatar) }}" alt="image"> 
                                @if($post->first_name == 'ADMIN')
                                    <span class="fn">{{ $post->first_name }}</span>
                                @else
                                    <span class="fn">{{ $post->first_name . ' '. $post->last_name}}</span>
                                @endif
                            </div>
                            <div class="comment-meta commentmetadata"> <a href="#">{{  date_format($post->created_at,"F d,Y") . ' at ' . date_format($post->created_at,"g:i a")}}</a> </div>

                            @if(!is_null($post->post_id))
                                <br>
                                    <div class="post-comment-reply" >
                                        <div class="comment-author"> <img class="avatar" src="{{ asset('userProfiles/'.$post->replied_avatar) }}" alt="image"> 
                                        @if($post->first_name == 'ADMIN')
                                            <span class="fn">{{ $post->replied_first_name }}</span>
                                        @else
                                            <span class="fn">{{ $post->replied_first_name . ' '. $post->replied_last_name}}</span>
                                        @endif
                                        </div>
                                        <div class="comment-meta commentmetadata"> <a href="#">{{  date_format($post->replied_created_at,"F d,Y") . ' at ' . date_format($post->replied_created_at,"g:i a")}}</a> </div>
                                        <p>{{$post->replied_content}}</p>
                                    </div>
                                <br>
                            @endif

                            <p> {!! str_replace("\n", '<br>' ,$post->content)  !!} </p>
                                @auth
                                    <div class="reply"> <a href="#reply" onclick="passPostid({{$post->id}})" class="btn btn-primary btn-xs outline" data-toggle="modal"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a> </div>

                                
                                @endauth
                            </div>
                        </li>
                        @endif
                    @endforeach

                    <!-- <li class="comment">
                        <div class="comment-body">
                        <div class="comment-author"> <img class="avatar" src="assets/images/90x90.jpg" alt="image"> <span class="fn">John Smith</span> </div>
                        <div class="comment-meta commentmetadata"> <a href="#">April 23, 2016 at 12:52 pm</a> </div>
                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem</p>
                        <div class="reply"> <a href="#" class="btn btn-primary btn-xs outline"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a> </div>
                        </div>
                        <ul class="children">
                        <li class="comment">
                            <div class="comment-body">
                            <div class="comment-author"> <img class="avatar" src="assets/images/90x90.jpg" alt="image"> <span class="fn">John Smith</span> </div>
                            <div class="comment-meta commentmetadata"> <a href="#">April 23, 2016 at 12:52 pm</a> </div>
                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem</p>
                            <div class="reply"> <a href="#" class="btn btn-primary btn-xs outline"><i class="fa fa-reply" aria-hidden="true"></i> Reply</a> </div>
                            </div>
                        </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            </div>
            
            @auth
                <!--Comments-Form-->
                <div class="comment-respond">
                    <h5>Leave A Comment</h5>
                    <form action="{{ route('forums.store') }}" method="post" class="comment-form" enctype="multipart/form-data">
                    @csrf
                        <div style="display:none;" class="form-group">
                            <input class="form-control" name="author_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div style="display:none;" class="form-group">
                            <input class="form-control" name="thread_id" value=" {{ $thread->id }}">
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" name="content" rows="5" placeholder="Comment" required></textarea>
                        </div>
                        <div class="form-group">
                        <button class="btn" type="submit">Post Comment<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                    </form>
                </div>
            @endauth

        </div>
        
        <!--Side-bar-->
        <aside class="col-lg-3 col-md-4">
            <div class="sidebar_widget">
            <div class="widget_heading">
                <h5>Search</h5>
            </div>
            <div class="blog_search">
                <form  action="{{ route('forums.search') }}" method="post" class="comment-form" enctype="multipart/form-data">
                @csrf
                <input class="form-control" name="thread_title" type="text" placeholder="Search...">
                <button type="submit" class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            </div>
            <div class="sidebar_widget">
            <div class="widget_heading">
                <h5>Popular Posts</h5>
            </div>
            <div class="popular_post">
                <ul>
                <li>
                    <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                    <div class="popular_post_title"> <a href="#">At vero eos et accusamus et iusto odio dignissimos.</a> </div>
                </li>
                <li>
                    <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                    <div class="popular_post_title"> <a href="#">On the other hand, we denounce with righteous.</a> </div>
                </li>
                <li>
                    <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                    <div class="popular_post_title"> <a href="#">But I must explain to you how all this mistaken idea.</a> </div>
                </li>
                <li>
                    <div class="popular_post_img"> <a href="#"><img src="assets/images/200x200.jpg" alt="image"></a> </div>
                    <div class="popular_post_title"> <a href="#">Nor again is there anyone who loves or pursues.</a> </div>
                </li>
                </ul>
            </div>
            </div>
            <div class="sidebar_widget">
            <div class="widget_heading">
                <h5>Categories</h5>
            </div>
            <div class="categories_list">
                <ul>
                <li><a href="#">Trends</a></li>
                <li><a href="#">The Works</a></li>
                <li><a href="#">Hand Wash</a></li>
                <li><a href="#">General</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Auto Detail</a></li>
                <li><a href="#">Motorbikes</a></li>
                <li><a href="#">Compacts</a></li>
                <li><a href="#">Vans & Trucks</a></li>
                <li><a href="#">Buy a car</a></li>
                <li><a href="#">Sell your Car</a></li>
                <li><a href="#">Car Land</a></li>
                <li><a href="#">Car Showrooms</a></li>
                </ul>
            </div>
            </div>
            <div class="sidebar_widget">
            <div class="widget_heading">
                <h5>Tag Widget</h5>
            </div>
            <div class="tag_list">
                <ul>
                <li><a href="#">Trends</a></li>
                <li><a href="#">The Works</a></li>
                <li><a href="#">Auto Detail</a></li>
                <li><a href="#">Motorbikes</a></li>
                <li><a href="#">Compacts</a></li>
                <li><a href="#">Buy a car</a></li>
                <li><a href="#">Vans & Trucks</a></li>
                <li><a href="#">Car Land</a></li>
                <li><a href="#">Sell your Car</a></li>
                <li><a href="#">Sedans</a></li>
                </ul>
            </div>
            </div>
        </aside>
        <!--/Side-bar--> 
        
        </div>
    </div>
    </section>
    <!-- /Our-Blog--> 

    <!--Brands-->
        <section class="brand-section gray-bg">
            <div class="container">
                <div class="brand-hadding">
                <h5>Popular Brands</h5>
                </div>
                <div class="brand-logo-list">
                <div id="popular_brands">
                    @foreach($brands as $brand)
                        <div class="brand"><a href="#"><img src="{{ asset($brand->file_path_picture) }}" class="img-responsive" alt="image"></a></div>
                    @endforeach


                </div>
                </div>
            </div>
        </section>
    <!-- /Brands-->

    @auth
        <div class="modal fade" id="reply">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Reply</h4>
                </div>
                <form action="{{ route('forums.store') }}" method="post" class="comment-form" enctype="multipart/form-data">
                    @csrf
                    <div >
                        
                        <div style="display:none;" class="form-group">
                            <input class="form-control" name="author_id" value="{{ Auth::user()->id }}">
                        </div>
                        <div style="display:none;"  class="form-group">
                            <input class="form-control" name="thread_id" value=" {{ $thread->id }}">
                        </div>
                        <div style="display:none;"  class="form-group">
                            <input class="form-control" id="post_id" name="post_id" value="">
                        </div>
                        
                        <textarea class="form-control" name="content" rows="5" placeholder="Comment"></textarea>
                        
                        
                    
                    </div>
                    <div>
                        <br>
                        <div class="form-group">
                            <button class="btn" type="submit">Post Comment<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>

    @endauth




@endsection