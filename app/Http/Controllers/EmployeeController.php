<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
    function companiesData(){
        $company=DB::select("SELECT *from company");
          $employee=DB::select("SELECT employee.id, employee.empFname, employee.empLname, employee.empEmail, employee.empPhone, company.compName, company.compLogo  
          FROM employee
          JOIN company ON company.id = employee.company_id");
            
           
                return view("index",compact("company","employee"));
        }
    
    function insertEmployeeData(request $data)
{
$FName=$data->input("empFname");
$LName=$data->input("empLname");
$email=$data->input("empEmail");
$phone=$data->input("empPhone");
$company_id=$data->input("companyId");

$data=array("empFname"=>$FName,"empLname"=>$LName,'empEmail'=>$email,'empPhone'=>$phone,'company_id'=>$company_id);
       
 DB::table("employee")->insert($data);

 return redirect("ind");
}

function updateLinkForEmployee(request $req){
    $id=$req->input("id");
    
      $employee=DB::select("SELECT employee.id, employee.empFname, employee.empLname, employee.empEmail, employee.empPhone  
      FROM employee
      
      where id=$id");
        
       
            return view("update_employee_data",compact("employee"));
        
       
  }

function updateEmployeeData(request $data)
{
    $id=$data->input("id");
$FName=$data->input("empFname");
$LName=$data->input("empLname");
$email=$data->input("empEmail");
$phone=$data->input("empPhone");


$data=array("empFname"=>$FName,"empLname"=>$LName,'empEmail'=>$email,'empPhone'=>$phone);
       
 DB::table("employee")->where('id', $id)->update($data);

 return redirect("addEmployee");
}

function deleteEmployeeData(request $data)
{
    
    $id=$data->input("id");

 DB::table("employee")->where('id', $id)->delete();
}

}