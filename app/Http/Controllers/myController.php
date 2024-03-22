<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\View\Components\mycomponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use \App\Models\userdetail;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class myController extends Controller
{ 
   function show(request $req){
      $data=$req->input("username");
     $req->session()->put("user", $data);
     return redirect("edit");

      // $company=DB::select("SELECT *from company");
      // $employee=DB::select("SELECT employee.id, employee.empFname, employee.empLname, employee.empEmail, employee.empPhone, company.compName, company.compLogo  
      // FROM employee
      // JOIN company ON company.id = employee.company_id");
        
       
      //       return view("welcome",compact("company"));



      //       $employee=DB::select("SELECT employee.id, employee.empFname, employee.empLname, employee.empEmail, employee.empPhone, company.compName, company.compLogo  
//         FROM employee
//         JOIN company ON company.id = employee.company_id"
//       );

// $company = DB::select("SELECT * FROM company");
//     return view("editPage",['name'=>$employee]);
   }
   
}
