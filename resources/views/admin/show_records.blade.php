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
            <div align="center" style="padding:100px;">
            <div id="google_translate_element"></div>
            <form action="" style=" width:1000px;">
                <div class="form-group">
                    <input id="searchinput" type="search" name="search" class="form-control" value="{{$search}}" placeholder="Search records">
                    <button style="padding:10px;" class="btn btn-success">Search</button>
                    <a href="{{url('/view_records')}}">
                        <button style="padding:10px;" class="btn btn-primary" type="button">Reset</button>
                    </a>
                </div>
            </form>
            <table style=" width:1000px;">
                    <tr style="background-color:rgb(138, 235, 135);">
                        <th style="padding:10px; color:black;">No.</th>
                        <th style="padding:10px; color:black;">Patient Name</th>
                        <th style="padding:10px; color:black;">Current Medication</th>
                        <th style="padding:10px; color:black;">Blood Type</th>
                        <th style="padding:10px; color:black;">Lab_results</th>
                        <th style="padding:10px; color:black;">Radiology_image</th>
                        <th style="padding:10px; color:black;">Allergies</th>
                        <th style="padding:10px; color:black;">Allergies</th>
                        <th style="padding:10px; color:black;">Weight</th>
                        <th style="padding:10px; color:black;">Chronic Diseases</th>
                        <th style="padding:10px; color:black;">Update</th>
                        <th style="padding:10px; color:black;">Delete</th>
                    </tr>

                    @foreach ($data as $record)
                    @foreach ($Pdata as $patient)
                    @if($record->user_id == $patient->id)
                        <tr align="center" style="background-color:rgb(23, 73, 29);">
                            <td>{{++$i}}</td>
                            <td>{{$patient->name}} {{$patient->lname}}</td>
                            <td>{{ $record->medicine }}</td>
                            <td>{{ $record->blood_type }}</td>
                            <td><a href="labs/{{$record->lab_results }}" width="100%" height="500px">view</a></td>
                            <td><a href=" Radiology/{{$record->radiology_image }}" width="100%" height="500px">view</a></td>
                            <td>{{ $record->allergies }}</td>
                            <td>{{ $record->height }}</td>
                            <td>{{ $record->weight }}</td>
                            <td>{{ $record->chronic_diseases }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('update_record', $record->id) }}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('delete_record', $record->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this ')">Delete</a>
                            </td>
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