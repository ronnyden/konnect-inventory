<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionManagerController extends Controller
{
    public function dashboard(){
        return view('region_manager.dashboard');

    }

    public function add_team(){
        return view('region_manager.add_team',['regions'=>AdminController::regions()]);
    }

    public function getRegionManagers(){
        $managers = User::select('fname','lname','email','phone','region','idnumber')
                                      ->where('user','regional_manager')
                                      ->get();
        return response()->json($managers);
    }

    public function viewRegionManagers(){
          return view('region_manager.viewmanagers',['region_managers'=>$this->getRegionManagers()]);
    } 
    
    
}
