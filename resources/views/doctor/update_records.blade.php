@extends('frontend.master2')
@section('content')
        <style>
            label
            {
                display:inline-block;
                width:200px;
            }
        </style>
      <div class="container-scroller">
        <div class="container" align="center" style="padding:100px;">

        @if(session()->has('message'))
 
                   <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">
                        x
                   </button>
                  {{session()->get('message')}}
                   </div>

            @endif

            <form action="{{url('edit_record',$data->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div style="padding:20px; position: relative;">

                <div style="padding:15px;">
                    <label>Blood_type</label>
                    <select  name="blood_type" placeholder="Blood Type"class="custom-select" value="{{$data->blood_type}}">
                     <option value="{{$data->blood_type}}">{{$data->blood_type}}</option>
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
                       <input type="number" style="color:black;" name="height" placeholder="0" required="" value="{{$data->height}}">
                      </div>

                      <div style="padding:20px;">
                       <label>Weight(kg) (optional)</label>
                       </div>
                      <div>
                       <input type="number" style="color:black;" name="weight" placeholder="0 " required="" value="{{$data->weight}}">
                      </div>

                <div style="padding:15px;">
                    <label>Medicine</label>
                    <input style="color:grey;" type="text" name="medicine" value="{{$data->medicine}}">
                </div>

                <div style="padding:15px;">
                    <label>Allergies</label>
                    <input style="color:grey;" type="text" name="allergies" value="{{$data->allergies}}">
                </div>

                <div style="padding:15px;">
                    <label>Chronic Diseases</label>
                    <input style="color:grey;" type="text" name="chronic_diseases" value="{{$data->chronic_diseases}}">
                </div>
                
                <div style="padding:15px;">
                    <label>Last Lab  Results</label>
                    <a href="{{asset('labs')}}/{{$data->lab_results }}" width="100%" height="500px">Last Lab Results</a>
                </div>

                <div style="padding:15px;">
                    <label>Change Labs Results</label>
                    <input type="file" name="lab_file">
                </div>
                
                <div style="padding:15px;">
                    <label>Radiology Images</label>
                    <br>
                    <a height="150" width="150" href="{{asset('Radiology')}}/{{$data->radiology_image}}">Last Radiology Images</a>
                </div>

                <div style="padding:15px;">
                    <label>Change Radiology Images</label>
                    <input type="file" name="rd_file">
                </div>
                <div style="padding:15px;">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
@stop
