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
            input [type=file,text], select, textarea
            {
              width: 60%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
              border-radius: 4px;
              resize: vertical;
            }
            input[type=text]{
              background: white !important;      
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
                 <form action="{{url('upload_news')}}" method="POST" enctype="multipart/form-data" id="formid">
                   @csrf
                   <div class="col-sm-9">
                   <div style="padding:20px; position: relative;">
                   <label>Post title</label>	
							<input type="text" name="title" style="color:black;" id="post_title" class="form-control" placeholder="Enter title here">				
						</div>
					
 						<div class="form-group">		
               <label> Post content</label>
							<textarea class="form-control" name="description" rows="15" style="color:black; background: white !important; border-radius: 2px; margin:8px 0px;"></textarea>
						</div>	
					</div>
					<div class="col-sm-3">

          <div style="padding:20px; position: relative; left:30px;">
                   <label>Post image</label>
                   <input type="file" name="image" required="">
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