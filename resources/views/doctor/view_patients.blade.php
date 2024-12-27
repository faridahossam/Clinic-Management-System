@extends('frontend.master2')

@section('itemsInNavBar')
            <li class="nav-item active">
              <a class="nav-link" href="{{url('home')}}" >Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" >Today's Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('addprescription')}}" >Add Prescription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('mypatients')}}">My Patients</a>
            </li>
            <li class="nav-item active">
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
                            <h3 class="box-title">Welcome!</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                
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
                                <li class="ms-auto"><span class="counter text-success">{{$data->date2}}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Appointments Today</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple">{{$data->appointmentsToday}}</span></li>
                                
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
                                <h3 class="box-title mb-0">List of patients today</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            
                                            <th class="border-top-0">Time</th>
                                            <th class="border-top-0">Id</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Phone Number</th>
                                            <th class="border-top-0">View Patient's History</th>
                                            <th class="border-top-0">Add a Prescription</th>
                                            <th class="border-top-0">Remove</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $user)
                                        <tr>
                                           
                                            <td>{{$user->time}}</td>
                                            <td>
                                            <input type="text" name="hoppa"  id="hoppa" class="hoppa" style=" visibility: hidden;position: absolute;" value="{{$user->user_id}}">
                                              {{$user->id}}</td>
                                            <td class="txt-oflo" >{{$user->name}} {{$user->lname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone_no}}</td>
                                            
                                            
                                            <td><button id="{{$user->id}}" class="btn btn-success button" onClick="reply_click(this.id)">View History</button></td>
                                            
                                            <td><a class="btn btn-success "  href="{{url('write_prescription',$user->id)}}">Write Prescription</a></td>
                                            </td>
                                            <td>
                                             <a class="btn btn-danger" href="{{url('remove',$user->id)}}">Remove</a>
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
                
                        </div>
                    </div>
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
  
<script type="text/javascript">
        function reply_click(clicked_id)
   {
      var query=clicked_id;
      $.ajax({
        url:"search2",
        type: "GET",
        data: {'search2':query},
               success:function(data){
                $('#record').html(data);
                console.log('done');
               }
        
        
         });
     
   }

</script>
  @stop