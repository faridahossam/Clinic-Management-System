@extends('frontend.master2')

@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#doctors">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="#news">News</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#appointment">Make an Appointment</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="http://localhost/diagnosis/index.php">Free Symptoms Checker</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#footer">Contact Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/myappointment')}}" >My Appointments</a>
            </li> 
            <x-app-layout></x-app-layout>
            </li>
            
            
@stop
@section('content')
<div class="container">
<h1 class="text-center wow fadeInUp" style="font: size 200px;">My Infomation</h1>
<form class="main-form" action="{{url('submiteditform')}}" method="POST"  enctype="multipart/form-data">
@csrf
@foreach($user as $user)
<div class="row mt-5 ">
         <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label class="label" for="html">First Name</label>
            <input type="text" name="fname" value="{{$user->name}}" class="form-control" required="" placeholder="First name" >
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <label class="label" for="html">Last Name</label>
            <input type="text" name="lname" class="form-control" value="{{$user->lname}}" required="" placeholder="Last name">
          </div>
          
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Phone Number</label>
          <input type="text" name="phone_no" class="form-control" pattern="0[0-9]{3}[0-9]{3}[0-9]{4}" value="{{$user->phone_no}}" required="" placeholder="Email address..">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
          <label class="label" for="html">Gender</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
           <select  name="gender" id="departement" placeholder="Gender"class="custom-select">
              <option value="{{$user->gender}}">{{$user->gender}}</option>
              <option value="female">Female</option>
              <option value="male">Male</option>
            </select>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInleft">
          <label class="label" for="html">Date of Birth</label>
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
          <input type="date" style="color:black;" value="{{$user->date_of_birth}}" name="date_of_birth" required=""  min="1900-01-01" max="{{$date}}">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
          <label class="label" for="html">Address</label>
            <input type="text" name="address" id="address" value="{{$user->address}}" class="form-control" required="" rows="6"  ></input>
          </div>
          
</div>
<button type="submit" id="submit" class="btn btn-primary mt-3 wow zoomIn">Submit</button>
</form>
@endforeach
</div>
@stop