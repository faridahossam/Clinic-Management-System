<!DOCTYPE html>
<html lang="en">
 <head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
      #main-panel
      {
        background-color: #d9d9d9;
        margin: 0;
      }

      #card
      {
        background-color: white;
        color:#034f84;
        font-family: Arial;
        padding:20px;
        font-size: 25px;
        margin: 0;
        border:0;
      }
      #google_translate_element
  {
    position: relative;
  left: 100px;
  }
    </style>
    </head>
<body>
<div class="main-panel" id="main-panel">
            <div class="content-wrapper" id="card">
            <h1 >Select your language</h1>
         <div id="google_translate_element"></div>
              <div class="row">
              <div class="col-md-8 grid-margin stretch-card">
                  <div class="card"id="card">
                    <div class="card-body">
     
                <div class="col-12 grid-margin stretch-card">
                        <div >
                          <h4 style="font-family:Algerian; font-size:40px; color:#f20d0d;"><b>Control your Dashboard</b></h4>
                        </div>

                </div>
              </div>
              <div id="news">
                     @include ('user.latestnews')
                </div>
                </div>
              </div>
            </div>
          </div>
                    <!-- <div class="card-body" id="list">
                      <h4 style="font-size: 25px; color:#034f84;font-family: Arial;"><b>To do list</b></h4>
                      <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                        <button class="add btn btn-primary todo-list-add-btn">Add</button>
                      </div>
                      <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                          <li>
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox"> Manage Patients</label>
                            </div>
                            <i class="remove mdi mdi-close-box"></i>
                          </li>
                          <li>
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox"> Manage Doctors</label>
                            </div>
                            <i class="remove mdi mdi-close-box"></i>
                          </li>
                          <li>
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox"> Manage News</label>
                            </div>
                            <i class="remove mdi mdi-close-box"></i>
                          </li>
                        </ul>-->
                      </div>
                    </div>
                  </div> 
                  <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}
  , 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>
      </html>