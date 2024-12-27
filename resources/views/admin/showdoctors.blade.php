<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Required meta tags -->
        @include('admin.adminmaster')
        <style>
            table {
                border-collapse: collapse; 
                border-spacing: 0 15px;
            }
            th,
            td {
                width: 150px;
                text-align: center;
                border: 1px solid rgba(26, 27, 26, 0.904);
                padding: 5px;
            }
            @media screen and (max-width: 600px) {
            table {width:100%;}
            thead {display: block;}
            tr:nth-of-type(2n) {background-color: inherit;}
            tr td:first-child {font-size:1.3em;}
            tbody td {display: block;  text-align:center; position: absolute;}
            tbody td:before { 
            content: attr(data-th); 
            display: block;
            text-align:center;  
            }
            th{
             visibility:hidden;   
            }
            }
            #searchinput{
                padding: 25px;
                margin-bottom: 5px;
                background: rgb(211, 240, 208);
                color: black;
            }


        </style>

    </head>

    <body>
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->

            @include('admin.navbar')
            <!-- partial -->
            <div align="center" style="padding:100px">

            <form action="" style=" width:1000px;">
                <div class="form-group">
                    <input id="searchinput" type="search" name="search" class="form-control" value="{{$search}}" placeholder="Search doctors">
                    <button style="padding:10px;" class="btn btn-success">Search</button>
                    <a href="{{url('/showdoctors')}}">
                        <button style="padding:10px;" class="btn btn-primary" type="button">Reset</button>
                    </a>
                </div>
            </form>
                <table style=" width:1000px;">
                    <tr style="background-color:rgb(138, 235, 135);">
                        <th style="color:black;">No</th>
                        <th style="padding:10px; color:black;">Doctor's Name</th>
                     <!--   <th style="padding:10px; color:black;">Doctor's Last Name</th>  -->
                        <th style="padding:10px; color:black;">Phone Number</th>
                        <th style="padding:10px; color:black;">Speciality</th>
                        <th style="padding:10px; color:black;">Working Hours</th>
                        <th style="padding:10px; color:black;">Photo</th>
                        <th style="padding:10px; color:black;">Update</th>
                        <th style="padding:10px; color:black;">Delete</th>
                    </tr>

                    @foreach ($data as $doctor)
                        <tr align="center" style="background-color:rgb(23, 73, 29);">
                            <td>{{ ++$i }}</td>
                            <td>{{ $doctor->name }} {{ $doctor->lname }}</td>
                           <!-- <td>{{ $doctor->lname }}</td> -->
                            <td>{{ $doctor->phone_no }}</td>
                            <td>{{ $doctor->speciality }}</td>
                            <td>{{$doctor->working_hours}}</td>
                            <td><img style="max-width:100%;height:auto;" src="doctorimage/{{ $doctor->image }}"></td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('updatedoctor', $doctor->id) }}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('deletedoctor', $doctor->id) }}"
                                    onclick="return confirm('Are you sure you want to cancel this doctor')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
        <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
        <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="admin/assets/js/off-canvas.js"></script>
        <script src="admin/assets/js/hoverable-collapse.js"></script>
        <script src="admin/assets/js/misc.js"></script>
        <script src="admin/assets/js/settings.js"></script>
        <script src="admin/assets/js/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="admin/assets/js/dashboard.js"></script>
        <!-- End custom js for this page -->
    </body>

    </html>
</x-app-layout>
