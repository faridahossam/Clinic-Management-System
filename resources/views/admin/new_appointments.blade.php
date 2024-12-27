<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    @include('admin.adminmaster')
    <title>Appointments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
      
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    <style>
     
    
            td.fc-day.fc-past {
             background-color: #EEEEEE;
            }
   
            label
            {
              width: 100%;
              margin: 8px 0;
              display: inline-block;
            
            }
            input
            {
              width: 60%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
              
            }
            input[type=submit] {
            width: 40%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
             }
            .modal-content{
            width: 50%;
            padding: 50px;
            margin-left: auto;
            margin-right: auto;
          }

</style>
</head>
<body>
<div class="container-scroller">
@include('admin.sidebar')
@include('admin.navbar') 
<div class="container">
    <br />
    
    
    <h1 class="text-center text-primary" style="font-size:5vw">Appointments</h1>
    <br />
    Please Choose The Doctor:
    <select  name="doctor" id="doctor" onchange="doctorChosen()" class="custom-select">
    @foreach($doctors as $doctors)
        <option value="{{$doctors->id}}">Dr {{$doctors->name}} {{$doctors->lname}}</option>
    @endforeach
    </select><button class="btn btn-success button" id="button" type="button">Go</button>
    
    <div id="myModal" class="modal">
    <div class="modal-content" style="overflow:scroll;height:80%;">
        <span class="close" id="close">&times;</span>
       
        <form class="main-form" id="SubmitForm" >
          @csrf
          <div class="alert alert-success" role="alert" id="failMsg" style="display: none" >
                Failed booking appointment please check you filled all information! 
           </div>
          <h1 class="header" >Make an Appointment on <input type="text" name="date" id="date" readonly="readonly" class="form-control" ></h1>

          <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label class="label" for="html">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control" required="" placeholder="First name">
            <span class="text-danger" id="fnameErrorMsg"></span>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <label class="label" for="html">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control" required="" placeholder="Last name">
            <span class="text-danger" id="lnameErrorMsg"></span>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Email</label>
          <input type="text" name="email" id="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  required="" placeholder="Email address..">
          <span class="text-danger" id="emailErrorMsg"></span>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Phone Number</label>
            <input type="text" name="phone" id="phone" required="" class="form-control" placeholder="Phone Number....">
            <span class="text-danger" id="phoneErrorMsg"></span>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Address</label>
            <textarea name="address" id="address" class="form-control" rows="6" required="" placeholder="Address....."></textarea>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="gender" id="gender" placeholder="Gender"class="custom-select">
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label class="label" for="html">Date of Birth :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
              <input type="date" style="color:black;" name="date_of_birth" id="date_of_birth" required="" min="1900-01-01" max="{{$date}}"  >
          </div>
            
          <input type="text" name="doctor_id"  style=" visibility: hidden;position: absolute;" id="doctor_id" class="form-control" >
            
            <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
             <label class="label" for="html">Time : </label>
            </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <select  name="time" id="time" placeholder="time"class="custom-select">
          <?php 
            for($hours=10; $hours<22; $hours++) // the interval for hours is '1'
            for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
                //echo 
               
                echo '<option value="'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'">'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>'
         ?>

           
          
          </select>
          </div>
          
           <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
          </div>
        </form>
    </div>
    </div>
    <div id="myInformation" class="modal">
    <div class="modal-content" style="overflow:scroll;height:80%;">
        <span class="close" id="closeInformation">&times;</span>
        <form class="main-form" id="EditForm" >
        <h1 class="header" >Appointment # <input type="text" name="id_info" readonly="readonly" id="id_info" class="form-control" > </h1>
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label class="label" for="html">First Name:</label>
          <input type="text" name="f_name_info" readonly="readonly"  id="f_name_info" class="form-control" >
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <label class="label" for="html">Last Name:</label>
          <input type="text" name="l_name_info" readonly="readonly"  id="l_name_info" class="form-control" >
          </div>

          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Phone Number:</label>
          <input type="text" name="phone_no_info" readonly="readonly"  id="phone_no_info" class="form-control" >
          </div>

          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Email:</label>
          <input type="text" name="email_info" readonly="readonly" id="email_info" class="form-control" >
          </div>
         

         
          

          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
             <label class="label" for="html">Time : </label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
          <select  name="time_info" id="time_info" placeholder="time"class="custom-select">
          <?php 
            for($hours=10; $hours<22; $hours++) // the interval for hours is '1'
            for($mins=0; $mins<60; $mins+=15) // the interval for mins is '30'
                //echo 
               
                echo '<option value="'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'">'.str_pad($hours,2,'0',STR_PAD_LEFT).':'
                .str_pad($mins,2,'0',STR_PAD_LEFT).'</option>'
         ?>

           
          
          </select>
          <input type="text" name="date_info" style=" visibility: hidden;position: absolute;"  id="date_info" class="form-control" >
          <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Edit</button>
          <button id="deleteButton" class="btn btn-primary mt-3 wow zoomIn">Delete</button>
          </div>
          </form>
          
          </div>

          
        
       
          
    </div>
    </div>
    <div id="appointment-requests" style="padding-bottom: 100px;"><div>
    <div id="appointments"><div> 
    <div id="calendar"></div>

</div>
</div>  
<script>

var modalObject = document.getElementById("myModal");
var modalObjectInformation = document.getElementById("myInformation");
var spanObject = document.getElementById("close");
var spanObjectInformation = document.getElementById("closeInformation");

