<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegionManagerController extends Controller
{
    public function dashboard(){
        return view('region_manager.dashboard');

    }
    public function createRegionadmin(Request $req){
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
         return response()->json([
            'statusCode'=>200,
            'status'=>'success',
            'message'=>'Region admin added successfully'
        ]);
         }else{
            return response()->json([
                'statusCode'=>200,
                'status'=>'error',
                'message'=>'Something went wrong while processing request'
                ]);
         }
        
    }

    public function add_team(){
        return view('region_manager.add_team',['regions'=>AdminController::regions()]);
    }

    public function getRegionManagers(){
        $managers = User::select('fname as firstname','lname as lastname','email','phone','region','idnumber')
                                      ->where('user','regional_manager')
                                      ->get();
        return response()->json($managers);
    }

    public function getRegionAdminById($id){
        $manager = User::select('fname as firstname','lname as lastname','email','phone','region','idnumber')
                        ->where(['id'=>$id,'user'=>'regional_manager'])
                        ->get()->first();
                        
    }
    public function getRegionAdminByRegion($region){
        $manager = User::select('fname as firstname','lname as lastname','email','phone','region','idnumber')
                        ->where(['user'=>'regional_manager','region'=>$region])
                        ->get()->fisrt();
                        
    }

    
    public function viewRegionManagers(){
          return view('region_manager.viewmanagers',['region_managers'=>$this->getRegionManagers()]);
    } 
    
    
}
