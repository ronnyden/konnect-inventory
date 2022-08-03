<?php

namespace App\Http\Controllers;

use App\Models\DeliveryTeam;
use App\Models\RegionManager;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function dashboard(){
      return view('admin.dashboard');
   }
    public function createRegionManager(Request $req){
         $req->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email|unique:region_managers',
            'phone'=>'integer',
            'region'=>'required|string'
         ]);
         $manager = User::create([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'password'=>Hash::make($req->password)
         ]);
         if($manager){
         return back()->with('success','Request successfull');
         }else{
            return back()->with('error','Something went wrong while processing request');
         }
    }

    public function createDeliveryPerson(Request $req){
        $req->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email|unique:region_managers',
            'phone'=>'required|integer',
            'idnumber'=>'required',
            'region'=>'required|string'
         ]);
          $user = DeliveryTeam::create([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'email'=>$req->email,
            'idnumber'=>$req->idnumber,
            'phone'=>$req->phone,
            'password'=>Hash::make($req->password)
          ]);
          if($user){
            return back()->with('success','Request successfull');
          }
    }

    public function addSupplier(Request $req){
       $req->validate([
         'company'=>'required|string',
         'email'=>'required|email',
         'contact'=>'required'
       ]);
       $supp = Supplier::create([
           'company'=>$req->company,
           'email'=>$req->email,
           'contact'=>$req->contact
       ]);

       if($supp){
        return back()->with('success','Successfuly registered');
       }else{
        return back()->with('error','Something went wrong while processing request');
       }
    }

    public function removeSupplier($id){
        $supp = Supplier::find($id);
        $supp->delete();
        return back()->with('success','Successfully deleted');

    }

}
