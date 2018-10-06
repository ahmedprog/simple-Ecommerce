<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\InDirect;
use App\Products;
use App\Orders;

use App\Commession;


class helperController extends Controller
{
    protected $children=[];
    protected $mylevel = 0;
    
    public function Children_grandchildren($userid){
        //count direct users
         $directUsers= User::where('refeler_id',$userid)->get(['id','name','refeler_id','created_at']);

            $this->children['direct-level']=$directUsers;
//call getInDirect function to get all in direct users
             $this->getInDirect($userid);    

            return $this->children;             
    }
    
    public function getInDirect($id){
        
        $inDirect=InDirect::where('inDirect_user',$id)->get(['user_id','inDirect_user','level','created_at'])->groupBy('level');
        return   $this->children['indirect']=$inDirect;                              
        
    } 

    public function getAllUsers(){
        return $this->children;
    }


    public function carrntLevel(){
        // $this->mylevel=0;
       $users=$this->children;
        if($users['direct-level']->count() === 5 ){
            $this->mylevel=1;
            $number=5;            
            foreach($users['indirect']as $level =>  $indirect){
                if($indirect->count() === $number){
                    $this->mylevel=$level;
                    $number =$number*5;
                }
            }
        }
        return $this->mylevel;
        
    }
    public function latestSignup($id){
        $latesdirect= User::where('refeler_id',$id)->get(['id','name','refeler_id','created_at']);

        
    }
    // function array_sort_by_column(&$array, $column, $direction = SORT_ASC) {
    //     $reference_array = array();
    
    //     foreach($array as $key => $row) {
    //         $reference_array[$key] = $row[$column];
    //     }
    
    //     array_multisort($reference_array, $direction, $array);
    // }


    // check order
    public function checkorder($productId,$userId){
        //get product details
        $product=Products::findOrfail($productId);
        $amount='';
        //get real amount 
        if($product->offer == 0){
             $amount=$product->price; 
        }else{
             $amount=$product->offer; 
        }
        //get more details about user(maker order)
        $user=User::findOrfail($userId);
        //assign his money on var 
         $userMoney=$user->commession->commession;
         // check if has enough money  to make this order 
        if($userMoney >= $amount){
            //create order
            return $this->createOreder($userId,$productId,$amount);
        }else{
            return false;
            
        }
        
    }

    // create order
    protected function createOreder($userId,$productId,$amount){
    //    get user details and Parents
        $user=User::findOrfail($userId);
        $allusers=$this->Children_grandchildren($user->id);
        // return dd($allusers['direct-level'][0]->commession->commession);
        // discount amount
         $user->commession->commession -=$amount;
        if($user->commession->save()){
            // if discount amount make order
             $order=Orders::create([
                'user_id'=>$userId,
                'product_id'=>$productId,
                'amount'=>$amount
            ]);
            //distribution the commissions
            $this->amount=$amount; 
            return $this->parents($userId);
            
        }  
    }
    // distribution the commissions  for direct (parent)

    public  $grandparents=[];    
// get all parents
        public function parents($id){
              //get data for my direct parent and assign  into var refeler 
              //and transfer from object to array  
                  $refeler= User::where('id',$id)->first()->toArray();
                  //check if parent has refeler_id(parent) not null
                //   return $refeler['refeler_id'];
                  if($refeler['refeler_id'] !==null){
                      //if true assign  his refeler_id(parent) into our array grandparents[]
                      $this->grandparents[]=$refeler['refeler_id'];            
                      //and send $refeler(data parent) to our function again
                      $this->parents($refeler['refeler_id']);    
                  }
                  //finally retutn all  grandparents  in array $grandparents
                       return $this->distribution($this->grandparents);
        }
        // Make sure the right parents got the commission rate
        public function distribution(array $parents){
            $res=[];            
            foreach($parents as $key => $parent){

                $this->Children_grandchildren($parent);
                $parentLevel=  $this->carrntLevel();
                if($key === 0 ){
                    if($parentLevel == 1 ){
                        $user=User::findOrfail($parent);  
                        $user->commession->commession +=($this->amount * 0.10);
                        $user->commession->save();                      
                    }
                }else{

                    if( $parentLevel ==  $key+1){
                        $user=User::findOrfail($parent);  
                        $user->commession->commession +=($this->amount * 0.02);
                        $user->commession->save();           
                    }
                }
            }
            return true;  
        }



}
