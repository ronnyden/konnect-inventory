<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function createAdminReport(Request $request){
        $request->validate([
            'start_date'=>'required|date',
            'end_date'=>'required|date',
            'allocations'=>'required|integer',
            'orders'=>'required|integer',
            'shotages'=>'required|integer'
        ]);

        DB::beginTransaction();
        try{
            DB::table('admin_reports')->insert([
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
                'allocations'=>$request->allocations,
                'orders'=>$request->orders,
                'shortages'=>$request->shortages,
                'comment'=>$request->comment,
                'challenge'=>$request->challenge
            ]);
            return response()->json([
                'message'=>"Data submitted succesfully"
            ]);
        }catch(QueryException $ex){
            return response()->json([
                'errorCode'=>500,
                'errorMessage'=>"Something wrong happened while processing request"
            ]);
        }
        
    }
}
