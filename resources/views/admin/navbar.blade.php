<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
#lagout{
  background-color:white;
  color:black;
}
@media screen and (max-width: 600px) {
  #nav.responsive {position: relative;}
  #nav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  #nav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  #lagout{
  background-color:white;
  color:black;
}
}
</style>
</head>
<div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_navbar.html -->
          <nav class="navbar p-0 fixed-top d-flex flex-row"id="nav" >
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" style="max-width:100%;height:auto;" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch"id="nav">
              <ul class="navbar-nav w-100" >
              <h1 style="text-align:left; font-size: 20px; color:#0059b3; font-family:Helvetica; ">Medica</h1>
            <!--    <li class="nav-item w-100">
                  <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                    <input type="text" class="form-control" placeholder="Search">
                  </form>
                </li>  -->
              </ul>
              <ul class="navbar-nav ml-auto">
               
            <li class="nav-item active">
              <a class="nav-link" href="/home" >Home Page</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/showdoctors">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/show_patients">Patients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/show_news">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="/new_appointments">Appointments</a>
            </li>
            <li>
                <x-app-layout id="logout">
                   </x-app-layout>
                </li>
            <!-- <li class="nav-item">
              <a class="nav-link " href="/view_records">Medical Records</a>
            </li> -->
                   
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
              </button>
            </div>
          </nav>
</html>