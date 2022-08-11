<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function stockForm(){
        return view('stock.create',['categories'=>AdminController::categories()]);
    }

    public function addStock(Request $req){
        $req->validate([
            'category'=>'required|string',
            'product_name'=>'required',
            'quantity'=>'required',
            'count'=>'integer',
            'brand'=>'string',
        ]);
        $product_code = $this->generateProductCode();

        $stock = DB::table('products')->insert([
            'category'=>$req->category,
            'name'=>$req->product_name,
            'brand'=>$req->brand,
            'quantity'=>$req->quantity,
            'count'=>$req->count,
            'code'=>$product_code
            
        ]);
        return back()->with('success','Product successfully added');
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
