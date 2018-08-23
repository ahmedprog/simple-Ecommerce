<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Indirect;
use App\Http\Controllers\helperController;
use App\Commession;

class TestController extends Controller
{
    
    public function test(){
        
            // $id=Auth::user()->id;
            // return $this->directusers(8);
            // return $this->currentLevel(8);
            // return dd($this->addCounterUsers(14,10));
            // return $this->indirect(8);


            // $helpr= new helperController;
            //  $levels= $helpr->Children_grandchildren(2);
            //  return  dd($helpr->getAllUsers()['direct-level'][1]->status()->statusName);
            //  return $helpr->carrntLevel();
        
            $helpr= new helperController;
            return dd($helpr->checkorder(1,5));
 }

/*======================================================*/
/*
        protected $mylevel0;
        protected function currentLevel0($userid){
            //count direct users
             $direct= User::where('refeler_id',$userid)->get(['id']);
             
             if($direct->count() === 5){
                $this->mylevel0['direct-level']=$direct;
                 $this->countInDirect0($userid);                
             }else{
                $this->mylevel0['direct-level']=$direct->count();
             }
                return dd($this->mylevel0);             
        }
        
        protected function countInDirect0($id){
            
            $inDirect=Indirect::where('inDirect_user',$id)->get(['user_id','level'])->groupBy('level');

            return   $this->mylevel0['indirect']=$inDirect;                              
            
        } 
        */
/*===============================================================*/
//recursive function to get indirect parent
protected $grandparents=[];
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
/*===============================================================*/
        /****done****/

//recursive function to increment parent(usersCount) in table laval 
protected function addCounterUsers($refelerid,$parent_refeler=null){
    //find direct parent in table Level user id column 
     $level=Level::where('user_id',$refelerid)->get()->first();
     // increment old usersCount (1)
     $level['usersCount'] +=1;
    
    //save(update) new number(count)
     $level->save();
    //  check if refeler has parent($parent_refeler==null) 
     if(!$parent_refeler ==null){
        //  if true get data for parent_refeler
        // get just refeler_id column (it is grand parent id)
        // assign it into $grand_paren
        $grand_parent= User::where('id',$parent_refeler)->get(['refeler_id'])->first();        
        $grand_parent=$grand_parent->refeler_id;
        //and send ($parent_refeler_id) to increment it
        //  and $grand_parent['refeler_id'] check if isnot null and increment it
        // in  our function again
        return $this->addCounterUsers($parent_refeler,$grand_parent['refeler_id']);
     }
     return true;
     
}
 /****^^done^^****/
        /****done****/
        // protected $mylevel;
        protected function currentLevel($userid){
            //count direct users
             $direct= User::where('refeler_id',$userid)->get(['id']);
             
             if($direct->count() === 5){
                $this->mylevel['direct-level']=$direct->count();
                $this->countInDirect($direct);                
             }else{
                $this->mylevel['direct-level']=$direct->count();
             }
                return $this->mylevel;             
        } 

        protected function countInDirect($ids){
            
            $inDirect=[];
            //count Id direct users
            foreach($ids as $key=> $id){
                $inDirect[$key]=User::where('refeler_id',$id->id)->get(['id'])->count();                                
            }
            return dd($inDirect);            
            return dd(array_sum($inDirect));
            
        }
        /**^^Done^^**/



        /*done*/
        protected function addCounterUsers11($refelerid,$Pernt_refeler=null){
            //count direct users
            // ->toArray()
             $level=level::where('user_id',$refelerid)->get()->first();
              $level['usersCount']+=1;
             $level->save();
             if(!$Pernt_refeler ==null){
                $grand_parent= User::where('id',$Pernt_refeler)->get(['refeler_id'])->first();        
                 $grand_parent['refeler_id'];
                return $this->newuser($Pernt_refeler,$grand_parent['refeler_id']);
            
             }
             return true;
        }
        /*^^done^^*/
        
        
        
        
        
        //sill working
            protected function directusers($userid){
                //count direct users
                // ->toArray()
                 $direct= User::where('refeler_id',$userid)->get(['id']);
                 $this->Duser=$direct;
                 return $this->count_Indirect($direct);
            } 
            protected function count_Indirect( $ids){
                //count direct users
                 foreach($ids as $id){
        
                 }
        
                //  $direct= User::where('refeler_id',$userid)->get();
                return $direct->count();
        
            }
        //
}
