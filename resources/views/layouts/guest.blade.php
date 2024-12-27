@extends('frontend.master')
@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>

body {font-family: Arial, Helvetica, sans-serif;
}
div {
  border-radius: 5px;
  padding: 2px;
  text-align:center;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=email],select {
  width: 95%;
  padding: 10px 4px ;
  margin: 1px 0 t;
  display: inline-block ;
  border: 1px solid #ccc ;
  border-radius: 4px ;
  box-sizing: border-box;
  position: relative;
}

input[type=radio], select {
  display: inline-block;
  border: 0.5px solid #ccc;
  position: relative;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D !important;
  color: white !important;
  padding: 14px 20px !important;
  margin: 8px 0 !important;
  border: none !important;
  cursor: pointer !important;
  width: 60% !important;
  position:  relative !important;
}

button:hover {
  opacity: 0.8 !important;
}


/*The Modal (background)*/
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 100%; /* Could be more or less, depending on screen size */
  height: 100%; /* Full height */
  text-align: left;
}
/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
}
            </style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
@stop