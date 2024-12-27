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
             thead {display: none;}
            tr:nth-of-type(2n) {background-color: inherit;}
            tr td:first-child {font-size:1.3em;}
            tbody td {display: block;  text-align:center;}
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
                columns: black;
            }
            #searchbutton{
                padding: 10px;
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
            <div align="center" style="padding:100px;">

            <form action="">
                <div class="form-group">
                <div id="google_translate_element"></div>
                    <input id="searchinput" type="search" name="search" class="form-control" value="{{$search}}" placeholder="Search patients">
                    <button id="searchbutton" class="btn btn-success">Search</button>
                    <a href="{{url('/view_prescriptions')}}">
                        <button style="padding:10px;" class="btn btn-primary" type="button">Reset</button>
                    </a>
                </div>
            </form>
                <table style=" width:1000px;">
                    <tr style="background-color:rgb(138, 235, 135);">
                        <th style="color:black;">No</th>

                     <!--   <th style="padding:10px; color:black; margin-left:500px;">Patient's lastName</th> -->
                        <th style="padding:10px; color:black;">Patient's Name</th>
                        <th style="padding:10px; color:black;">Patient's last name</th>
                        <th style="padding:10px; color:black;">Phone Number</th>
                        <th style="padding:10px; color:black;">date of birth</th>
                        <th style="padding:10px; color:black;">Patient's Gender</th>
                        <th style="padding:10px; color:black;">Date of Examination</th>
                        <th style="padding:10px; color:black;">Diagnosis</th>
                        <th style="padding:10px; color:black;">Medicine</th>
                        <th style="padding:10px; color:black;">Dosage</th>
                        <th style="padding:10px; color:black;">Follow up date</th>
                    </tr>

                    @foreach ($Pdata as $patients)
                    @foreach ($data as $prescriptions)
                  @if($patients->id == $prescriptions->user_id)
                        <tr align="center" style="background-color:rgb(23, 73, 29);">
                            <td>{{ ++$i }}</td>
                            <td>{{ $patients->name }}</td>
                            <td>{{ $patients->lname }}</td>
                            <td>{{ $patients->phone_no }}</td>
                            <td>{{ $patients->date_of_birth}}</td>
                            <td>{{ $patients->gender }}</td>
                            <td>{{$prescriptions->date_of_examination}}</td>
                            <td>{{$prescriptions->diagnosis}}</td>
                            <td>{{$prescriptions->medicine}}</td>
                            <td>{{$prescriptions->dosage}}</td>
                            <td>{{$prescriptions->next_appointment_date}}</td>
                        </tr>
                    @endif
                    @endforeach
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
        <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}
  , 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>

    </html>
</x-app-layout>