$('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let fname = $('#fname').val();
    let lname = $('#lname').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let address = $('#address').val();
    let gender = $('#gender').val();
    let date_of_birth = $('#date_of_birth').val();
    let doctor_id = $('#doctor_id').val();
    let time = $('#time').val();
    let date = $('#date').val();
    
    $.ajax({
      url: "/submit-form",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        fname:fname,
        lname:lname,
        email:email,
        phone:phone,
        gender:gender,
        address:address,
        date_of_birth:date_of_birth,
        doctor_id:doctor_id,
        time:time,
        date:date,
      },
      success:function(response){
        $('#successMsg').show();
        console.log(response);
        $('#calendar').fullCalendar('refetchEvents');
        modalObject.style.display="none";
      },
      error: function(response) {
        $('#failMsg').show();
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#fnameErrorMsg').text(response.responseJSON.errors.fname);
        $('#lnameErrorMsg').text(response.responseJSON.errors.lname);
        $('#phoneErrorMsg').text(response.responseJSON.errors.phone);
        
      },
     
      });
      
    });

  $('#EditForm').on('submit',function(e){
    e.preventDefault();

    
    let time = $('#time_info').val();
    let id = $('#id_info').val();
    let date = $('#date_info').val();
    
    $.ajax({
      url: "/edit-form",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        id:id,
        date:date,
        time:time,
      },
      success:function(response){
        $('#successMsg').show();
        console.log(response);
        $('#calendar').fullCalendar('refetchEvents');
        modalObjectInformation.style.display="none";
      },
      
     
      });
      
  });

spanObject.onclick =function(){
    modalObject.style.display="none";
}
spanObjectInformation.onclick =function(){
    modalObjectInformation.style.display="none";
}

var doctor = $('#doctor').val();
function doctorChosen(){
    doctor = $('#doctor').val();
}
function getDoctor(){
    return doctor;
}

$(document).ready(function () {

$('#button').click(function(e) {
    //console.log(getDoctor());
    $('#calendar').fullCalendar('refetchEvents');
})

$('#deleteButton').click(function(e) {
         let id = $('#id_info').val();
         $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    id:id,
                    type:"delete"
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Appointment Deleted Successfully");
                    modalObjectInformation.style.display="none";
                }
            })
})


$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});



var calendar = $('#calendar').fullCalendar({
    eventDataTransform: function(event) {
     //event.user_name = event.user_name;
     event.f_name = event.f_name;
     event.l_name = event.l_name;
     event.phone_no=event.phone_no;
     event.email=event.email;
     event.address=event.address;
     return event;
    },
    editable:true,
    header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay'
    },
    selectable:true,
    selectHelper: true,
    select:function(start, end, allDay)
    {
       var date_today= moment().format('Y-MM-DD');
       // $('#spanId').text(doctor);
       document.getElementById("doctor_id").value = doctor;
       var start_date = $.fullCalendar.formatDate(start, 'Y-MM-DD');
       document.getElementById("date").value = start_date;
       // $('#dateId').text(start_date);
       if (start_date >= date_today)
       {
        modalObject.style.display="block";
       }
       
        var date = new Date(start);
        var start_dateTime = $.fullCalendar.formatDate(start,'Y-MM-DD HH:mm:ss');
        document.getElementById("date_time").value = start_dateTime;
       
      /*  var title = prompt('Name:');
        if(title)
        {
        var ph_no = prompt('Phone Number :');
        

        if(ph_no)
        {
            var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
            var doctor = $('#doctor').val();

            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    user_name: title,
                    start: start,
                    phone_no: ph_no,
                    end: end,
                    doctor: doctor,
                    type: 'add'
                },
                success:function(data)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Created Successfully");
                }
            })
        }
    }*/
    },
    
    events: function(start,end,timezone,callback) {
      
      $.ajax({
        url: "/new_appointments",
        dataType: 'json',
        data: {
          doctor: getDoctor(),
        },
        success: function(doc) {
            var events = [];
            for (var i=0;i<doc.length;i++){
              events.push({
               
                title: doc[i].name.concat(" ", doc[i].lname),
                start: doc[i].start,
                id:doc[i].id,
                f_name:doc[i].name,
                l_name:doc[i].lname,
                phone_no:doc[i].phone,
                email:doc[i].email,
                //address:doc[i].address,
              })//this is displaying!!!
            }
            callback(events);
        },
      });
    },
    selectable:true,
    selectHelper: true,
    eventClick:function(event)
    {
        modalObjectInformation.style.display="block";
        document.getElementById("id_info").value = event.id;
        document.getElementById("f_name_info").value = event.f_name;
        document.getElementById("l_name_info").value = event.l_name;
        document.getElementById("phone_no_info").value = event.phone_no;
        document.getElementById("email_info").value = event.email;
        
       /* var id = event.id;
        console.log(id);*/
        var time = event.start.toString();
        time = time.split(" ")[4].slice(0, -3);
        
        document.getElementById("time_info").value = time;
        var start_date = $.fullCalendar.formatDate(event.start, 'Y-MM-DD');
        document.getElementById("date_info").value = start_date;

       /* if(confirm("Do you want to remove this appointment?"))
        {
           
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    id:id,
                    type:"delete"
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Appointment Deleted Successfully");
                }
            })
        }*/
    },
    eventConstraint: {
            start: moment().format('Y-MM-DD HH:mm:ss'),
            end: '2100-01-01' // hard coded goodness unfortunately
    },
    
   
    eventResize: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.user_name;
        var id = event.id;
        $.ajax({
            url:"/full-calender/action",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated Successfully");
            }
        })
    },
    eventDrop: function(event, delta)
    {
        var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
        var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
        var title = event.title;
        var id = event.id;
        $.ajax({
            url:"/full-calender/action",
            type:"POST",
            data:{
                title: title,
                start: start,
                end: end,
                id: id,
                type: 'update'
            },
            success:function(response)
            {
                calendar.fullCalendar('refetchEvents');
                alert("Event Updated Successfully");
            }
        })
    },

    
  
});

});



  
</script>
</body>
</html>
</x-app-layout>