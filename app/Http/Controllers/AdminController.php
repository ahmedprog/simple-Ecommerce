<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;
use App\Orders;
use App\stasus;


class AdminController extends Controller
{
    public function showlogin(){
        //check if admin login
        if(!empty(Auth::guard('admins')->user('admin'))){
        return Redirect('admin');
        }

        return view('cpanel.login');
    }




public function allusers($filterId=null){
    $data['users'] = User::latest();
//        ;
    if ($filterId != null){
        $data['filterId']=$filterId;
        $data['users']->where('status_id',$filterId);
    }
    $data['users']=$data['users']->paginate(10);
    $data['statuses'] = stasus::all();
    return view('cpanel.users',$data);
}
public function updateuser(Request $request , $id){

    $data=$this->validate( $request,[
        'name' => 'required|string|max:255',
        'address' => 'required|string',
        'mobile'=>'required|numeric|min:11',
        'status_id'=>'required|string'
    ]);
    $newdata= User::find($id)->update([
        'name' =>$data['name'],
        'address' => $data['address'],
        'mobile'=>$data['mobile'],
        'status_id'=>$data['status_id'],
        
    ]);   
    return redirect('admin/users')->with('success' ,'Done Update user Successfully');
}
public function destroy($id)
{
    User::find($id)->delete();
    return redirect('/admin/users')
                    ->with('success','User deleted successfully');
}
public function profile($id){
    $user = User::findOrfail($id);
    $helpr= new helperController;
   $helpr->Children_grandchildren($id);
    $carrntLevel=$helpr->carrntLevel();
    $cashOuts=Orders::where('user_id',$id)->get();
    
    return view('cpanel.profile',compact('user','carrntLevel','cashOuts'));  
    
}
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        
        $admin=Auth::guard('admins');
        $remember = $request->remember;

        if($admin->attempt(['email'=>$request->email,'password'=>$request->password],$remember)){
            return redirect('admin')->with('success' ,'You are logged in!
            ');
        }
        else{
            return redirect('admin/login')->with('error' ,'wrong password or email');
        }
        
    }
    public function logoutAdmin(){
        Auth::guard('admins')->logout();
        return Redirect('admin');
        
    }
    public function edit(){
        $admin=Auth::guard('admins')->user('admin'); 

        return view('cpanel.admin_control',compact('admin'));  
        
    }


    public function updateAdmin(Request $request ){
        $admin=Auth::guard('admins')->user('admin');
        $data=$this->validate($request,[
        'Current'=>'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6', 
        'password_confirmation' => 'required|min:6|same:password',
        
        ]);
        if (\Hash::check($data['Current'], $admin->password)) {
            $newdate= Admin::find($admin->id)->update([
                'email'=>$data['email'],
                'password'=>bcrypt($data['password'])
               ]);
               return redirect('admin')->with('success' ,'Done Update Admin Control Successfully');  
        
        }else{
            return redirect('/admin/control')->with('error' ,'Current Password is wrong');  
            
        }
        
         
    }
}
