<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionManagerController extends Controller
{
    public function dashboard(){
        return view('region_manager.dashboard');
    }
}
