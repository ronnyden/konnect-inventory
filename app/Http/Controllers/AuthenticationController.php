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
        return response()->json([
          'type'=>'success',
          'user'=>auth()->user()]);
      //   if(auth()->user()->user == 'admin'){
      //     //  return redirect()->intended('admin/dashboard');
      //     return response()->json([
      //       'user'=>auth()->user()->user,
      //       'region'=>auth()->user()->region]);
      //   }
      //   else if(auth()->user()->user == 'regional_manager'){
      //     // return  redirect()->intended('region_manager/dashboard');
      //     return response()->json([
      //       'user'=>auth()->user()->user,
      //       'region'=>auth()->user()->region]);
      //   }
      //   else if(auth()->user()->user == 'delivery_team'){
      //     // return   redirect()->intended('delivery_team/dashboard');
      //     return response()->json([
      //       'user'=>auth()->user()->user,
      //       'region'=>auth()->user()->region]);
        
      // }

    }else{
        // return back()
        // ->withInput()
        // ->with('error',"Wrong login cridentials");

        return response()->json([
          'type'=>'failed',
          'message'=>'Wrong login cridentials'         
      ]);
      }
    }

    public function logout(Request $req){
      Auth::logout();
     
        $req->session()->invalidate();
     
        $req->session()->regenerateToken();
     
        return redirect('/');
    }
  
}
