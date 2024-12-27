@extends('frontend.master2')

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
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Medical Record</h1>

      <form class="main-form" action="{{url('add_record')}}" method="POST"  enctype="multipart/form-data">
          @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="diagnosis" class="form-control" placeholder="Diagnosis">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <select  name="blood_type" placeholder="Blood Type"class="custom-select">
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
          <input type="text" name="medicine" class="form-control" placeholder="Medicine">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="allergies" class="form-control" placeholder="Allergies">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="chronic_diseases"class="form-control" placeholder="Chronic Diseases">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="gender" id="departement" placeholder="Gender"class="custom-select">
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
          <div style="padding:20px; position: relative; left:50px;">
                   <label>Lab Results</label>
                   <input type="file" name="lab_file" required="">
                  </div>
          <div style="padding:20px; position: relative; left:50px;">
                   <label>Radiology Images</label>
                   <input type="file" name="rd_file" required="">
                  </div>
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->