<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FullCalenderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/doctor', [DoctorController::class,'homedoctor']);
Route::get('/view_patients', [DoctorController::class,'addview'])->name('view_patients');
//Route::get('/mypatients', [DoctorController::class,'mypatients']);
Route::get('/addprescription', [DoctorController::class,'addprescription']);
Route::get('/write_prescription/{id}', [DoctorController::class,'write_prescription']);
Route::get('/view_prescription/{id}', [DoctorController::class,'view_prescription']);
Route::get('/write_prescription_my_patients/{id}', [DoctorController::class,'write_prescription_my_patients']);
Route::get('/addprescription/search', [DoctorController::class,'search'])->name('search');;
Route::post('/save_prescription/{id}', [DoctorController::class,'save_prescription']);
Route::get('/view_prescription2{id}', [DoctorController::class,'view_prescription2']);
Route::get('/remove/{id}', [DoctorController::class,'remove']);

//////////////////////////////////////\
Route::get('/mypatients', [DoctorController::class,'index']);
Route::get("search",[DoctorController::class,'search']);
Route::get("search2",[DoctorController::class,'search2']);
Route::get('/add_doctor_view', [AdminController::class,'addview']);
Route::post('/upload_doctor', [AdminController::class,'upload']);
Route::get('/add_appoint', [AdminController::class,'add_appoint']);
Route::post('/appointment', [HomeController::class,'appointment']);
Route::get('/myappointment', [HomeController::class,'my_appointment']);
Route::get('/update_appoint/{id}', [HomeController::class,'update_appoint']);
Route::post('/edit_appoint/{id}', [HomeController::class,'edit_appoint']);
Route::get('/edit_appoint/{id}', [HomeController::class,'edit_appoint']);
Route::get('/skip_medical_record', [HomeController::class,'skip']);
Route::get('/editInfo/{id}', [HomeController::class,'edit_my_info']);
Route::post('/submiteditform', [HomeController::class,'submit_edit_form']);
Route::get('/addmedicalrecord', [HomeController::class,'add_medical_record']);
Route::get('/showappointments', [AdminController::class,'showappointments']);
Route::get('/approved/{id}', [AdminController::class,'approved']);
Route::get('/canceled/{id}', [AdminController::class,'canceled']);
//Admin Dashboard : Manage Doctors
Route::get('/showdoctors', [AdminController::class,'showdoctors']);
Route::get('/delete_app/{id}', [AdminController::class,'delete_app']);
Route::get('/deletedoctor/{id}', [AdminController::class,'deletedoctor']);
Route::get('/updatedoctor/{id}', [AdminController::class,'updatedoctor']);
Route::post('/editdoctor/{id}', [AdminController::class,'editdoctor']);
//Admin Dashboard : Manage Patients
Route::get('/add_patient_view', [AdminController::class,'add_patient_view']);
Route::post('/upload_patient', [AdminController::class,'uploadPatient']);
Route::get('/show_patients', [AdminController::class,'showpatients']);
Route::get('/deletepatient/{id}', [AdminController::class,'deletepatient']);
Route::get('/updatepatient/{id}', [AdminController::class,'updatepatient']);
Route::post('/editpatient/{id}', [AdminController::class,'editpatient']);
//Admin Dashboard : Manage news
Route::get('/add_post_view', [AdminController::class,'add_post']);
Route::post('/upload_news', [AdminController::class,'upload_news']);
Route::get('/update_post/{id}', [AdminController::class,'updatepost']);
Route::post('/edit_post/{id}', [AdminController::class,'editpost']);
Route::get('/deletepost/{id}', [AdminController::class,'delete_post']);
Route::get('/show_news', [AdminController::class,'shownews']);
//Admin Dashboard : Manage admins
Route::get('/add_admin', [AdminController::class,'add_admin_view']);
Route::post('/upload_admin', [AdminController::class,'uploadAdmin']);
Route::get('/show_admins', [AdminController::class,'showadmins']);
Route::get('/deleteadmin/{id}', [AdminController::class,'deleteadmin']);
Route::get('/updateadmin/{id}', [AdminController::class,'updateadmin']);
Route::post('/editadmin/{id}', [AdminController::class,'editadmin']);
//Manage Medical records
Route::get('/record', [DoctorController::class,'record']);
Route::post('/add_record',[DoctorController::class,'add_record']);
Route::get('/view_records', [AdminController::class,'show_records']);
Route::get('/update_record/{id}', [DoctorController::class,'updaterecord']);
Route::post('/edit_record/{id}', [DoctorController::class,'edit_record']);
Route::get('/delete_record/{id}', [DoctorController::class,'delete_record']);
Route::get('/view_prescriptions',[AdminController::class,'view_prescriptions']);

//Route::get('full-calender', [FullCalenderController::class, 'index']);
Route::post('full-calender/action', [FullCalenderController::class, 'action']);
Route::post('/calendar_add_appointment', [FullCalenderController::class,'appointment']);
Route::post('/submit-form', [FullCalenderController::class,'store']);
Route::post('/send-date', [FullCalenderController::class,'subdate']);
Route::post('/send-start-end', [FullCalenderController::class,'sub_start_end']);
Route::post('/edit-form', [FullCalenderController::class,'edit']);
Route::get('new_appointments', [FullCalenderController::class, 'newindex']);

//diagnosis
Route::get('diagnosis',[HomeController::class,'diagnosis']);

