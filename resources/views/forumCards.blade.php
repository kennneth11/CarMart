<section class="section-padding">
    <div class="container">
      <div class="section-header text-center">
        <h2>Latest Topic In The Forum </h2>
        <p>An out forum is a place where people can exchange ideas on topics of interest. Its members can post discussions and read and respond to messages written by other participants. A forum can focus on various topics and usually develops a sense of virtual community among its members.</p>
      </div>
      <div class="row">

        @foreach($threads as $thread)
        <div class="col-md-4 col-sm-4">
          <article class="blog-list">
            <div class="blog-content">
              <h5><a href="{{ route('forums.thread', $thread->id) }}">{{ $thread->title }}</a></h5>
              <br/><br/>
              <div class="blog-info-box">
              <ul>
                <li><i class="fa fa-tags" aria-hidden="true"></i>{{$thread->category_name}}</li>
                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{date_format($thread->created_at,"d M Y")  }}</li>
                <li><a href="{{ route('forums.thread', $thread->id) }}"><i class="fa fa-comment-o" aria-hidden="true"></i>{{$thread->reply_count}} Comments</a></li>
              </ul>
              </div>
              <p> {!!  str_replace("\n", '<br>' ,$thread->content)  !!}</p>
              <a href="{{ route('forums.thread', $thread->id) }}" class="btn-link">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> 
            </div>
          </article>
        </div>
        @endforeach

      </div>
    </div>
  </section>
