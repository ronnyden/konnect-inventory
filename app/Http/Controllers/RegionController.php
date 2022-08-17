<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegionController extends Controller
{
    public function getRegionTransactions($region){
        $transactions = DB::table('transactions')
        ->leftJoin('products','transactions.product_code','=','products.code')
        ->where('region',$region)
        ->select('date','transaction_code','name','brand','quantity','count','')
        ->orderBy('date')
        ->get();
    }

    public function getRegionDeliveryteam($region){
        $deliveryTeams = User::select('fname','lname','email','phone','idnumber')
                         ->where('region',$region)
                         ->orderBy('fname','asc')
                         ->get();
       }

}