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
        if($req->category == 'Grocery' || $req->category == 'Meat'){
            $count = $req->quantity;
            
        }else{
            $count = $req->count;
            
        }
      
         DB::table('products')->insert([
            'category'=>$req->category,
            'name'=>$req->product_name,
            'brand'=>$req->brand,
            'quantity'=>$req->quantity,
            'units'=>$req->units,
            'unit_cost'=>$req->unit_cost,
            // 'count'=>$count,
            'code'=>$product_code
            
        ]);
       
        DB::table('stock')->insert([
           'product_code' => $product_code,
           'count'=>$count,
           'region'=>'warehouse'
        ]);

        DB::table('transactions')
        ->insert([
            'date'=>Carbon::now(),
            'transaction_code'=>$this->generateTransactionCode(),
            'product_code'=>$product_code,
            'origin'=>'inventory',
            'dest'=>'warehouse',
            'type'=>'new stock',
            'count'=>$count,
            'user'=>auth()->user()->fname."  ".auth()->user()->fname,
            'value'=>$req->unit_cost * $req->count
        ]);              
        return back()->with('success','Product successfully added');
    } 
    public static function getProducts(){
        $products = DB::table('products')
        ->leftJoin('stock','stock.product_code','=','products.code')
        ->select('*','count')->get();
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
  
  $original_count = DB::table('products')
                   ->leftJoin('stock','stock.product_code','=','products.code')
                   ->select('count','category','quantity')
                   ->where('code',$req->code)->get()
                   ->toArray();
                   foreach($original_count as $count){
                    if($count->category == 'Grocery'){
                        $count = $count->quantity;
                       
                    }else{
                        $count = $count->count;
                       
                    }

                    $product = DB::table('stock')
                    ->where('product_code',$req->code)
                    ->where('region',$req->to)
                    ->get()->first();

                    if($product){
                        DB::table('stock')->where('product_code',$req->code)
                        ->where('region',$req->from)
                        ->update([
                          'count'=>$count - $req->count
                        ]);

                     DB::table('stock')->where('product_code',$req->code)
                         ->where('region',$req->to)
                         ->update([
                          'count'=>$count + $req->count
                        ]);
                        
                         
                    }else{


                        DB::table('stock')->insert([
                            'product_code' => $req->code,
                            'count'=>$count,
                            'region'=>$req->to
                         ]);
                    }
                    
                   }
            
           
        

  

  $product_info = DB::table('products')
                           ->select('code','unit_cost','category','name','brand','units')
                           ->where('code',$req->code)
                           ->get();
            foreach( $product_info as $data){
                $code = $data->code;
                $unit_cost = $data->unit_cost;
                $category = $data->category;
                $product_name = $data->name;
                $units = $data->units;

            }

    
    DB::table('transactions')
        ->insert([
            'date'=>Carbon::now(),
            'transaction_code'=>$this->generateTransactionCode(),
            'product_code'=>$req->code,
            'origin'=>$req->from,
            'dest'=>$req->to,
            'type'=>'allocation',
            'count'=>$req->count,
            'user'=>auth()->user()->fname."  ".auth()->user()->fname,
            'value'=>$unit_cost * $req->count
        ]);
        return back()->with('success','Product allocated successfuly');

  

  }

  public function getProductsByCategory($category){
       $products = DB::table('products')->select('name','brand','unit_cost')
                       ->where('category',$category)
                       ->get();
        return $products;

  }

//   public function getProductBrands($product){
//     $brands = DB::table('products')->select('brand')
//                        ->where('')
                  
//   }

  public static function getUnits(){
   return $units = [
      'mg',
      'g',
      'kg',
      'L',
      'ml',
      'mm',
      'cm',
      'm'
    ];
  }

}
