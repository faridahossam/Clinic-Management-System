@extends('frontend.master2')
@section('itemsInNavBar')
<body>
            <li class="nav-item active">
              <a class="nav-link" href="#" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('view_patients')}}" >Today's Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('addprescription')}}" >Add Prescription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('mypatients')}}">My Patients</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="http://localhost/diagnosis/index.php">Free Symptoms Checker</a>
            </li>
            <li class="nav-item active">
            <x-app-layout></x-app-layout>
            </li>
            
            
            
@stop
@section('content')

 @include('frontend.homecontent')

@stop