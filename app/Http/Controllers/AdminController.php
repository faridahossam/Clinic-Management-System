<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Posts;
use App\Models\Admin;
use App\Models\token;
use App\Models\Records;
use App\Models\Prescription;
use DB;


class AdminController extends Controller
{
   public function addview()
   {

      return view('admin.add_doctor');
   }

   public function add_post()
   {

      return view('admin.add_news');
   }

   public function add_patient_view()
   {
      $date = date('Y-m-d',time());
      return view('admin.add_patient_view',compact('date'));
   }

   public function add_admin_view()
   {

      return view('admin.add_admin');
   }


   public function upload(Request $request)
   {
      $working_hours = $request->start_time.'-'.$request->end_time;
      $doctor = new doctor;
      $user = new user;
      $old_user = User::where('phone_no', '=', $request->number)->orwhere('email', '=', $request->email)->first();
      if ($old_user===null)
      {
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->phone_no = $request->number;
      $user->name = $request->name;
      $user->lname = $request->lname;
      $user->role_id = 1;
      $user->save();
      $image = $request->file;
      $imagename = time() . '.' . $image->getClientOriginalExtension();
      $request->file->move('doctorimage', $imagename);
      $doctor->image = $imagename;
      $doctor->speciality = $request->speciality;
      $doctor->id = $user->id;
      $doctor->working_hours =$working_hours;
      $doctor->save();

      return redirect()->back()->with('message', 'Doctor Is Added Successfully');
      }
      else{
         return redirect()->back()->with('message', 'This Email and Phone are already regestered on system');
      }

   }

   public function uploadPatient(Request $request)
   {
      $patient = new patient;
      $user = new user;
      $record = new records;
      $old_user = User::where('phone_no', '=', $request->number)->orwhere('email', '=', $request->email)->first();
      if($old_user===null){ //patient not saved on system
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->phone_no = $request->number;
      $user->name = $request->name;
      $user->lname = $request->lname;
      $user->role_id = 3;
      $user->save();
      $patient->address = $request->address;
      $patient->date_of_birth = $request->date_of_birth;
      $patient->gender = $request->gender;
      $patient->id = $user->id;
      $patient->save();
      $record->id=$user->id;
      $record->user_id = $user->id;
      $record->medicine = $request->medicine;
      $image=$request->rd_file;
      if($image != null)
      {
      $imagename = time() . '.' . $image->getClientOriginalExtension();
      $request->rd_file->move('Radiology', $imagename);
      $record->radiology_image  = $imagename;
    }

      $image2=$request->lab_file;
      if($image2 != null)
      {
      $imagename2 = time() . '.' . $image2->getClientOriginalExtension();
      $request->lab_file->move('labs', $imagename2);
      $record->lab_results  = $imagename2;
      }
      $record->height = $request->height;
      $record->weight = $request->weight;
      $record->blood_type = $request->blood_type;
      $record->allergies = $request->allergies;
      $record->chronic_diseases = $request->chronic_diseases;
      $record->save();

      return redirect()->back()->with('message', 'Patient Is Added Successfully');
      }
      else{
         return redirect()->back()->with('message', 'This Email and Phone are already regestered on system');
      }
   }

   public function uploadAdmin(Request $request)
   {
      $old_user = User::where('phone_no', '=', $request->phone)->orwhere('email', '=', $request->email)->first();
      if($old_user===null){ //patient not saved on system

      $user = new user;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->phone_no = $request->number;
      $user->name = $request->name;
      $user->lname = $request->lname;
      $user->role_id = 2;
      $user->save();
      return redirect()->back()->with('message', 'Admin Is Added Successfully');
      }
      else{
         return redirect()->back()->with('message', 'This Email and Phone are already regestered on system');
      }
   }

