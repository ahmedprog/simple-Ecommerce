<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\InDirect;
use App\Commession;
use App\Rules\checkRefeler;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * In direct  users after registration.
     *
     * @var array
     */

    protected  $grandparents=[];

    /**
     * In direct  users after registration.
     *
     * @var int
     */
    protected  $countUser;
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(Request $request)
    {
        $validator=$this->validator($request->all());

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->messages()]);
        }
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        return response()->json(true,200);
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator=Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'govid' => 'required|numeric|min:14|unique:users',
            'mobile'=>'required|numeric|min:11',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'refeler_id'=>['nullable','numeric','exists:users,id',function($attr , $value,$fail){
                $count =User::where('refeler_id',$value)->count();
                if($count >= 5){
                    $fail(':attribute This refeler Id has no place && he have 5 refeler');
                }
            }]
        ]);
        return $validator;

     
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        //hashing  password 
        $data['password']=bcrypt($data['password']);
        $data['status_id']=2;
        //check if have refeler
         if($data['refeler_id'] !==null){
             //pass date to function indirect 
            $this->indirect($data['refeler_id']);
        }
      //create new user
      $newuser=User::create($data);      
    //    create Commession row to  this user 
    Commession::create([
            'user_id'=>$newuser->id,
            'commession'=>0
        ]);
               
    //check if array $grandparents  not empty
        if(!empty($this->grandparents)){
            // if true loop in this array 
            foreach($this->grandparents as $key=> $grandparent ){
                //to create new raw into InDirect table for every parent with our user   
                InDirect::create([
                    'user_id'=>$newuser->id,
                    'level'=>$key+2,
                    'inDirect_user'=> $grandparent
                  ]);      
            }  
        }
        //retutn object of user data 
       return $newuser;
    }
    protected function indirect($refelerid){
       
          //get data for my direct parent and assign  into var refeler 
          //and transfer from object to array  
              $refeler= User::where('id',$refelerid)->first()->toArray();
              //check if parent has refeler_id(parent) not null
              if($refeler['refeler_id'] !==null){
                  //if true assign  his refeler_id(parent) into our array grandparents[]
                  $this->grandparents[]=$refeler['refeler_id'];            
                  //and send $refeler(data parent) to our function again
                  $this->indirect($refeler['refeler_id']);    
              }
              //finally retutn all  grandparents  in array $grandparents
                  return $this->grandparents;
    }



}
