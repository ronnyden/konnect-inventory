<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\DeliveryTeam;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Controller
{
    public function addUser(){
        return view('superadmin.create_user');
    }
    public function createAdmin(Request $req){
        $req->validate([
            'fname'=>'string',
            'lname'=>'string',
            'email'=>'email|unique:users',

        ]);
        $user = User::create(
            [
                'fname'=>$req->fname,
                'lname'=>$req->lname,
                'email'=>$req->email,
                'user'=>'admin',
                'phone'=>$req->phone,
                'password'=> Hash::make(123456),
            ]
            );
            if($user){
                return back()->with('success',"User created successfully");
            }else{
                return back()->with('error',"Something went wrong while processing request");
            }
           
    }
    

    public function getUsers($type){
        if($type == 'admins'){
            $users = User::get();
        }
        if($type == 'sales_manager'){
            $users = Manager::get();
        }
        if($type == 'delivery_team'){
           $users = DeliveryTeam::get();
        }
        return $users;
    }
  public function deleteUser($type,$id){
       if($type == 'admin'){
        $user = Admin::find($id);
        $user->delete();
        return back()->with('success','Successfuly deleted ');
       }
       if($type == 'sales_manager'){
        $user = Manager::find($id);
        $user->delete();
        return back()->with('success','Successfuly deleted ');
       }

       if($type == 'delivery_team'){
        $user = DeliveryTeam::find($id);
        $user->delete();
        return back()->with('success','Successfuly deleted ');
       }

  }

}
