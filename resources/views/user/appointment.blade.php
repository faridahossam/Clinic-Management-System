<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  * {
  box-sizing: border-box;
}
            label
            {
              padding: 12px 12px 12px 0;
              display: inline-block;
              
            }
            input, select, textarea
            {
              width: 100%;
              padding: 12px;
              border: 1px solid #ccc;
              border-radius: 4px;
              resize: vertical;
            }
            input[type=submit] {
            width: 60%;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            
             }
             .container {
          border-radius: 5px;
          padding: 20px;
        }
             .header {
           text-align: center;
           color: black;
           font-size: 40px;
           font-family:Arial;
            }
            /* #formid
            {
              display:inline-block; 
              position: relative;
              left: 30%;
            } */
     
     td.fc-day.fc-past {
      background-color: #EEEEEE;
     }
     .modal-content{
     width: 50%;
     padding: 50px;
     margin-left: auto;
     margin-right: auto;
   }
   .modal{
     margin-top: 150px;
   }
   /* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<body>
<div class="page-section" id="appointment">
    <div class="container">
    @if(session()->has('message'))
     
     <div class="alert alert-success">
     <button type="button" class="close" data-dismiss="alert">
          x
     </button>
    {{session()->get('message')}}
     </div>

@endif
      <h1 class="header" >Make an Appointment</h1>

      <form class="main-form" id="formid" action="{{url('appointment')}}" method="POST">
          @csrf
        <div class="row mt-5 ">
         @if(Route::has('login'))
          @auth
          @else
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label class="label" for="html">First Name</label>
            <input type="text" name="fname" class="form-control" required="" placeholder="First name" >
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <label class="label" for="html">Last Name</label>
            <input type="text" name="lname" class="form-control"  required="" placeholder="Last name">
          </div>
         
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Email</label>
          <input type="text" name="email" class="form-control" pattern="[^ @]*@[^ @]*"  required="" placeholder="Email address..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Phone Number</label>
            <input type="text" name="phone"class="form-control" pattern="0[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="Phone Number....">
          </div>
          @endauth
          @endif
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Address</label>
            <textarea name="address" id="address" class="form-control" required="" rows="6" placeholder="Address....."></textarea>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="gender" id="departement" placeholder="Gender"class="custom-select">
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Please Choose Your Doctor :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="doctor" id="doctor" required="" onchange="doctorChosen()" class="custom-select">
            <option value="">Choose Doctor</option>
            @foreach($user as $users)
             @foreach($doctor as $doctors)
             @if ($doctors->id == $users->id)
              <option value="{{$doctors->id}}">{{$users->name}} {{$users->lname}}
            &#8594 {{$doctors->speciality}}</option>
             @endif
             @endforeach
                @endforeach
            </select>
          </div>
          
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Date of birth :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">  
              <input type="date" style="color:black;" name="date_of_birth" required=""  min="1900-01-01" max="{{$date}}">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Date</label>
            <input type="date" min="{{$date}}" id="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Time :</label>
          </div>
          <button class="btn btn-primary mt-3 wow zoomIn" id="button" type="button">See Available Time</button>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <select  name="time" id="times" required="" placeholder="time"class="custom-select">
          <!-- 
            for($hours=10; $hours<22; $hours++) // the interval for hours is '1'
            for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
                //echo 
               
                echo '<option value="'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'">'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>'
          -->
          <option value="">--:--</option>
         
          </select>
          </div>
      </div>
      <div>
        
      </div>
        <button type="submit" id="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  
  <div id="myInformation" class="modal">
    <div class="modal-content" style="overflow:scroll;height:20%;">
        <span class="close" id="closeInformation">&times;</span>
        <form class="main-form" id="SubmitForm" >
          @csrf
        </form>
  </div>
  </div>
  
  </div> <!-- .page-section -->
  <script src="../assets/js/jquery-3.5.1.min.js"></script>
<script>
  

var modalObjectInformation = document.getElementById("myInformation");
var spanObjectInformation = document.getElementById("closeInformation");
var arr = [];
var taken_times=[];
let start_time=12;
let end_time=14;
var select = document.getElementById("times");
function doctorChosen(){
    while (select.options.length > 0) {
        select.remove(0);
    }
    let doctor = $('#doctor').val();
    let date = $('#date').val();
    $.ajax({
      url: "/send-start-end",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        doctor:doctor,
        date:date,
      },
      success:function(response){
        for (var i=0;i<response.length;i++){
          let text=response[i].working_hours;
          const myArray = text.split("-");
          start_time=parseInt(myArray[0]);
          end_time=parseInt(myArray[1]);
          //console.log(start_time);
          //console.log(end_time);
          arr=[];
         for (var hours = start_time; hours < end_time ; hours++) {
              for (var mins = 0; mins < 60; mins+=15) {
                   var arr_value= hours+":"+mins;
                   if (mins==0)
                   {
                     arr_value= hours+":"+mins+"0";
                   }
                   arr.push(arr_value);
    
              }
         }
        }
        
      },
      error: function(response) {
        console.log("fail");
      },
    })
    
}
spanObjectInformation.onclick =function(){
    modalObjectInformation.style.display="none";
}

  $('#button').click(function(e) {
    //modalObjectInformation.style.display="block";
    taken_times=[];
    while (select.options.length > 0) {
        select.remove(0);
    }
    let date = $('#date').val();
    let doctor = $('#doctor').val();
    $.ajax({
      url: "/send-date",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        date:date,
        doctor:doctor,
      },
      success:function(response){
        for (var i=0;i<response.length;i++){
          //console.log(response[i].time);
          taken_times.push(response[i].time);
        }
        const newarr = arr.filter(val => !taken_times.includes(val));
        for(var i = 0; i < arr.length; i++) {
          var el = document.createElement("option");
          el.textContent = newarr[i];
          el.value = newarr[i];
          select.appendChild(el);
        }
        //modalObject.style.display="none";
      },
      error: function(response) {
        console.log('fail');
        for(var i = 0; i < arr.length; i++) {
          var el = document.createElement("option");
          el.textContent = arr[i];
          el.value = arr[i];
          select.appendChild(el);
        }
        
      },
     
      })
      
   
})
</script>
  </body>
  @section('scriptcontent')
<script type="text/javascript">
    $('#submit').click(function() {
        // get the selected option and remove it from the DOM
        $('#times option:selected').remove();
    });
  </script>
@stop