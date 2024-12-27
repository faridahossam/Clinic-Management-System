@extends('user.master')
@section('content')
<div class="page-section" id="appointment">
    <div class="container">
      <h1 class="text-center wow fadeInUp" style="font: size 200px;">Edit Appointment</h1>

      <form class="main-form" action="{{url('edit_appoint',$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
         <div class="row mt-5">
         <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="fname" class="form-control" placeholder="First name" value="{{$user->name}}" readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="lname" class="form-control" placeholder="Last name" value="{{$user->lname}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="text" name="email" class="form-control" placeholder="Email address.." value="{{$user->email}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="phone"class="form-control" placeholder="Phone Number...." value="{{$user->phone_no}}"readonly="readonly">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <input type="address" name="address"class="form-control" value="{{$patient->address}}"readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Date of Birth :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <input type="text" name="date_of_birth" id="date_of_birth"class="form-control"  value="{{$patient->date_of_birth}}"readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Gender :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
          <input type="text" name="gender" id="gender"class="form-control"  value="{{$patient->gender}}"readonly="readonly">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Please Choose Your Doctor :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select  name="doctor" id="departement" class="custom-select">
                
                @foreach($doctor as $doctors)
              <option value="{{$doctors->id}}">{{$doctors->name}}
            -->  speciality *{{$doctors->speciality}}*</option>
                @endforeach
            </select>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Date :</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <input type="date" min="{{$date}}" required="" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <label for="html">Time :</label>
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
          
         
      </div>
        <button type="submit" class="btn btn-primary mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->
  @stop