   public function showappointments(Request $request)
   {
      $user=user::all();
      $search=$request['search'] ?? "";
      if($search != "")
      {
         $data = User :: join('appointments', 'users.id', '=', 'appointments.user_id')
         // search
                  ->where('name','LIKE',"%$search%")
                  ->orWhere('lname','LIKE',"%$search%")
                  ->orWhere('phone_no','LIKE',"%$search%")
                  ->orWhere(DB::raw("concat(name, ' ',lname)"), 'LIKE', "%".$search."%")
                  ->get();

      }
      else
      {
         $data = User :: join('appointments', 'users.id', '=', 'appointments.user_id')
                           ->get();
      }

      return view('admin.showappointments', compact('data','search','user'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
   }


   public function approved($id)
   {

      $data = appointment::find($id);
      $data->status = 'Approved';
      if ($data->user_id != null) {
         $create = token::firstOrCreate(array('user_id' => $data->user_id,'doctor_id' => $data->doctor_id));
         $create->save();
      }

      $data->save();
      return redirect()->back();
   }

   public function canceled($id)
   {
      $data = appointment::find($id);
      $data->status = 'Canceled';
      $data->save();
      return redirect()->back();
   }

   public function delete_app($id)
   {
      $data = appointment::find($id);
      $data->delete();
      return redirect()->back();
   }

   public function showdoctors(Request $request)
   {
      $search=$request['search'] ?? "";
      if($search != "")
      {
         $data = User :: join('doctors', 'users.id', '=', 'doctors.id')
                           ->where ('users.name','like',"%$search%")
                           ->orwhere ('users.phone_no','like',"%$search%")
                           ->orwhere ('users.lname','like',"%$search%")
                           ->orwhere ('users.email','like',"%$search%")
                           ->orwhere ('doctors.speciality','like',"%$search%")
                           ->orWhere(DB::raw("concat(users.name, ' ', users.lname)"), 'LIKE', "%".$search."%")
                           ->get();
         //$data = doctor::where('name','LIKE',"%$search%")->orWhere('lname','LIKE',"%$search%")->orWhere('phone_number','LIKE',"%$search%")->orWhere('speciality','LIKE',"%$search%")->get();
      }
      else
      {
         $data = User :: join('doctors', 'users.id', '=', 'doctors.id')
                ->get();
      }

      return view('admin.showdoctors', compact('data','search'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   public function showpatients(Request $request)
   {
      $search=$request['search'] ?? "";
      if($search != "")
      {
         $Pdata = user::join('patients', 'users.id', '=', 'patients.id')
                  ->where('name','LIKE',"%$search%")
                  ->orWhere('lname','LIKE',"%$search%")
                  ->orWhere('phone_no','LIKE',"%$search%")
                  ->orWhere(DB::raw("concat(name, ' ', lname)"), 'LIKE', "%".$search."%")->get();
      }
      else
      {
         $Pdata = User :: join('patients', 'users.id', '=', 'patients.id')
                           ->get();

         //$Pdata = patient::all();
      }

      return view('admin.show_patients', compact('Pdata','search'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   public function showadmins()
   {
      $Adata=User::where('role_id', '=','2')->get();
      return view('admin.show_admins', compact('Adata'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
   }


   public function deletedoctor($id)
   {
      $data = doctor::find($id);
      $data2 = user::find($id);
      $data->delete();
      $data2->delete();
      return redirect()->back();
   }

   public function deletepatient($id)
   {
      $Pdata = patient::find($id);
      $Pdata2 = user::find($id);
      $Pdata->delete();
      $Pdata2->delete();
      return redirect()->back();
   }

   public function deleteadmin($id)
   {

      $Adata2 = user::find($id);
      $Adata2->delete();
      return redirect()->back();
   }



   public function updatedoctor($id)
   {
      $data = doctor::find($id);
      $data2 = user::find($id);
      return view('admin.update_doctor', compact(['data','data2']));
   }

   public function updatepatient($id)
   {

      $Pdata = patient::find($id);
      $Pdata2 = records::find($id);
      $record=records::all();
      $patient=patient::all();
      $Pdata->save();

      return view('admin.update_patient', compact(['Pdata','Pdata2','record','patient']));
   }

   public function updateadmin($id)
   {

      $Adata = user::find($id);

      return view('admin.update_admin', compact('Adata'));
   }



   public function editdoctor(Request $request, $id)
   {
      $doctor = doctor::find($id);
      $user = user::find($id);
      // $doctor2=user::find($id);
      $user->name = $request->name;
      $user->lname = $request->lname;
      // $doctor2->name=$request->name;
      $user->phone_no = $request->phone_number;
      // $doctor2->phone_no=$request->phone_no;
      $doctor->speciality = $request->speciality;
      $working_hours = $request->start_time.'-'.$request->end_time;
      $image = $request->file;
      if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->file->move('doctorimage', $imagename);
         $doctor->image = $imagename;
      }
      $doctor->working_hours =$working_hours;
      $doctor->save();
      $user->save();
      //$doctor2->save();
      return redirect()->back()->with('message', 'Doctor Updated Successfully');
   }

   public function editpatient(Request $request, $id)
   {
      $patient = patient::find($id);
      $record = records::find($id);
      $patient->address = $request->address;
      $patient->gender = $request->gender;
      $patient->date_of_birth = $request->date_of_birth;
      if ($record != null)
      {
         $record->blood_type = $request->blood_type;
         $record->height = $request->height;
         $record->weight = $request->weight;
         $record->save();
      }
      $patient->save();
      return redirect()->back()->with('message', 'Patient Updated Successfully');
   }

   public function editadmin(Request $request, $id)
   {
      $admin = user::find($id);
      $admin->name = $request->name;
      $admin->lname = $request->lname;
      $admin->phone_no = $request->phone_number;
      $admin->email = $request->email;

      $admin->save();
      return redirect()->back()->with('message', 'Admin Updated Successfully');
   }




   public function upload_news(Request $request)
   {
      $post = new posts;
      $image = $request->image;
      $imagename = time() . '.' . $image->getClientOriginalExtension();
      $request->image->move('postimage', $imagename);
      $post->title = $request->title;
      $post->image = $imagename;
      $post->description = $request->description;
      $post->save();
      return redirect()->back()->with('message', 'Your Post Is Added Successfully');
   }

   public function updatepost($id)
   {
      $data = posts::find($id);
      $data->save();
      return view('admin.update_news', compact('data'));
   }

   public function editpost(Request $request, $id)
   {
      $post = posts::find($id);
      $post->title = $request->title;
      $post->description = $request->description;
      $image = $request->image;
      if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->image->move('postimage', $imagename);
         $post->image = $imagename;
      }
      $post->save();
      return redirect()->back()->with('message', 'Your Post is Updated Successfully');
   }

   public function shownews()
   {
      $data = posts::all();
      return view('admin.show_news', compact('data'));
   }

   public function delete_post($id)
   {
      $data = posts::find($id);
      $data->delete();
      return redirect()->back();
   }
   public function add_appoint(){
      $doctor=doctor::all();
      $user = user::all();
      return view('frontend.index', compact('doctor','user'));
   }

   public function show_records(Request $request)
   {
      $search=$request['search'] ?? "";
      if($search != "")
      {
         $Pdata = user::join('patients', 'users.id', '=', 'patients.id')
                  ->where('name','LIKE',"%$search%")
                  ->orWhere('lname','LIKE',"%$search%")
                  ->orWhere('phone_no','LIKE',"%$search%")
                  ->orWhere(DB::raw("concat(name, ' ',lname)"), 'LIKE', "%".$search."%")
                  ->get();     
      }
      else
      {
         $Pdata = User :: join('patients', 'users.id', '=', 'patients.id')
                           ->get();

         //$Pdata = patient::all();
      }
      $data = records::all();
      $user =user::all();
      return view('admin.show_records', compact('data','user','search','Pdata'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
   }
   public function view_prescriptions(Request $request)
   {
      $search=$request['search'] ?? "";
      if($search != "")
      {
         $Pdata = user::join('patients', 'users.id', '=', 'patients.id')
                  ->where('name','LIKE',"%$search%")
                  ->orWhere('lname','LIKE',"%$search%")
                  ->orWhere('phone_no','LIKE',"%$search%")
                  ->orWhere(DB::raw("concat(name, ' ',lname)"), 'LIKE', "%".$search."%")
                  ->get();     
      }
      else
      {
         $Pdata = User :: join('patients', 'users.id', '=', 'patients.id')
                           ->get();

         //$Pdata = patient::all();
      }
      $data= prescription::all();
      return view('admin.show_prescriptions',compact('Pdata','search','data'))
      ->with('i', (request()->input('page', 1) - 1) * 5);
   }
}
