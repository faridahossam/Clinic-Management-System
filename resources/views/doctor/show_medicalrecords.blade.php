
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            table {
                border-collapse: separate;
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
        </style>
       </head>
    <body>
        <div class="container-scroller">
            <div align="center" style="padding:100px;">

                <table style=" width:1000px;">
                <tr style="background-color:rgb(138, 235, 135);">
                        <th style="color:black;">No</th>
                        <th style="padding:10px; color:black;">Gender</th>
                        <th style="padding:10px; color:black;">Diagnosis</th>
                        <th style="padding:10px; color:black;">Medicine</th>
                        <th style="padding:10px; color:black;">Blood Type</th>
                        <th style="padding:10px; color:black;">Lab_results</th>
                        <th style="padding:10px; color:black;">Radiology_image</th>
                        <th style="padding:10px; color:black;">Allergies</th>
                        <th style="padding:10px; color:black;">Chronic Diseases</th>
                        <th style="padding:10px; color:black;">Update</th>
                        <th style="padding:10px; color:black;">Delete</th>
                    </tr>

                    @foreach ($data as $record)
                        <tr align="center" style="background-color:rgb(23, 73, 29);">
                            <td>{{ ++$i }}</td>
                            <td>{{ $record->gender }}</td>
                            <td>{{ $doctor->diagnosis }}</td>
                            <td>{{ $doctor->medicine }}</td>
                            <td>{{ $doctor->blood_type }}</td>
                            <td><img src="{{ labs/$record->lab_results }}" style="max-width:100%;height:auto;"></td>
                            <td><img src="{{ Radiology/$record->radiology_image }}" style="max-width:100%;height:auto;"></td>
                            <td>{{ $doctor->allergies }}</td>
                            <td>{{ $doctor->chronic_diseases }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('update_record', $record->id) }}">Update</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('delete_record', $record->id) }}"
                                    onclick="return confirm('Are you sure you want to delete this ')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
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
