<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionManagerController extends Controller
{
    public function dashboard(){
        return view('region_manager.dashboard');

    }

    public function add_team(){
        return view('region_manager.add_team',['regions'=>AdminController::regions()]);
    }
    
}
