<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    public function getAllInventory(){
        $iventory = DB::table('inventory')->where('type','=','new stock')
                   ->where('origin','inventory')
                   ->leftJoin('transactions','inventory.transaction_code','=','transactions.transaction_code')
                   ->leftJoin('products','iventory.product_code','=','products.code')
                   ->select('date','product_code','name','transaction_code','count')
                   ->get();
        return $iventory;
    }

    public function getIventoryByPeriod($days){
        $date = Carbon::now()->subDays($days);
        $iventory = DB::table('inventory')->where('date','>=',$date)
                    ->leftJoin('transactions','inventory.transaction_code','transactions.transaction_code')
                    ->leftJoin('products','iventory.product_code','=','products.code')
                    ->select('date','product_code','name','transaction_code','count')
                    ->get();
        return $iventory;
    }

    public function getMonthlyInventory($month){
          $inventory = DB::table('inventory')
                    ->leftJoin('transactions','inventory.transaction_code','transactions.transaction_code')
                    ->leftJoin('products','iventory.product_code','=','products.code')
                    ->select('date','product_code','name','transaction_code','count')
                    ->where('MONTH(date)',$month)
                    ->get();
    }
}
