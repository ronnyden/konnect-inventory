<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
   
    public function createProduct(Request $req){
        // $req->validate([
        //     'category'=>'string',
        //     'name'=>'required|unique:products',
        //     'quantity'=>'required',
        //     'count'=>'integer',
        //     'brand'=>'string',
        // ]);
        $product_code = $this->generateProductCode();

         DB::table('products')->insert([
            'category'=>$req->category,
            'name'=>$req->product_name,
            'brand'=>$req->brand,
            'quantity'=>$req->quantity,
            'units'=>$req->units,
            'unit_cost'=>$req->unit_cost,
            'count'=>$req->count,
            'code'=>$product_code
            
        ]);
        return back()->with('success','Product successfully added');
    } 
    public static function getProducts(){
        $products = DB::table('products')->select('*')->get();
        return $products;
    }

    public function generateProductCode(){
        $product_code = rand(10000,99999);
        return $product_code;
  }
  public function generateTransactionCode(){
    $product_code = rand(1000,9999);
    return $product_code;
}

  public  function allocateProduct(Request $req){
    $req->validate([
        'code'=>'required|string',
        'count'=>'required|integer',
        'from'=>'required|string',
        'to'=>'required|string',
  ]);

  $original_count = DB::table('products')->select('count')
                   ->where('code',$req->code)->get()
                   ->toArray();
                   foreach($original_count as $count){
                    $count = $count->count;
                   }
            
           
        

  DB::table('products')
  ->where('code',$req->code)
  ->update(['count'=>($count) - ($req->count)]);

  $product_code = DB::table('products')
                           ->select('code')
                           ->where('code',$req->code)
                           ->get();
            foreach($product_code as $code){
                $code = $code->code;
            }
$unit_cost =  DB::table('products')->select('unit_cost')
              ->where('code',$code)
              ->get();
              foreach($unit_cost as $cost){
                $cost = $cost->unit_cost;
              }
if(!$code){
    DB::table('stock')
    ->insert([
      'product_code'=>$req->code,
      'region'=>$req->to,
      'count'=>$req->count
    ]);
    
    DB::table('transactions')
        ->insert([
            'date'=>Carbon::now(),
            'transaction_code'=>$this->generateTransactionCode(),
            'product_code'=>$req->code,
            'origin'=>$req->from,
            'dest'=>$req->to,
            'count'=>$req->count,
            'user'=>auth()->user()->fname."  ".auth()->user()->fname,
            'value'=>$cost * $req->count
        ]);
        return back()->with('success','Product allocated successfuly');
}else{
    DB::table('stock')
    ->where('product_code',$req->code)
    ->update(['product_code'=>$req->code]);

    DB::table('transactions')
    ->insert([
        'date'=>Carbon::now(),
        'transaction_code'=>$this->generateTransactionCode(),
        'product_code'=>$req->code,
        'origin'=>$req->from,
        'dest'=>$req->to,
        'count'=>$req->count,
        'user'=>auth()->user()->fname."  ".auth()->user()->fname,
        'value'=>$cost * $req->count
    ]);
    return back()->with('success',"Product allocated successfuly");
}
  
  


  }

}
