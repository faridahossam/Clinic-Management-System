<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Posts;
use App\Models\Admin;
use App\Models\Records;
use App\Models\token;
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

      return view('admin.add_patient_view');
   }
   
   public function add_admin_view()
   {

      return view('admin.add_admin');
   }
   

   public function upload(Request $request)
   {
      $doctor = new doctor;
      $user = new user;
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
      $doctor->name = $request->name;
      $doctor->phone_number = $request->number;
      $doctor->speciality = $request->speciality;
      $doctor->id = $user->id;
      $doctor->save();

      return redirect()->back()->with('message', 'Doctor Is Added Successfully');
   }

   public function uploadPatient(Request $request)
   {
      $patient = new patient;
      $user = new user;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->phone_no = $request->number;
      $user->name = $request->name;
      $user->lname = $request->lname;
      $user->role_id = 3;
      $user->save();
      $patient->name = $request->name;
      $patient->phone_number = $request->number;
      $patient->date_of_birth = $request->date_of_birth;
      $patient->id = $user->id;
      $patient->save();

      return redirect()->back()->with('message', 'Patient Is Added Successfully');
   }

   public function uploadAdmin(Request $request)
   {
      $admin = new admin;
      $user = new user;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->phone_no = $request->number;
      $user->name = $request->name;
      $user->lname = $request->lname;
      $user->role_id = 2;
      $user->save();
      $admin->name = $request->name;
      $admin->lname = $request->lname;
      $admin->phone_number = $request->number;
      $admin->date_of_birth = $request->date_of_birth;
      $admin->id = $user->id;
      $admin->save();


      return redirect()->back()->with('message', 'Admin Is Added Successfully');
   }


   public function showappointments()
   {
      $userid=Auth::user()->id;
      $appoint=new appointment;
      $appoint= DB::table('appointments')
      ->select('*')
      ->where('user_id','=',$userid)
      ->get();
      $data = User :: join('appointments', 'users.id', '=', 'appointments.doctor_id')
      ->where ('appointments.user_id','like',$userid)
      ->get();
      return view('admin.showappointments', compact('data'));
   }

   public function approved($id)
   {

      $data = appointment::find($id);
      $data->status = 'Approved';
      if ($data->user_id != null) {
         $create = token::firstOrCreate(array('user_id' => $data->user_id,'doctor_id' => $data->doctor_id));
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
         $data = doctor::where('name','LIKE',"%$search%")->orWhere('lname','LIKE',"%$search%")->orWhere('phone_number','LIKE',"%$search%")->orWhere('speciality','LIKE',"%$search%")->get();
      }
      else
      {
         $data = doctor::all();
      }
      
      return view('admin.showdoctors', compact('data','search'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   public function showpatients(Request $request)
   {
      $search=$request['search'] ?? "";
      if($search != "")
      {
         $Pdata = patient::where('name','LIKE',"%$search%")->orWhere('lname','LIKE',"%$search%")->orWhere('phone_number','LIKE',"%$search%")->get();
      }
      else
      {
         $Pdata = patient::all();
      }
      
      return view('admin.show_patients', compact('Pdata','search'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
   }

   public function showadmins()
   {
      $Adata = admin::all();
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
      $Adata = admin::find($id);
      $Adata2 = user::find($id);
      $Adata->delete();
      $Adata2->delete();
      return redirect()->back();
   }



   public function updatedoctor($id)
   {
      $data = doctor::find($id);
      $user = user::find($id);
      $user->name = $data->name;
      $user->lname = $data->lname;
      $user->phone_no = $data->phone_number;
      $user->save();
      return view('admin.update_doctor', compact('data'));
   }

   public function updatepatient($id)
   {
      $Pdata = patient::find($id);
      $user = user::find($id);
      $user->name = $Pdata->name;
      $user->lname = $Pdata->lname;
      $user->phone_no = $Pdata->phone_number;
      $user->save();
      return view('admin.update_patient', compact('Pdata'));
   }

   public function updateadmin($id)
   {
      $Adata = admin::find($id);
      $user = user::find($id);
      $user->name = $Adata->name;
      $user->lname = $Adata->lname;
      $user->phone_no = $Adata->phone_number;
      $user->save();
      return view('admin.update_admin', compact('Adata'));
   }



   public function editdoctor(Request $request, $id)
   {
      $doctor = doctor::find($id);
      // $doctor2=user::find($id);
      $doctor->name = $request->name;
      // $doctor2->name=$request->name;
      $doctor->phone_number = $request->phone_number;
      // $doctor2->phone_no=$request->phone_no;
      $doctor->speciality = $request->speciality;

      $image = $request->file;
      if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $request->file->move('doctorimage', $imagename);
         $doctor->image = $imagename;
      }

      $doctor->save();
      //$doctor2->save();
      return redirect()->back()->with('message', 'Doctor Updated Successfully');
   }

   public function editpatient(Request $request, $id)
   {
      $patient = patient::find($id);
      // $patient2=user::find($id);
      $patient->name = $request->name;
      // $patient2->name=$request->name;
      $patient->phone_number = $request->phone_number;
      // $patient2->phone_no=$request->phone_no;
      $patient->age = $request->age;

      $patient->save();
      //$patient2->save();
      return redirect()->back()->with('message', 'Patient Updated Successfully');
   }

   public function editadmin(Request $request, $id)
   {
      $admin = admin::find($id);
      $admin->name = $request->name;
      $admin->phone_number = $request->phone_number;

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
      return view('frontend.index', compact('doctor'));
   }

   public function show_records()
   {
      $data = records::all();
      return view('admin.show_records', compact('data'));
   }
}
