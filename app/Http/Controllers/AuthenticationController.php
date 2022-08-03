<?php

namespace App\Http\Controllers;

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
        else if(auth()->user()->user == 'sales_manager'){
          return  redirect()->intended('/sales_manager/dashboard');
        }
        else if(auth()->user()->user == 'delivery_team'){
          return   redirect()->intended('/delivery_team/dashboard');
        
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
