@extends('frontend.master')        
@section('content')
<div class="page-section" >
    <div class="container">
    @if(session()->has('message'))
 
 <div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">
      x
 </button>
{{session()->get('message')}}
 </div>

@endif
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Set Your Medical Record</h1>

      <form class="main-form" action="{{url('add_record')}}" method="POST"  enctype="multipart/form-data">
          @csrf
        
         
                      
        <div class="row mt-5 ">
        
        <div class="col-12 col-sm-6 py-2 wow fadeInLeft">Weight(kg): </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          @if ($record!=null)
            <input type="text" name="weight" id="weight" class="form-control" value="{{$record->weight}}" required="" placeholder="Weight">
          @else
            <input type="text" name="weight" id="weight" class="form-control" required="" placeholder="Weight">
          @endif
          </div>

          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">Height(cm): </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          @if ($record!=null) 
            <input type="text" name="height" id="height" class="form-control" value="{{$record->height}}" required="" placeholder="Height">
          @else
            <input type="text" name="height" id="height" class="form-control" required="" placeholder="Height">
          @endif
          </div>
          
          @if ($record==null) 
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="gender" id="gender"  placeholder="Gender"class="custom-select">
            
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
          @endif
          
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">Blood Type: </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <select  name="blood_type" placeholder="Blood Type"  class="custom-select">
                       @if ($record!=null)
                       <option value="{{$record->blood_type}}">{{$record->blood_type}}</option>
                       @endif
                       <option value="O+">O+</option>
                       <option value="O-">O-</option>
                       <option value="A+">A+</option>
                       <option value="A-">A-</option>
                       <option value="B+">B+</option>
                       <option value="B-">B-</option>
                       <option value="AB+">AB+</option>
                       <option value="AB-">AB-</option>
                       </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          Please Enter Medication You are Taking:
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          @if ($record!=null)
          <input type="text" name="medicine" class="form-control" required="" value="{{$record->medicine}}" placeholder="Medicine">
          @else
          <input type="text" name="medicine" class="form-control" placeholder="Medicine">
          @endif
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
           Please Enter Your Alergies if exists (If Exists):
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          @if ($record!=null)
          <input type="text" name="allergies" class="form-control" required="" value="{{$record->allergies}}" placeholder="Allergies">
          @else
          <input type="text" name="allergies" class="form-control"  placeholder="Allergies">
          @endif
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
           Please Enter Any Chronic Diseases You Have (If Exists):
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          @if ($record!=null)
            <input type="text" name="chronic_diseases"class="form-control" required="" value="{{$record->chronic_diseases}}" placeholder="Chronic Diseases">
          @else
            <input type="text" name="chronic_diseases"class="form-control" placeholder="Chronic Diseases">
          @endif
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Lab Results(If Exists) :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
             <input type="file" name="lab_file" >
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Radiology Images(If Exists) :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <input type="file" name="rd_file" >
          </div>
          
          
         
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Next</button>
        
      </form>
      <a href="{{url('skip_medical_record')}}" class="btn btn-primary mt-3 wow zoomIn">Skip </a>
    </div>
  </div> <!-- .page-section -->
  
   
@stop