<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InsertCompanyController;
use App\Http\Controllers\UserAthurizationController;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('ind', [CompanyController::class,'companiesData']);
Route::post('/logo', [CompanyController::class,'uploadLogo'])->name('logo');
//Route::post('/logo', 'CompanyController')->name('logo');

Route::get('addEmployee', [EmployeeController::class,'companiesData']);
Route::view('login','login');
Route::post('user', [UserAthurizationController::class,'UserLogin']);
Route::get('logout', [UserAthurizationController::class,'UserLogout']);
Route::get('sessionControl', [UserAthurizationController::class,'sessionControll']);
Route::post('company', [CompanyController::class,'insertCompanyData']);
Route::post('companyUpdate', [CompanyController::class,'updateCompanyData']);
Route::post('employeeUpdate', [EmployeeController::class,'updateEmployeeData']);
Route::post('deleteEmployee', [EmployeeController::class,'deleteEmployeeData']);
Route::post('deleteCompany', [CompanyController::class,'deleteCompanyData']);
Route::post('updateCompanyLink', [CompanyController::class,'updateLinkForCompany']);
Route::post('updateEmployeeLink', [EmployeeController::class,'updateLinkForEmployee']);
Route::view('updateComp','update_company_data');
//Route::get('updateCom','update_company_data');

Route::view('updateEmp','update_employee_data');
Route::view('index','index');
Route::view('addCompany','company');
Route::view('Employee','employee');

Route::post('employee', [EmployeeController::class,'insertEmployeeData']);
//Route::get('company', [InsertCompanyController::class,'inserData']);
Route::view("contact",'contact');
Route::view('about','about')->middleware('protectedPage','protectedPag');
Route::post('data', [myController::class,'show']);


Route::view('cdn','cdn');




//Route::group(['middleware'=>['protectedPage','protectedPag']], function () {
    

    Route::get('send-mail', function () {
        $mailData = [
            'name' => "muzammal",
            'email' => 'muzammal@gmil.com'
        ];
    
        Mail::to("muzammalm092@gmail.com")->send(new TestEmail($mailData));
    });