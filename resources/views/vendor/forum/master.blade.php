@extends( (Auth::user()->hasRole('superadministrator')) ? 'Administrator.layouts.sidebar' : 'layouts.main')
@section('contentDashboard')


    @if (Auth::user()->hasRole('superadministrator'))

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                
            @include('forum::partials.alerts')

            @yield('content')
            </div>
        </div>

    @else



    <!--Page Header-->
    <section class="page-header blog_page">
    <div class="container">
        <div class="page-header_wrap">
        <div class="page-heading">
            <h1>Our Blog</h1>
        </div>
        <ul class="coustom-breadcrumb">
            <li><a href="#">Home</a></li>
            <li>Our Blog</li>
        </ul>
        </div>
    </div>
    <!-- Dark Overlay-->
    <div class="dark-overlay"></div>
    </section>
    <!-- /Page Header--> 

    @include('forum::partials.alerts')
    

    <!--Our-Blog-->
    <section class="our_blog">
    <div class="container">
        <div class="row">
        <div class="col-lg-9 col-md-8"> 
        @yield('content')




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
            <div class="sidebar_widget">
            <div class="widget_heading">
                <h5>Search Blog</h5>
            </div>
            <div class="blog_search">
                <form action="#" method="get">
                <input class="form-control" name="#" type="text" placeholder="Search...">
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

    @endif







    <div class="mask"></div>


@endsection
