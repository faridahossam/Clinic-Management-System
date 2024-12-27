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
              <a class="nav-link" href="#" >My Appointments</a>
            </li> 
            <x-app-layout></x-app-layout>
            </li>
            
            
@stop
@section('content')


   <!-- ================Search Bar======================= -->
   <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
       
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h2 class="box-title">Hello!</h2>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success">{{$name}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Today's Date</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple">{{$date}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Upcomming Appointments</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info">{{$appointscount}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
               
                <!-- RECENT SALES -->
                <!-- ============================================================== -->

                
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">List of Appointments</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Time</th>
                                            <th class="border-top-0">Doctor</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Edit</th>
                                            <th class="border-top-0">Remove</th>
                                           
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $appoints)
                                        <tr>
                                           
                                            <td>{{$appoints->date}}</td>
                                            <td>{{$appoints->time}}</td>
                                            <td class="txt-oflo" >Dr. {{$appoints->name}} {{$appoints->lname}}</td>
                                            <td>{{$appoints->status}}</td>       
                                            <td><a class="btn btn-success button"  href="{{url('update_appoint',$appoints->id)}}"onclick="return confirm('Are you sure you want to edit this appointment')">Edit</a></td>
                                            </td>
                                            <td>
                                             <a class="btn btn-danger" href="{{url('delete_app',$appoints->id)}}"onclick="return confirm('Are you sure you want to cancel this appointment')">Cancel</a>
                                            </td>                              
                                        </tr>
                                     @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                
                <!-- ============================================================== -->
                 <!-- PRODUCTS YEARLY SALES -->
                <!-- ============================================================== -->
                <div name="record"  id="record" class="record">


                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
            <div class="row">
                    <!-- .col -->
            <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="card white-box p-0">
            <div class="card-body">
            <h3 class="box-title mb-0">My Record</h3>
            </div>
            <div class="comment-widgets">
            <!-- Comment Row -->
            @if ($record!=null)
            <div class="table-responsive">
            <table class="table no-wrap">
                <tbody>
                <tr>
                    <td>
                    <div class="d-flex flex-row comment-row p-3 mt-0">
                     <div class="comment-text ps-2 ps-md-3 w-100">
                     <h5 class="font-medium">Weight:</h5>
                       {{$record->weight}}
                     </div>
                     </div>
                    </td>
                    <td>
                    <div class="d-flex flex-row comment-row p-3 mt-0">
                     <div class="comment-text ps-2 ps-md-3 w-100">
                     <h5 class="font-medium">Height:</h5>
                       {{$record->height}}
                     </div>
                     </div>
                    </td>
                    <td>
                     <div class="d-flex flex-row comment-row p-3 mt-0">
                     <div class="comment-text ps-2 ps-md-3 w-100">
                     <h5 class="font-medium">Blood Type:</h5>
                       {{$record->blood_type}}
                     </div>
                     </div>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
            <div class="d-flex flex-row comment-row p-3 mt-0">
            <div class="comment-text ps-2 ps-md-3 w-100">
                    <h5 class="font-medium">Cronic Diseases:</h5> 
                       {{$record->chronic_diseases}}
            </div>
            </div>
            <div class="d-flex flex-row comment-row p-3 mt-0">
            <div class="comment-text ps-2 ps-md-3 w-100">
                    <h5 class="font-medium">Allergies:</h5>
                       {{$record->allergies}}
            </div>
            </div>
            <div class="d-flex flex-row comment-row p-3 mt-0">
            <div class="comment-text ps-2 ps-md-3 w-100">
                    <h5 class="font-medium">Current Medication:</h5>
                       {{$record->medicine}}
            </div>
            </div>

            

            <div class="d-flex flex-row comment-row p-3 mt-0">
            <div class="comment-text ps-2 ps-md-3 w-100">
                    <h5 class="font-medium">Lab Results:</h5>
            @if ($record->lab_results!=null)
            <a class="btn" href="labs/'.$record->lab_results.'" style="color:blue;text-decoration: underline;">view</a>
            @else
                     not available
            @endif

            </div>
            </div>

            <div class="d-flex flex-row comment-row p-3 mt-0">
            <div class="comment-text ps-2 ps-md-3 w-100">
                    <h5 class="font-medium">Radiology Image:</h5>
            @if ($record->radiology_image!=null)
            <a class="btn" href="labs/'.$record->radiology_image.'" style="color:blue;text-decoration: underline;">view</a>
            @else
                     not available
            @endif

            </div>
            </div>
            

            <div class="d-flex flex-row comment-row p-3 mt-0">
            @if ($p!=null)
            <table class="table no-wrap" >
                      <thead>
                <tr>
                     <th class="border-top-0">Date</th>
                    <th class="border-top-0">Speciality</th>
                    <th class="border-top-0">Doctor</th>
                    
                    <th class="border-top-0"></th>
                    
                </tr> 
                </thead>
                <tbody id="search_list">
                @foreach($p as $prescription)
                <tr>
                <td> {{$prescription->date_of_examination}}</td>
                <td> {{$prescription->speciality}}</td>
                <td>  Dr. {{$prescription->name}}  {{$prescription->lname}}</td>
                <td><a class="btn" href="{{url('view_prescription',$prescription->prescription_id)}}"  target="_blank" style="background-color: #e7e7e7; color: black;">View</a><td>
                </tr>
                @endforeach
                </tbody>
                </table>
            @else
            <div class="d-flex flex-row comment-row p-3">none  </div>
            @endif
            </div>
            <div class="d-flex flex-row comment-row p-3 mt-0">
            <a class="btn"href="{{url('addmedicalrecord')}}"  target="_blank" style="background-color: #e7e7e7; color: black;">Edit Record</a>
            </div>
            @else
            <div class="d-flex flex-row comment-row p-3 mt-0">
            <div class="comment-text ps-2 ps-md-3 w-100">
             You didn't set your record yet!
             <a class="btn" href="{{url('addmedicalrecord')}}"  target="_blank" style="background-color: #e7e7e7; color: black;">Add Record</a>
            </div>
            </div>
            @endif
            </div>
                </div>
                    </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
            <div class="card white-box p-0">
            <div class="card-heading">
            <h3 class="box-title mb-0">My Information</h3>
            </div>
            @foreach($patient as $patients)
            <div class="comment-widgets">
            <!-- Comment Row -->
            <div class="d-flex flex-row comment-row p-3">
            <div class="call-chat">
            <h5 class="font-medium">Name : </h5>
            </br>
            {{ $patients->name }} {{ $patients->lname }}
            </div>
            </div>

            <div class="d-flex flex-row comment-row p-3">
            <div class="call-chat">
            <h5 class="font-medium">Phone number :</h5>
            </br>
            {{ $patients->phone_no }}
            </div>
            </div>
          
            <div class="d-flex flex-row comment-row p-3">
            <div class="call-chat">
            <h5 class="font-medium">Date of Birth:</h5>
            </br>
            {{ $patients->date_of_birth}}
            </div>
            </div>

            <div class="d-flex flex-row comment-row p-3">
            <div class="call-chat">
            <h5 class="font-medium">Gender :</h5>
            </br>
            {{ $patients->gender }}
            </div>
            </div>
            
            <div class="d-flex flex-row comment-row p-3">
            <div class="call-chat">
            <h5 class="font-medium">Address:</h5>
            </br>
            {{ $patients->address }}
            </div>
            </div>

            <div class="d-flex flex-row comment-row p-3">
            <div class="call-chat">
            <a class="btn" href="{{url('editInfo',$patients->id)}}"   target="_blank" style="background-color: #e7e7e7; color: black;">Edit My Information</a>
            </div>
            </div>
         
          
        </div>
        </div>
        </div>
        @endforeach
                    <!-- /.col -->
            </div>
            </div>


           
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="doctor/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="doctor/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="doctor/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="doctor/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="doctor/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="doctor/plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="doctor/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="doctor/js/pages/dashboards/dashboard1.js"></script>

@stop


@section('scriptcontent')

@stop