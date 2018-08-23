<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UserController extends Controller
{
    



public function updateMobile(Request $request ){

         $validator = Validator::make($request->all(), [
            'mobile'=>'required|numeric|min:11',
         ]);
        if ($validator->fails()) {
        // return dd($validator);
            return redirect('/')->with('open' ,'editMobile')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $id=Auth::user()->id;
        $newdata= User::find($id)->update($request->all());   
       
        return redirect('/')->with('success' ,'Done Update  Mobile Number Successfully');
    }




    public function updatePassword(Request $request ){

         $validator = Validator::make($request->all(), [
        'Current'=>'required|string',
        'password' => 'required|min:6', 
        'password_confirmation' => 'required|min:6|same:password',
         ]);
        if ($validator->fails()) {
        // return dd($validator);
            return redirect('/')->with('open' ,'editPassword')
                        ->withErrors($validator)
                        ->withInput();
        }

        if (\Hash::check($request['Current'], Auth::user()->password)) {
                   
           $newdate= User::find( Auth::user()->id)->update([
            'password'=>bcrypt($request['password'])
           ]);
           return redirect('/')->with('success' ,'Done Update Password Successfully');
           
        }  else{
           return redirect('/')->with('error' ,'Current password is wrong');
           
        }   
    }

}

