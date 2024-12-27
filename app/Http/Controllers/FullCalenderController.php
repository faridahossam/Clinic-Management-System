<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Patient;
use App\Models\Token;

class FullCalenderController extends Controller
{
   /* public function index(Request $request)
    {

        $doctors = Doctor::join('users', 'users.id', '=', 'doctors.id')
               ->get();

    	if($request->ajax())
    	{
			$doctor = $request->doctor;
    		$data = Event::whereDate('start', '>=', $request->start )
                       ->whereDate('end',   '<=', $request->end)
					   //->where('doctor_id', '=', $request->doctor)
                       ->get();
            return response()->json($data);
    	}
    	return view('admin.full-calender',compact('doctors'));
    }*/
    public function sub_start_end(Request $request)
      {
          
          /*$doctor=$request->doctor;
          $doctor_info=Doctor::find($doctor);*/
         
          $doctor=$request->doctor;
          $data=Doctor::where('id', '=',$doctor)
                 ->get();
          return response()->json($data);
      }
    public function subdate(Request $request)
      {
          $date=$request->date;
          $doctor=$request->doctor;
          $data = Appointment:: join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
                 ->where('appointments.date', '=',$date)
                 ->where('appointments.doctor_id', '=',$doctor)
                 ->get();
        /*  $data=Appointment::where('doctor_id', '=',$doctor)
                 ->where('date', '=',$date)
                 ->get();
                
         /* $doctor_info=Doctor::find($doctor);
          $working_hours=explode("-",$doctor_info->working_hours);
          $start_time= $working_hours[0];
          $end_time= $working_hours[1];*/
          
        return response()->json($data);
      }
	  public function store(Request $request)
      {

		$time = $request->date.' '.$request->time.':00';

       $request->validate([

            'email'         => 'required|email',
            'fname'          => 'required',
			'lname'          => 'required',
			'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        ]);
        $time = $request->date.' '.$request->time.':00';
        $data = new appointment;


        $old_user = User::where('phone_no', '=', $request->phone)->orwhere('email', '=', $request->email)->first();
        if($old_user===null){ //patient not saved on system
            $user = new user;
            $patient =new patient;
            $user->name=$request->fname;
            $user->lname=$request->lname;
            $user->email=$request->email;
            $user->phone_no=$request->phone;
            $user->password=NULL;
            $user->role_id = 3;
            $user->save();
            $patient->address=$request->address;
            $patient->gender=$request->gender;
            $patient->date_of_birth = $request->date_of_birth;
            $patient->id = $user->id ;
            $patient->save();
            $id_user=$patient->id;
        }
        else{  //patient already saved on system
            $id_user=$old_user->id;
        }


		$data->user_id=$id_user;
        $data->doctor_id=$request->doctor_id;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->start=$time;
        $data->end=$time;
		$data->status='Approved';
        $data->save();

        $create = token::firstOrCreate(array('user_id' => $id_user,'doctor_id' => $request->doctor_id));
        $create->save();

        return response()->json(['success'=>'Successfully']);
      }
	  public function edit(Request $request)
      {

		$appointment = appointment::find($request->id);

        $time = $request->date.' '.$request->time.':00';
		$appointment->start=$time;
        $appointment->end=$time;
        $appointment->time=$request->time;
        $appointment->save();


        return response()->json(['success'=>'Successfully']);
      }
	public function newindex(Request $request)
    {
        $doctors = Doctor::join('users', 'users.id', '=', 'doctors.id')
               ->get();
        $date = date('Y-m-d',time());
		if($request->ajax())
			{
				   $doctor = $request->doctor;

				   /*$data= DB::table('appointments')
                         ->select('*')
                         ->where('doctor_id', '=', $doctor)
							->get();*/
					/*$data = Event::whereDate('start', '>=', "2022-04-01 00:00:00" )
					    ->whereDate('end',   '<=', "2022-05-01 00:00:00")
						->where('doctor_id', '=', $request->doctor)
						->get();*/

                    $data = User:: join('appointments', 'users.id', '=', 'appointments.user_id')
                        ->whereDate('appointments.start', '>=', "2022-04-30 00:00:00" )
					    ->whereDate('appointments.end',   '<=', "2022-10-30 00:00:00")
						->where('appointments.doctor_id', '=', $request->doctor)
						->get();

				   return response()->json($data);


		}

    	return view('admin.new_appointments',compact('doctors','date'));
    }


    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		/*if($request->type == 'add')
    		{
    			$event = Event::create([
    				'user_name'		=>	$request->user_name,
                    'doctor_id'		=>	$request->doctor,
                    'phone_no'		=>	$request->phone_no,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}*/

    		if($request->type == 'update')
    		{
    			$event = Appointment::find($request->id)->update([

    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Appointment::find($request->id)->delete();
                return response()->json($event);
    		}
    	}
    }
}
