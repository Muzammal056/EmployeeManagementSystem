<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;
class CompanyController extends Controller
{

  function uploadLogo(Request $request)
    {
   
      

    // Echoing here might not be necessary, especially if you are using AJAX
    // echo "here is";

    // Validate the uploaded file
    $request->validate([
      
      'compLogo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
  ]);
   
  $uploadedFile = $request->file('compLogo');
  echo " $uploadedFile";
  // Store the file in the 'uploads' directory under the 'public' disk
  $originalName = $uploadedFile->getClientOriginalName();
  $path = $uploadedFile->storeAs('uploads', $originalName, 'public');
  
  // Generate the full URL to the uploaded file
  // $url = asset('storage/' . $path);

  // Redirect to the 'ind' route or adjust as needed
  return view("company", ['url' => $path]);
}

    function companiesData(){
    $company=DB::select("SELECT *from company");
      $employee=DB::select("SELECT employee.id, employee.empFname, employee.empLname, employee.empEmail, employee.empPhone, company.compName, company.compLogo  
      FROM employee
      JOIN company ON company.id = employee.company_id");
        // $employee = DB::table('employee')
        // ->select('employee.id', 'employee.empFname', 'employee.empLname', 'employee.empEmail', 'employee.empPhone', 'company.compName', 'company.compLogo')
        // ->join('company', 'company.id', '=', 'employee.company_id')
        // ->paginate(10); // Adjust the number as per your requirement

        // $company=DB::table('company')
    
        // ->paginate(10);
        //   $employee=DB::select("SELECT employee.id, employee.empFname, employee.empLname, employee.empEmail, employee.empPhone, company.compName, company.compLogo  
        //   FROM employee
        //   JOIN company ON company.id = employee.company_id");
        //     $employee = DB::table('employee')
        //     ->select('employee.id', 'employee.empFname', 'employee.empLname', 'employee.empEmail', 'employee.empPhone', 'company.compName', 'company.compLogo')
        //     ->join('company', 'company.id', '=', 'employee.company_id')
        //     ->paginate(1); // Adjust the number as per your requirement
    




        return response()->json(['company' => $company, 'employee' => $employee]);

          //  return view("index",compact("company","employee"));


            
    }

function insertCompanyData(request $data)
{
  $validator = Validator::make($data->all(), [
    'compEmail' => 'required|unique:company,compEmail',
    'compWeb' => 'required|unique:company,compWebsite',
    'compName' => 'required|unique:company,compName',
    'compLogo' => 'required|unique:company,compLogo'
], [
    'required' => 'The :attribute field is required.',
    'unique' => 'The :attribute is already taken.'
]);

if ($validator->fails()) {
    return response()->json(['errors' => $validator->errors()], 422);
}

if ($validator->fails()) {
    dd($validator->errors(), $data->all()); // Debug output
    return redirect('/')
        ->withErrors($validator)
        ->withInput();
}


$companyName=$data->input("compName");
$email=$data->input("compEmail");
$website=$data->input("compWeb");
$logo=$data->input("compLogo");
$data=array("compName"=>$companyName,'compLogo'=>$logo,'compEmail'=>$email,'compWebsite'=>$website);
        
 DB::table("company")->insert($data);
 Mail::to($email)->send(new TestEmail($companyName));
 //return view("ind");
}
function updateLinkForCompany(request $req){
  $id=$req->input("id");
  
  $company=DB::select("SELECT *from company 
  where id=$id");
    $employee=DB::select("SELECT employee.id, employee.empFname, employee.empLname, employee.empEmail, employee.empPhone, company.compName, company.compLogo  
    FROM employee
    JOIN company ON company.id = employee.company_id");
      
        return response()->json(['updateCompany' => $company, 'updateEmployee' => $employee]);

         // return view("update_company_data",compact("company","employee"));
      
     
}




function updateCompanyData(Request $data){
  $id = $_POST['id'];
  
  $id=$data->input("id");
  $companyName=$data->input("compName");
  $email=$data->input("compEmail");
  $website=$data->input("compWeb");
  $logo=$data->input("compLogo");
  $existingValues = DB::table('company')->where('id', $id)->first();

  // Validate input data
  $rules = [
      'compEmail' => 'required|email',
      'compWeb' => 'required',
      'compName' => 'required',
      'compLogo' => 'required',
  ];
  
  // Check if the values have changed before applying the unique validation
  if ($email !== $existingValues->compEmail) {
      $rules['compEmail'] .= '|unique:company,compEmail';
  }
  
  if ($website !== $existingValues->compWebsite) {
      $rules['compWeb'] .= '|unique:company,compWebsite';
  }
  
  if ($companyName !== $existingValues->compName) {
      $rules['compName'] .= '|unique:company,compName';
  }
  
  if ($logo !== $existingValues->compLogo) {
      $rules['compLogo'] .= '|unique:company,compLogo';
  }
  
  $validator = Validator::make($data->all(), $rules, [
      'required' => 'The :attribute field is required.',
      'email' => 'The :attribute must be a valid email address.',
      'unique' => 'The :attribute is already taken.'
  ]);
  
  if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()], 422);
  }

  
  $data=array("compName"=>$companyName,'compLogo'=>$logo,'compEmail'=>$email,'compWebsite'=>$website);
  DB::table('company')->where('id', $id)->update($data);
  return redirect("ind");
  

}
function deleteCompanyData(request $data)
{
    
    $id=$data->input("id");

 DB::table("company")->where('id', $id)->delete();
 return redirect('ind');
}


}