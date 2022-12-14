<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $req){
      $cridentials = $req->only(['email','password']);
      if(Auth::guard('web')->attempt($cridentials)){
        
        if(auth()->user()->user == 'admin'){
           return redirect()->intended('admin/dashboard');
        }
        else if(auth()->user()->user == 'regional_manager'){
          return  redirect()->intended('region_manager/dashboard'); 
        }
        else if(auth()->user()->user == 'delivery_team'){
          return   redirect()->intended('delivery_team/dashboard');
         
      }

    }else{
        return back()
        ->withInput()
        ->with('error',"Wrong login cridentials");

      }
    }

    public function logout(Request $req){
      Auth::logout();
     
        $req->session()->invalidate();
     
        $req->session()->regenerateToken();
     
        return redirect('/');
    }
  
}
