<?php

namespace App\Http\Controllers;

use App\Level;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\helperController;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Auth::user()->id;
        $helpr= new helperController;
        $levels= $helpr->Children_grandchildren(Auth::user()->id);
        $coutner=[];
        foreach($levels as $levelname => $Countlevels){
            if($levelname == 'indirect'){
                foreach($Countlevels  as $key => $Countlevel){
                    $coutner[$key]=$Countlevel->count();
                }
            }else{
            $coutner[$levelname]=$Countlevels->count();
            
            }
        }
        $coutner; 
        return view('levels',compact('coutner'));
    }

    
}
