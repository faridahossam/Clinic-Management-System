<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Records;
use App\Models\Medication;
use App\Models\Prescription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function addview(Request $request){
        $doctor=Auth::id();
        $approved='Approved';
        $date = date('Y-m-d',time());
        $date2 = date('d/m/Y',time());
        $data= User::join('appointments', 'users.id', '=', 'appointments.user_id')
              ->select('*')
              ->where('appointments.doctor_id', '=', $doctor)
              ->where('appointments.date','=',$date)
              ->where('appointments.status','=',$approved)
              ->get();
        $search_text= $request->get('search');
        $data2 = DB::table('users')
              ->select('*')
              ->where('name','LIKE',$search_text)
              ->orWhere('email', 'LIKE', $search_text)
              ->orWhere('phone_no', 'LIKE', $search_text)
              ->get();
       
        $appointmentsToday =$data->count();
       
        $data->appointmentsToday=$appointmentsToday;
        $data->data2=$data2;
        $data->date2=$date2;
        
        return view('doctor.view_patients',compact('data'));
    }

    public function record()
    {
      return view('doctor.medical_record');
    } 

    public function remove($id)
    {
        $data = appointment::find($id);
        $data->status = 'Done';
        $data->save();
        return back();
    } 

    public function search(Request $request){
        
        $doctor=Auth::id();
        
        
        if($request->ajax()){
            $data = User :: join('tokens', 'users.id', '=', 'tokens.user_id')
                           ->where ('doctor_id','like',$doctor)
                           ->where ('users.phone_no','like','%'.$request->search.'%')
                           ->orwhere ('users.name','like','%'.$request->search.'%')
                           ->orwhere ('users.lname','like','%'.$request->search.'%')
                           ->orwhere ('users.email','like','%'.$request->search.'%')
                           ->orWhere(DB::raw("concat(users.name, ' ',users.lname)"), 'LIKE', "%".$request->search."%")
                           ->get();
    
        }
        $output='';
        if(count($data)>0){
           
            foreach($data as $row){
                $output .= '
                 
                 <tr>
                 <td>'.$row->id.'</td>
                 <td>'.$row->name.' '.$row->lname.'</td>
                 <td>'.$row->email.'</td>
                 <td>'.$row->phone_no.'</td>
                
                 </tr>
                  ';
            }

            

        }else{
            $output .='No output';

        }

        return $output;
        
        
    }

    
    public function search2(Request $request){
        
        if($request->ajax()){
            $data = Patient::find($request->search2);
            $user = User::find($request->search2);
            $record = Records::find($request->search2);
            $prescription =  Prescription::join('doctors', 'prescriptions.doctor_id', '=', 'doctors.id')
              ->join('users', 'prescriptions.doctor_id', '=', 'users.id')
              ->select('*')
              ->where('user_id','=',$request->search2)
              ->get();
            
            $dateToday=date("Y-m-d");
            $age = date_diff(date_create($data->date_of_birth), date_create($dateToday));
            
    
        }
       
        $output='';
        if(($record)!= null){
           
            
               $output .= '
                 
                <div class="row">
                <!-- .col -->
                <div class="col-md-12 col-lg-8 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-body">
                            <h3 class="box-title mb-0">'.$user->name.' Medical Record</h3>
                        </div>
                        <div class="comment-widgets">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3 mt-0">
                            <h5 class="font-medium">Cronic Diseases:</h5> 
                            </br>
                            '.$record->chronic_diseases.'
                            </div>
                            
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3">
                            <h5 class="font-medium">Allergies :</h5>
                            </br>
                            '.$record->allergies.'
                            </div>
                            
                            <!-- Comment Row -->
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3">
                            <h5 class="font-medium">Current Medication:</h5>
                            </br>
                            '.$record->medicine.'
                            </div>
                           
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3">
                            <h5 class="font-medium">Lab Results:</h5>
                            </br>';
                            if ($record->lab_results!=null)
                            {$output.='<a class="btn" href="labs/'.$record->lab_results.'" style="color:blue;text-decoration: underline;">view</a>';}
                            else
                            {$output.='not available';}
                            $output.='

                            </div>
                           
                            <div class="d-flex flex-row comment-row p-3">
                            <h5 class="font-medium">Radiology Images:</h5>
                            </br>';
                            if ($record->radiology_image!=null)
                            {$output.='<a class="btn" href="Radiology/'.$record->radiology_image.'"  style="color:blue;text-decoration: underline;">view</a>';}
                            else
                            {$output.='not available';}
                            $output.='
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row p-3">
                            <h5 class="box-title mb-0">Previous Prescriptions:</h5>
                            </br>
                            </div>
                             ';

            if(count($prescription)>0){
                $output .= '  <table class="table no-wrap" >
                      <thead>
                <tr>
                    <th class="border-top-0">Speciality</th>
                    <th class="border-top-0">Doctor</th>
                    <th class="border-top-0">Date</th>
                    <th class="border-top-0"></th>
                    
                </tr> 
                </thead>
                <tbody id="search_list">
                  ';
            foreach($prescription as $row){
                                    $output .= '
                                     
                                     <tr>
                                   
                                     <td> '.$row->speciality.'</td>
                                     <td> '.$row->date_of_examination.'</td>
                                     <td>  Dr. '.$row->name.'  '.$row->lname.'</td>
                                     <td><a class="btn" href="'.url('view_prescription',$row->prescription_id).'"  target="_blank" style="background-color: #e7e7e7; color: black;">View</a><td>
                                     </tr>
                                     
                                      ';
                                      
                                }
                                $output.='</tbody>
                                         </table>';
                              }
                              
            else{
                
                $output.='<div class="d-flex flex-row comment-row p-3">none  </div>';
               
            }
            
            
             $output.='
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card white-box p-0">
                        <div class="card-heading">
                            <h3 class="box-title mb-0">'.$user->name.' Information</h3>
                        </div>
                        <div class="card-body">
                            <ul class="chatonline">
                                <li>
                                <h5 class="font-medium">Weight:</h5> </br>'. $record->weight.'
                                </li>
                                <li>
                                <h5 class="font-medium">Height:</h5> '. $record->height.'
                                </li>
                                <li>
                                <h5 class="font-medium">Age:</h5> '. $age->format("%y").'
                                </li>
                                <li>
                                <h5 class="font-medium">Blood Type:</h5> '. $record->blood_type.'
                                </li>
                                <li>
                                <h5 class="font-medium">Gender:</h5> '. $data->gender.'
                                </li>
                                <li>
                                <h5 class="font-medium">Address:</h5> '. $data->address.'
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
                  ';
           

            

       }else{
            $output .='<h3 class="box-title mb-0">User does not have record</h3>';

        }  
       
        return $output;
         
    }


    public function homedoctor(){
        return view('doctor.home');
    }
    public function addprescription(){
        $date = date('d/m/Y',time());
        $doctor=Auth::id();
        $data2 = User::find($doctor);
        $patient_name=null; //User(patient)
        $user_id=null;

        return view('doctor.addprescription',compact('date','data2','patient_name','user_id'));
    }
    public function mypatients(){
        $doctor=Auth::id();
        $date = date('Y-m-d',time());
        
        $data = User::join('tokens', 'users.id', '=', 'tokens.user_id')
                ->get(['users.*']);
                
        return view('doctor.mypatients',compact('data'));
    }
  
    function index(Request $request)
    {
        $doctor=Auth::id();
        $search=$request['search'] ?? "";
        if($search != "")
        {
            
            $data = User :: join('tokens', 'users.id', '=', 'tokens.user_id')
            ->where ('doctor_id','like',$doctor)
            ->where ('users.phone_no','like',"%$search%")
            ->orwhere ('users.name','like',"%$search%")
            ->orwhere ('users.lname','like',"%$search%")
            ->orwhere ('users.email','like',"%$search%")
            ->orWhere(DB::raw("concat(users.name, ' ',users.lname)"), 'LIKE', "%".$search."%")
            ->orderBy('name')->cursorPaginate(15);

        }
        else
        {
       
       
       $data = User::join('tokens', 'users.id', '=', 'tokens.user_id')
                ->where('tokens.doctor_id','=',$doctor)
                ->orderBy('name')->cursorPaginate(15);
        }
              
        return view('doctor.mypatients', compact('data','search'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
     /*return view('doctor.mypatients',[
         'data'=> $data
     ]);*/

    }


    public function save_prescription(Request $request,$id)
   {
        $doctor=Auth::id();
        $prescription = new Prescription;
        $prescription->user_id=$id;
        $prescription->date_of_examination=$request->date_of_examination;
        $prescription->next_appointment_date=$request->next_appointment_date;
        $prescription->doctor_id=$doctor;
        $prescription->diagnosis=$request->diagnosis;
        $prescription->medicine=$request->medicine;
        $prescription->dosage=$request->dosage;
        $prescription->save();
  


      return redirect()->back()->with('message', 'prescription Is Added Successfully');
   }
    
    public function write_prescription($id)
      {
        $data = User :: where ('appointments.id','=',$id)
                ->join('appointments', 'users.id', '=', 'appointments.user_id')
                ->first();
        //$data=appointment::find($id);
        $doctor=Auth::id();
        $data2 = User::find($doctor);
        $date = date('d/m/Y',time());
        $user_id=$data->user_id;
        $patient_name= $data->name.$data->lname;
        return view('doctor.addprescription',compact('date','data2','user_id','patient_name'));   
      }

      public function view_prescription($id)
      {
        

       // return redirect('/view_prescription2');
       //return redirect('/view_prescription2','/'.compact('id'));
       return redirect()->away('/view_prescription2'.$id.'');
      }

      public function view_prescription2($id)
      {
        $prescription = DB::table('prescriptions')->where('prescription_id', $id)->first();
        $doctor = User::find($prescription->doctor_id);
        $patient = User::find($prescription->user_id);
    
        return view('doctor.view_prescription',compact('prescription','doctor','patient'));
      }

      
      public function write_prescription_my_patients($id)
      {
        $data=user::find($id);
        $doctor=Auth::id();
        $data2 = User::find($doctor);
        $user_id=$id;
        $patient_name= $data->name.$data->lname;
        $date = date('d/m/Y',time());

        return view('doctor.addprescription',compact('date','data2','user_id','patient_name'));
      }
      
      public function add_record(Request $request)
    {  
        if(Auth::id())
        {
            $userid=Auth::user()->id;
            $r=Records::find($userid);
            if($r!=null)
            {
                $r->blood_type=$request->blood_type;
                $r->height=$request->height;
                $r->weight=$request->weight;
                $r->medicine=$request->medicine;
                $r->allergies=$request->allergies;
                $r->chronic_diseases=$request->chronic_diseases;
                if ($request->lab_file != null){
                    $labfile = $request->lab_file;
                    $lab = time() . '.' . $labfile->getClientOriginalExtension();
                    $request->lab_file->move('labs', $lab);
                    $r->lab_results = $lab;
                   }
                if ($request->rd_file != null){
                    $rd_file=$request->rd_file;   
                    $rd = time() . '.' . $rd_file->getClientOriginalExtension();
                    $request->rd_file->move('Radiology', $rd);
                    $r->radiology_image = $rd;
            
                    }
                $r->save();
                
            }
            else{
                $record=new records;
                $record->id=$userid;
                $record->user_id=$userid;
                $record->blood_type=$request->blood_type;
                $record->height=$request->height;
                $record->weight=$request->weight;
       if($request->medicine == null)
       {
        $record->medicine='none';
       }
       else{
        $record->medicine=$request->medicine;
       }
       if($record->allergies == null)
       {
        $record->allergies='none';
       }
       else{
        $record->allergies=$request->allergies;
       }
       if($record->chronic_diseases == null)
       {
        $record->chronic_diseases='none';
       }
       else{
        $record->chronic_diseases=$request->chronic_diseases;
       }

       if ($request->lab_file != null){
        $labfile = $request->lab_file;
        $lab = time() . '.' . $labfile->getClientOriginalExtension();
        $request->lab_file->move('labs', $lab);
        $record->lab_results = $lab;
       }
      
       if ($request->rd_file != null){
        $rd_file=$request->rd_file;   
        $rd = time() . '.' . $rd_file->getClientOriginalExtension();
        $request->rd_file->move('Radiology', $rd);
        $record->radiology_image = $rd;

        }
       
        $record->save();

            }
           

        
       return redirect('/myappointment');
        }
    }  

    public function showrecords()
    {
       $record = records::all();
       return view ('doctor.show_medicalrecords',comapact('record'));
    }

    public function updaterecord($id)
    {
       $data = records::find($id);
       $data->save();
       return view('doctor.update_records', compact('data'));
    }
   
    public function edit_record(Request $request, $id)
    {
       $record = records::find($id);
       $record->medicine = $request->medicine;
       $record->height =$request->height;
       $record->weight =$request->weight;
       $record->blood_type=$request->blood_type;
       $record->allergies=$request->allergies;
       $record->chronic_diseases=$request->chronic_diseases;
       $labfile = $request->lab_file;
       if ($labfile) {
          $lab = time() . '.' . $labfile->getClientOriginalExtension();
          $request->lab_file->move('labs', $lab);
          $record->lab_results = $lab;
       }
       $rdfile = $request->rd_file;
       if ($rdfile) {
          $rd = time() . '.' . $rdfile->getClientOriginalExtension();
          $request->rd_file->move('Radiology', $rd);
          $record->radiology_image = $rd;
       }
       $record->save();
       return redirect()->back()->with('message', 'Your Record is Updated Successfully');
    }
    public function delete_record($id)
    {
       $data = records::find($id);
       $data->delete();
       return redirect()->back();
    }
   


   
}

/*

 <td>
                    <a class="btn btn-success button" id="button" name="button" >View History</a>
                </td>
                <td>
                     
                    <a class="btn btn-success" href="'.url('write_prescription_my_patients',$row->id).'">Write a Prescription</a>
                </td>
*/