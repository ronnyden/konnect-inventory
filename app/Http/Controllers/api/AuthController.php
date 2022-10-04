<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req){
        $cridentials = $req->only(['email','password']);
        if(Auth::guard('web')->attempt($cridentials)){
          return response()->json([
            'type'=>'success',
            'user'=>auth()->user()]);
      }else{
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
