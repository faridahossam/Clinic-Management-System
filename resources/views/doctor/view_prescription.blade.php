@extends('frontend.master2')

@section('content')
@csrf
<div class="page-section">

    <div class="container" >
    
    </br>
    <div class="prescription" style="border:double; width:60%;  margin: auto; align-items: center;"id="print-content">
    </br></br>
      <h4 class="text-center wow fadeInUp" style="font: size 200px; color:grey;">Medica Health Center</h4>
      <h4 class="text-center wow fadeInUp" style="font: size 200px; color:grey;">Dr {{$doctor->name}} {{$doctor->lname}}</h4>
      <form class="main-form" action="{{url('save_prescription')}}" method="POST" style="  margin-left: 5%;  margin-right: 5%; " >
          @csrf
        <div class="row mt-5 ">
        
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Date : </label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
           {{$prescription->date_of_examination}}
        </div>

        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Patient's Name : </label>
        </div>
        <div class="col-12 col-sm-6 py-2 wow fadeInRight">
           {{$patient->name}}  {{$patient->lname}}
        </div>
      
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Diagnosis :</label>
        </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                  {{$prescription->diagnosis}}
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Medication :</label>
        </div>
        
        
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          {{$prescription->medicine}}
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html"></label>
        </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          {{$prescription->dosage}}
          </div>
       
         
        
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Next Appointment :</label>
        </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          {{$prescription->next_appointment_date}}
          </div>
         
      </div>
     
      </br></br>
     </div>
    </form>
    </div>
  </div> <!-- .page-section -->
  
  
   
 
  
@stop

