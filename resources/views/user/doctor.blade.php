
<div class="page-section" id="doctors">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp">Our Doctors</h1>
      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
        @foreach($user as $users)
       @foreach($doctor as $doctors)
       @if ($doctors->id == $users->id)
        <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img height="300 px" src="doctorimage/{{$doctors->image}}" style="max-width:100%;height:auto;" alt="">
              
            </div>
            <div class="body">
              <p class="text-xl mb-0">{{$users->name}} {{$users->lname}}</p>
              <span class="text-sm text-grey">{{$doctors->speciality}}</span>
              <br>
              <span class="text-sm text-grey">Working Hours: {{$doctors->working_hours}}</span>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        @endforeach
      </div>
    </div>
  </div>