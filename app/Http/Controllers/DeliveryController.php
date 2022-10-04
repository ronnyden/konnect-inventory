<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    public function createDeliveryPerson(Request $req){
        $req->validate([
            'fname'=>'required|string',
            'lname'=>'required|string',
            'email'=>'required|email|unique:users',
            'idnumber'=>'required',
            'region'=>'required|string'
         ]);
          $user = User::create([
            'fname'=>$req->fname,
            'lname'=>$req->lname,
            'email'=>$req->email,
            'idnumber'=>$req->idnumber,
            'region'=>$req->region,
            'phone'=>$req->phone,
            'user'=>'delivery_team',
            'password'=>Hash::make(123456)
          ]);
          if($user){
            return response()->json([
                'statusCode'=>200,
                'status'=>'succes',
                'message'=>'User succesfully created'
            ]);
          }else{
            return response()->json([
                'statusCode'=>200,
                'status'=>'error',
                'message'=>'Something went wrong'
            ]);
          }
    }
    
    public function getAssignedOrders(){
        $orders = DB::table('deliveries')
        ->join('users','deliveries.ks_emp_id','=','users.id')
        ->select('date','fname as firstname','lname as lastname','order_id','order_reference as reference','order_date','delivery_date','client as client_name','client_contact as contact','delivery_location as location','status')->
        where('user','delivery_team')
        ->get();

        return response()->json($orders);
    }
    public function getAssignedOrdersByEmployeeId($id){
        $orders = DB::table('ks_deliveries')->select('id','order_id','ks_emp_id','status')
        ->where('ks_emp_id',$id)
        ->get()->first();
    }

    public function getDeliverypersons(){
        $team = User::select('id','fname','lname','phone','email','idnumber','region')
                ->where('user','delivery_team')
                ->orderBy('fname')
                ->get();
        return response()->json($team);
    }
public function assignOrder(Request $request){
        $request->validate([
            'order_id'=>'integer|required',
            'ks_emp_id'=>'integer|required'
        ]);
          DB::beginTransaction();
          try{
            $order = DB::table('deliveries')
            ->select('order_reference')->where('order_reference',$request->order_reference)
            ->get()->toArray();

            if(count($order) > 0){
                return response()->json([
                    'message'=>'Order already assigned to another rider'
                ]);
            }else{
               $delivery =    DB::table('deliveries')->insert([
                'date'=>Carbon::now(),
                'order_id'=>$request->order_id,
                'order_date'=>$request->order_date,
                'ks_emp_id'=>$request->ks_emp_id,
                'order_reference'=>$request->order_reference,
                'client'=>$request->client,
                'client_contact'=>$request->client_contact,
                'delivery_location'=>$request->delivery_location,
                'delivery_date'=>$request->delivery_date
        
              ]);
              DB::commit();
              if($delivery){
                return response()->json([
                    'statusCode'=>200,
                    'status'=>'success',
                    'message'=>"Order successfuly assigned for delivery"
                ]);
              } 
            }
         
          }catch(QueryException $ex){
            DB::rollBack();
                 return response()->json([
                    'statusCode'=>500,
                    'status'=>'error',
                    'message'=>'Whoops!An error occured while processing request'
                 ]);
          }
          
    }
    public function getDeliveryPersonById($id){
        $del_person = User::select('fname as firstname','lname as lastname','phone','region','email')
                       ->where(['id'=>$id,'user'=>'delivery_team'])
                       ->get()->first();
       return response()->json($del_person);
    }

    public function removeDeliveryPerson($id){
        User::find($id)->delete();
        return response()->json([
            'statusCode'=>200,
            'message'=>'Record deleted successfully'
        ]);

    }

    public function updateProfile($id){

    }


    
}