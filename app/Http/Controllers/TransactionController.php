<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{   

    public function viewTransactions(){
        if(auth()->user()->user == 'admin'){
            $transactions = $this->getAllTransactions();
        }
        if(auth()->user()->user == 'regional_manager' || auth()->user()->user == 'delivery_team'){
            $transactions = $this->getTransactionByRegion(auth()->user()->region);
        }
        return view('transactions.allocations',[
            'transactions'=>$transactions,
            'allocations'=>$this->getAllocationTransactions()
            
        ]);
    }
    public function getAllTransactions(){
        return  DB::table('transactions')
        ->leftJoin('products','transactions.product_code','=','products.code')
        ->select('date','transaction_code','name','brand','origin','transactions.count','dest','product_code','user','value')
        ->orderBy('date','asc')
        ->get();
        
    }

    public function getTransactionByCode($code){
       $transaction = DB::table('transactions')->find($code);
       return $transaction;
    }

    public function getTransactionByRegion($region){
        $transactions = DB::table('transactions')
                        ->leftJoin('products','transactions.product_code','=','products.code')
                        ->select('date','transaction_code','name','brand','origin','transactions.count','dest','product_code','user','value')
                        ->where('dest',$region)
                        ->orderBy('date','asc')
                        ->get();
        return $transactions;
    }

    public function getTransactionsByPeriod($days){
        $date = Carbon::now()->subDays($days);
        $transactions = DB::table('transactions')->where('date','>=',$date)
                        ->leftJoin('products','transactions.product_code','=','products.code')
                        ->select('date','transaction_code','name','brand','origin','transactions.count','dest','product_code','user','value')
                        ->orderBy('date','asc')
                        ->get();
        return $transactions;
    }

    public function getAllocationTransactions(){
          return  DB::table('transactions')
          ->leftJoin('products','transactions.product_code','=','products.code')
          ->select('date','transaction_code','name','brand','origin','transactions.count','dest','product_code','user','value')
          ->where('type','allocation')
          ->orderBy('date','desc')
          ->get();
    }
   
    public static function getInventoryTransactions(){
        return  DB::table('transactions')
          ->leftJoin('products','transactions.product_code','=','products.code')
          ->select('date','transaction_code','name','brand','origin','transactions.count','dest','product_code','user','value')
          ->where('type','new stock')
          ->orderBy('date','desc')
          ->get();
    }

}
