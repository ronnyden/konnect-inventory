<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function stockForm(){
        return view('stock.create',['categories'=>AdminController::categories()]);
    }

    public function viewStock(){
        if(auth()->user()->user == 'admin'){
            $stock =$this->getAvailableStock();
        }else{
            $stock = $this->getStockPerRegion(auth()->user()->region);
        }
        return view('',['stock'=>$stock]);
    }

    public function getAvailableStock(){
        return DB::table('stock')
                 ->leftJoin('products','stock.product_code','=','products.code')
                 ->select('name','product_code','count')
                 ->orderBy('count','desc')
                 ->get();
    }

   public function getStockPerRegion($region){
          return DB::table('stock')
                    ->leftJoin('products','stock.product_code','=','products.code')
                    ->select('name','product_code','count')
                    ->where('region',$region)
                    ->orderBy('count','desc')
                    ->get();
        
   }

   

    public function generateCategoryCode(){
          $catcode = rand(100,999);
          return $catcode;
    }
    public function generateProductCode(){
          $product_code = rand(10000,99999);
          return $product_code;
    }

    public function generateBarcode($product_code){
        $code = DB::table('products')->select('code')->where('code',$product_code);
         return view('profile',['barcode'=>$code]);

    }

}
