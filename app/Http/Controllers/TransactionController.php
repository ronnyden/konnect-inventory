<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{   

    public function viewTransactions(){
        return view('transactions.allocations',['transactions'=>$this->getTransactions()]);
    }
    public function getTransactions(){
        $transactions = DB::table('transactions')
        ->leftJoin('products','transactions.product_code','=','products.code')
        ->select('date','transaction_code','name','brand','origin','transactions.count','dest','product_code','user','value')
        ->orderBy('date','asc')
        ->get();
        if ($transactions){
            return $transactions;
        }
    }

    public function getTransactionByCode($code){
       $transaction = DB::table('transactions')->find($code);
       return $transaction;
    }
}
