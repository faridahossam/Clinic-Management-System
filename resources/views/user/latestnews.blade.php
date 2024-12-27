<div class="page-section" id="news">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">
        @foreach($post as $posts)
        <div class="col-lg-4 py-2 wow zoomIn">
          <div class="card-blog">
            <div class="header">
            <img style="max-width:100%;height:auto;" src="postimage/{{$posts->image}}" alt="">
            </div>
            <div class="body">
            <p class="text-xl mb-0">{{$posts->title}}</p>
              <span class="text-sm text-grey">{{$posts->description}}</span>
          </div>
       </div>
      </div> 
      @endforeach
       </div>
    </div>
  </div>