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
      return view('admin.dashboard',['stockworth'=>StockController::totalStockworth()]);
   }
   public static function regions(){
      return [
         'Warehouse',
         'ZMM',
         'G44',
         'KWT1',
         'G45S',
         'G45N1',
         'G45N2',
         'R&M',
         'KWT2',
         'LSM',
         'HTR'
      ];
   }

   public static function categories(){
      return [
         'Maize',
         'Baking',
         'Meat',
         'Milk',
         'Cooking',
         'Grocery',
         'Laundry'

      ];
   }

    public function createRegionManager(Request $req){
         $req->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email|unique:users',
            'region'=>'required|string'
         ]);
         $manager = User::create([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'region'=>$req->region,
            'user'=>'regional_manager',
            'password'=>Hash::make(123456)
         ]);
         if($manager){
         return back()->with('success','Request successfull');
         }else{
            return back()
            ->withInput()
            ->with('error','Something went wrong while processing request');
         }
    }

    public function createDeliveryPerson(Request $req){
        $req->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email|unique:users',
            'idnumber'=>'required',
            'region'=>'required|string'
         ]);
          $user = User::create([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'email'=>$req->email,
            'idnumber'=>$req->idnumber,
            'region'=>$req->region,
            'phone'=>$req->phone,
            'user'=>'delivery_team',
            'password'=>Hash::make(123456)
          ]);
          if($user){
            return back()->with('success','Delivery personnel added successfully');
          }else{
            return back()
            ->withInput()
            ->with('error','Something went wrong');
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
