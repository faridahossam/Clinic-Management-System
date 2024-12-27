@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/new_appointments')}}">My Dashboard</a>
            </li>
            <li class="nav-item">
           
            </li>
            
           
            
            
@stop
@section('content')

<body>

<div id="google_translate_element"></div>
  <div class="page-hero bg-image " style="background-image: url(../assets/img/doc.jpg); ">
    <div class="hero-section">
      <div class="container text-center wow zoomIn" style="color:black;">
        <span class="header"  >Let's make your life happier</span>
        <h1 class="header"  >Healthy Living</h1>
      </div>
    </div>
  </div>


  <!-- .page-section -->
    <div class="page-section pb-0" id="aboutus">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>Welcome to Your Health <br> Center</h1>
            <p class="text-grey mb-4">We offer you great services that would ease your boring routine of managing the health clincs appointments,news and work</p>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="../assets/img/bg-doctor.png" style="max-width:100%;height:auto;" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> <!-- .bg-light -->

  
  <div class="page-section" id="news">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest News</h1>
      <div class="row mt-5">
      <a class="btn" id="edit" href="{{ url('/add_post_view') }}"  target="_blank" style="background-color: #e7e7e7; width:100%; color: black;">Add a New Post</a>
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
          <a class="btn" id="edit" href="{{ url('update_post', $posts->id) }}"  target="_blank" style="background-color: #e7e7e7; width:100%; color: black;">Edit</a>
          <a  id="delete" href="{{ url('deletepost', $posts->id) }}"  target="_blank" class="btn btn-danger" style="width:100%;">Delete Post</a>
       </div>
      </div> 
      @endforeach
       </div>
    </div>
  </div>
 
   <!-- .banner-home -->
   <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}
  , 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
  @stop

@section('scriptcontent')
<script>
var modalObjectInformation = document.getElementById("myInformation");
var spanObjectInformation = document.getElementById("closeInformation");

$('#edit').click(function(e) {
  modalObjectInformation.style.display="block";
})

spanObjectInformation.onclick =function(){
    modalObjectInformation.style.display="none";
}


</script>
@stop