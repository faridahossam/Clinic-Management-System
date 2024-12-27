<x-app-layout>
    <!DOCTYPE html>
      <html lang="en">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
             * {
              box-sizing: border-box;
              }
                 label
            {
              padding: 12px 12px 12px 0;
              display: inline-block;
            }
            input, select, textarea
            {
              width: 60%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
              border-radius: 4px;
              resize: vertical;
            }
            input[type=submit] {
            width: 40%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
             }
             @media screen and (max-width: 600px) {
             input[type=submit] {
             width: 100%;
            margin-top: 0;
            }
            }
            .container {
            border-radius: 5px;
            padding: 20px;
            }
            </style>
          <!-- Required meta tags -->
          @include('admin.adminmaster')
        </head>
        <body>
          <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
          @include('admin.sidebar')
            <!-- partial -->

            @include('admin.navbar')
              <!-- partial -->

                 <div class="container" Align="center" style="padding-top: 100px;">
                 @if(session()->has('message'))

                       <div class="alert alert-success">
                       <button type="button" class="close" data-dismiss="alert">
                            x
                       </button>
                      {{session()->get('message')}}
                       </div>

                @endif
                     <form action="{{url('upload_patient')}}" method="POST" enctype="multipart/form-data" id="formid">
                       @csrf
                       <div style="padding:20px; position: relative;">
                       <label>Patient's first name</label>
                       </div>
                      <div>
                       <input type="text" style="color:black;" name="name" placeholder="Write patients's first name" required="">
                      </div>
                      <div style="padding:20px; position: relative;">
                       <label>last name</label>
                       </div>
                      <div>
                       <input type="text" style="color:black;" name="lname" placeholder="Write patients's last name" required="">
                      </div>

                      <div style="padding:20px; position: relative;">
                       <label>address</label>
                       </div>
                      <div>
                       <input type="text" style="color:black;" name="address" placeholder="Write patients's address" required="">
                      </div>

                      <div style="padding:20px;">
                       <label>Phone number</label>
                       </div>
                      <div>
                       <input type="number" style="color:black;" name="number" placeholder="Write phone number" pattern="0[0-9]{3}[0-9]{3}[0-9]{4}" required="">
                      </div>


                      <div style="padding:20px;">
                       <label>Email</label>
                       </div>
                      <div>
                       <input type="email" style="color:black;" name="email" required=""  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Write Email">
                      </div>

                      <div style="padding:10px;">
                       <label>Password</label>
                       </div>
                      <div>
                       <input type="password" style="color:black;" name="password"  required autocomplete="new-password" placeholder="Write password">
                      </div>

                      <div style="padding:20px; position: relative;">
                       <label>Blood type</label>
                       </div>
                      <div>
                       <select  name="blood_type" placeholder="Blood Type"class="custom-select" style="width: 60% !important;">
                       <option value="O+">O+</option>
                       <option value="O-">O-</option>
                       <option value="A+">A+</option>
                       <option value="A-">A-</option>
                       <option value="B+">B+</option>
                       <option value="B-">B-</option>
                       <option value="AB+">AB+</option>
                       <option value="AB-">AB-</option>
                       </select>
                      </div>

                      <div style="padding:20px;">
                       <label>Height(cm) (optional)</label>
                       </div>
                      <div>
                       <input type="number" style="color:black;" name="height" placeholder="0" required="">
                      </div>

                      <div style="padding:20px;">
                       <label>Weight(kg) (optional)</label>
                       </div>
                      <div>
                       <input type="number" style="color:black;" name="weight" placeholder="0 " required="">
                      </div>

                      <div style="padding:20px;">
                        <label>Date of birth</label>
                        </div>
                      <div>
                        <input type="date" style="color:black;" name="date_of_birth" required="" min="1900-01-01" max="{{$date}}">
                       </div>


                      <div style="padding:20px;">
                       <label>Gender</label>
                       </div>
                      <div>
                       <select name="gender" id="departement" placeholder="Gender"class="custom-select"  style="width: 60% !important;">
                       <option value="female">Female</option>
                       <option value="male">Male</option>
                       </select>
                      </div>

                       <div style="padding:20px;">
                       <label>Medications that patient is currently taking</label>
                       </div>
                      <div>
                       <input type="text" name="medicine" placeholder="Medicine" style="color:black;" value="none" required="">
                      </div>

                      <div style="padding:20px;">
                       <label>Alergies (if exists)</label>
                       </div>
                      <div>
                       <input input type="text" name="allergies" placeholder="Allergies"value="none" style="color:black;">
                      </div>

                      <div style="padding:20px;">
                       <label>Chronic diseases</label>
                       </div>
                      <div>
                       <input type="text" name="chronic_diseases" placeholder="Chronic diseases" value="none" style="color:black;" required="">
                      </div>

                     <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <label for="html">Lab results (if exists)</label>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                     <input type="file" name="lab_file" >
                     </div>
                  <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <label for="html">Radiology images (if exists)</label>
                   </div>
                   <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <input type="file" name="rd_file" id="rd_file" >
                     </div>

                      <div style="padding:20px; position: relative; left:10px;">
                       <input type="submit" class="btn btn-success">
                      </div>

                     </form>

                 </div>

                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html 
                <footer class="footer">
                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank"></a></span>
                  </div>
                </footer>-->
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
