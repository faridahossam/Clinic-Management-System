<!DOCTYPE html>
      <html lang="en">
      <!DOCTYPE html>
      <html lang="en">
        <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
   <!-- partial:partials/_sidebar.html -->
   <nav class="sidebar" id="sidebar">
          <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          </div>
          <ul class="nav">
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('showappointments')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Appointments</span>
                </a>
              </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('add_doctor_view')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Add Doctors</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('showdoctors')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">All Doctors</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('add_patient_view')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Add Patient</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('show_patients')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">All Patients</span>
              </a>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('add_admin')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">Add Receptionist</span>
                </a>
              </li>
              <li class="nav-item menu-items">
                <a class="nav-link" href="{{url('show_admins')}}">
                  <span class="menu-icon">
                    <i class="mdi mdi-file-document-box"></i>
                  </span>
                  <span class="menu-title">All Receptionists</span>
                </a>
              </li>

            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('add_post_view')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Add post</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('show_news')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Edit post</span>
              </a>
            </li>
           
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('view_records')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Medical Records</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('view_prescriptions')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Prescriptions</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{url('new_appointments')}}">
                <span class="menu-icon">
                  <i class="mdi mdi-file-document-box"></i>
                </span>
                <span class="menu-title">Appointments By Doctor</span>
              </a>
            </li>
          </ul>
        </nav>
</html>
