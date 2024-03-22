<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserAthurizationController extends Controller
{
    function UserLogout(request $req){
        session(['user'=>0]);
return redirect('login');
    }
    function UserLogin(request $request){


       

    $email = $request->input('username');
    $pass=$request->input('password');
    $user=DB::select("SELECT *from user");
    session(['user'=>0]);
            
    foreach($user as $r){
       

    if ($r->email==$email && $pass==$r->passwords) {
        // Authentication successful
        session(['user'=>1]);
        return redirect('sessionControl')->with('text',1);
    }
   
    // Authentication failed
    
      return redirect('login')->with('error_message', 'Invalid username or password');

}
    }        
   function sessionControll(){
    if(session('user')==1){
        return redirect('addEmployee');
    }
    else{
        return redirect('login');
    }
   }
}
