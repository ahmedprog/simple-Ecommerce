<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\InDirect;
use App\Orders;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::user()->id;
        $direct['products']=$direct['accounts']=$direct['commessions']=$direct['payments']=0;        
        $indirect['products']=$indirect['accounts']=$indirect['commessions']=$indirect['payments']=0;                
        
        $helpr= new helperController;
        $users= $helpr->Children_grandchildren($id);
         $directsUser=$users['direct-level'];
         $direct['accounts']=$directsUser->count();
         foreach($directsUser as $directUser){
            if($directUser->orders->count()!==0){
                $direct['payments']=$directUser->orders->sum('amount');
                $direct['commessions']=($direct['payments']*.10);
                $direct['products']=$directUser->orders->count();
            }
        }

         $indirects=InDirect::where('inDirect_user',$id)->get(); 
        $indirect['accounts']=$indirects->count();

        foreach($indirects as $indirectUser){             
            $childOrder=$indirectUser->childOrders;
              
            if($childOrder->count()!==0){
                $indirect['payments']=$childOrder->sum('amount');
                $indirect['commessions']=($direct['payments']*.02);
                $indirect['products']=$childOrder->count();
            }
        }
        
         $cashOuts=Orders::where('user_id',$id)->get();
        return view('payment',compact('direct','indirect','cashOuts'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $Payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $Payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $Payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $Payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $Payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $Payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $Payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $Payment)
    {
        //
    }
}
