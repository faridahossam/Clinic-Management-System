<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Posts;
use DB;
class HomeController extends Controller
{
      public function redirect(){
          if (Auth::id())
          {
              if(Auth::user()->role_id==1){

               return view('doctor.home');

              }elseif(Auth::user()->role_id==2){
                $doctor = doctor::all();
                $post  = posts::all();
                return view('admin.home',compact('doctor'),compact('post'));

              }else{
                $doctor = doctor::all();
                $post  = posts::all();
                return view('user.home',compact('doctor'),compact('post'));
              }

          }
          else{
              return redirect()->back;
              }
      }

      public function index()
      {  
        if (Auth::id())
        {
          return redirect('home');
        }
        else
        {
          $doctor = doctor::all(); 
          $post  = posts::all();
          return view('user.home',compact('doctor'),compact('post'));
        }
      }
      public function appointment(Request $request)
      {
        $data = new appointment;
        if(Auth::id()){
          $data->user_id=Auth::id();
        }else{
          $user = User::where('email', '=', $request->email)->first();
          if ($user === null) {
            $user = User::where('phone_no', '=', $request->mobile)->first(); 
          }

          if ($user === null){

          }else{
            $data->user_id=$user->id;
          }

        }
        $data->f_name=$request->fname;
        $data->l_name=$request->lname;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->doctor_id=$request->doctor;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->address=$request->address;
        $data->gender=$request->gender;
        $data->status='In Progress';
        $data->save();
          return redirect()->back()->with('message','Appointment Request Successful . We will contact you soon');
      }

      public function my_appointment()
      {
        if(Auth::id())
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
          
        
          return view('user.my_appointment',compact('data'));
        }
        else
        {
          return redirect()->back();
        }
      }

      public function cancel_appoint($id)
      {
          $data=appointment::find($id);
          $data->delete();
          return redirect()->back();
      }
      public function update_appoint($id)
      {
        $data=appointment::find($id);
        
        $doctor= DB::table('doctors')
                 ->select('*')
                 ->get();
        return view('user.update_appoint',compact('data','doctor'));   
      }
      public function edit_appoint(Request $request,$id)
      {
        $data=appointment::find($id);
        $data->date=$request->date;
        $data->doctor_id=$request->doctor;
        $data->time=$request->time;
        $data->save();
        return redirect()->back()->with('message', 'Appointment Updated Successfully');  
      }

}
