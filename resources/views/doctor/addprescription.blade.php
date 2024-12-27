@extends('frontend.master2')
@section('itemsInNavBar')
            <li class="nav-item active">
            <a class="nav-link" href="{{url('home')}}" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('view_patients')}}" >Today's Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" >Add Prescription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('mypatients')}}">My Patients</a>
            </li>
            <li class="nav-item active">
            <x-app-layout></x-app-layout>
            </li>          
            
@stop
@section('content')

<div class="page-section">

    <div class="container" >
   
    </br>
    <div class="prescription" style="border:double; width:60%;  margin: auto; align-items: center;">
    </br></br>
    <div id="print-content">
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Medica Health Center</h1>
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Dr {{$data2->name}} {{$data2->lname}}</h1>

    </div>
      @if($user_id != null)
      <form class="main-form" action="{{url('save_prescription',[$user_id])}}" method="POST">
      @else
      <form class="main-form" action="{{url('save_prescription',['0'])}}" method="POST" style="  margin-left: 5%;  margin-right: 5%; " >
      @endIf
          @csrf
        <div class="row mt-5 ">
        
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Date : </label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
        <input type="text" name="date_of_examination" id="date_of_examination" value="{{$date}}" class="form-control" readonly="readonly">
            
        </div>
        @if($patient_name != null)
         <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Name :</label>
         </div>
         <div class="col-12 col-sm-6 py-2 wow fadeInRight">
         <input type="text" name="name" required="" value="{{$patient_name}}" class="form-control" >
        </div>

        @else
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft"  data-wow-delay="300ms">
            <label for="html">Name :</label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text"id="name" name="name" required="" class="form-control" >
          </div>
        @endif
       
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Diagnosis :</label>
        </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="diagnosis" id="diagnosis" required=""class="form-control" rows="6" ></textarea>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Medication :</label>
        </div>
        
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <textarea name="medicine" id="medicine" required="" class="form-control" placeholder="Medicine"></textarea>
          </div>
       
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="dosage" id="dosage" required="" class="form-control" placeholder="Dosage">
          </div>

        
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Next Appointment :</label>
        </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="date"  name="next_appointment_date" id="next_appointment_date" required="" min="{{$date}}" class="form-control">
          </div>
          
      </div>
      <button type="submit" class="btn btn-primary"  style=" width:60%;  margin-left:20%;">Save</button>
      </br></br>    
     </div>
    </form>
    </div>
  </div> <!-- .page-section -->
  <div  >
        
        </br></br>
        <button class="btn btn-primary"  style=" width:60%;  margin-left:20%;" onclick="printDiv('print-content')">Print</button>
     </div>
     </br></br>
  <script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        w=window.open();
        w.document.write(printContents);
        let fname = $('#name').val();
        let medicine = $('#medicine').val();
        let dosage = $('#dosage').val();
        let diagnosis = $('#diagnosis').val();
        let date_of_examination = $('#date_of_examination').val();
        let next_appointment_date=$('#next_appointment_date').val();
        w.document.write("Date of Examination:</br>");
        w.document.write(date_of_examination);
        w.document.write("</br></br></br> Name:</br>");
        w.document.write(fname);
        w.document.write("</br></br></br> Diagnosis:</br>");
        w.document.write(diagnosis);
        w.document.write("</br></br></br> Medicine:</br>");
        w.document.write(medicine);
        w.document.write("</br></br></br> Dosage:</br>");
        w.document.write(dosage);
        w.document.write("</br></br></br> Next Appointment:</br>");
        w.document.write(next_appointment_date);
        w.print();
        w.close();
    }
</script>
@stop

