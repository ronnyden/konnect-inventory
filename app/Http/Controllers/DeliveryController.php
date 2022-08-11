<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function viewTeam(){
        return view('deliveryteam.viewteam',['delivery_team'=>$this->getDeliveryteam()]);
    }

    public function getDeliveryteam(){
        $team = User::select('fname','lname','phone','email','idnumber','region')
                ->where('user','delivery_team')
                ->orderBy('fname')
                ->get();
        return $team;
    }
}
