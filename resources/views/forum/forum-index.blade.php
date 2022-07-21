@extends('layouts.main')

@section('content')
<!--Page Header-->
<section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Forum</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Forum</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Our-Blog-->
<section class="our_blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-8"> 

        <!--article-1-->
        @foreach($threads as $thread)
        <article class="article_wrap">
          <div class="article_img"> 
            <div class="articale_header">
              <h2><a href="{{ route('forums.thread', $thread->id) }}">{{ $thread->title }}</a></h2>
              <div class="article_meta">
                <ul>
                  <li><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $thread->first_name }}</li>
                  <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{date_format($thread->created_at,"d M Y")  }} </li>
                  <li><i class="fa fa-tags" aria-hidden="true"></i> {{$thread->category_name}}</li>
                  <li><i class="fa fa-comment" aria-hidden="true"></i> <a href="{{ route('forums.thread', $thread->id) }}">{{$thread->reply_count}} Comments</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="article_info">
            <p> {!!  str_replace("\n", '<br>' ,$thread->content)  !!} </p>
            <div class="row" >
            <div style="display: inline;" class="col-sm">
              <a href="{{ route('forums.thread', $thread->id) }}" class="btn">More <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
            </div>
            @if(Auth::user()->id == $thread->author_id)
            <div style="display: inline;" class="col-sm">
              <a  href="#editThread" onclick="" class="btn " data-toggle="modal">Edit</a>
            </div>

            <div class="modal fade" id="editThread">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Update Topic or Questions </h4>
                  </div>
                  <form action="{{ route('forums.thread.update') }}" method="post" class="comment-form" enctype="multipart/form-data">
                      @csrf
                      <div >
                          
                          <div style="display:none;" class="form-group">
                              <input class="form-control" name="author_id" value="{{ Auth::user()->id }}">
                          </div>

                          <div style="display:none;" class="form-group">
                              <input class="form-control" name="thread_id" value="{{ $thread->id }}">
                          </div>

                          <div style="display:none;" class="form-group">
                              <input class="form-control" name="first_post_id" value="{{ $thread->first_post_id }}">
                          </div>

                          <div  class="form-group">
                              <input class="form-control" name="title" value="{{$thread->title}}" placeholder="Title">
                          </div>

                          <div  class="form-group">
                              <select class="form-control" name="category_id" id="cars" placeholder="Category">
                                @foreach($categories as $categorie)
                                  <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                @endforeach
                              </select>
                          </div>
                          
                          <textarea class="form-control" name="content" rows="5" placeholder="Description">{{$thread->content}}</textarea>
                          
                          
                      
                      </div>
                      <div>
                          <br>
                          <div class="form-group">
                              <button class="btn" type="submit">Update<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                          </div>
                      </div>
                  </form>
              </div>
              </div>
            </div>
            @endif
          </div>
          </div>
          
        </article>
        @endforeach

        
        
        
        <div class="pagination">
          <ul>
            <li class="current">1</li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
          </ul>
        </div>
      </div>
      
      <!--Side-bar-->
    <aside class="col-lg-3 col-md-4">
          @auth
              <div > <a  style="width:100%;" href="#newThread" onclick="" class="btn " data-toggle="modal">Add Topic</a> </div>
              <br/>
          @endauth
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
                @foreach($popularThreads as $popularThread)
                <li>
                    <div class="popular_post_img"> <a href="{{ route('forums.thread', $popularThread->id) }}"><img src="assets/images/thread.png" alt="image"></a> </div>
                    <div class="popular_post_title"> <a href="{{ route('forums.thread', $popularThread->id) }}">{{$popularThread->title}}</a> </div>
                </li>
                @endforeach
            </ul>
        </div>
        </div>
        <div class="sidebar_widget">
        <div class="widget_heading">
            <h5>Categories</h5>
        </div>
        <div class="categories_list">
            <ul>
            @foreach($categories as $categorie)
                <li><a href="{{ route('forums.category', $categorie->id) }}">{{$categorie->title}}</a></li>
            @endforeach
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
        <div class="modal fade" id="newThread">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Topic or Questions </h4>
                </div>
                <form action="{{ route('forums.thread.store') }}" method="post" class="comment-form" enctype="multipart/form-data">
                    @csrf
                    <div >
                        
                        <div style="display:none;" class="form-group">
                            <input class="form-control" name="author_id" value="{{ Auth::user()->id }}">
                        </div>


                        <div  class="form-group">
                            <input class="form-control" id="post_id" name="Title" value="" placeholder="Title">
                        </div>
                        <div  class="form-group">
                            <select class="form-control" name="category_id" id="cars" placeholder="Title">
                              @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                              @endforeach
                            </select>
                        </div>
                        
                        <textarea class="form-control" name="content" rows="5" placeholder="Description"></textarea>
                        
                        
                    
                    </div>
                    <div>
                        <br>
                        <div class="form-group">
                            <button class="btn" type="submit">Post<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>

    @endauth



@endsection
