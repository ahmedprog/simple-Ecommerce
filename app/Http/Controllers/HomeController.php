<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Orders;
use App\User;

use App\InDirect;
use App\Http\Controllers\helperController;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         Auth::user()->id;
    
                $helpr= new helperController;
                 $levels= $helpr->Children_grandchildren(Auth::user()->id);
                 $Dirs= User::where('refeler_id',Auth::user()->id)->latest('created_at')->limit(5)->get();                    
                $InDirs= InDirect::where('inDirect_user',Auth::user()->id)->latest('created_at')->get();
                $latestSignup=[];
                if($Dirs !==null){
                    foreach($InDirs as $k=>  $InDir ){
                        $latestSignup[]= User::where('id',$InDir->user_id)->first();
                        
                    }
                    // return $latestSignup;
                    
                    foreach($Dirs as $Dir ){
                        $latestSignup[]= $Dir;
                        
                    }
                }
                
                // return $InDirs;
                // 
              
                $latestSignup = array_slice($latestSignup, 0, 5, true);            
              $carrntLevel=$helpr->carrntLevel();
              $latestout=Auth::user()->orders->first();
              $latestout=$latestout['amount'];
                if($latestout == null){
                 $latestout=0.00;
              }
              
            $latestin=Auth::user()->commession->commession;
        return view('index',compact('carrntLevel','latestout','latestin','latestSignup'));
    }



    
 

}
