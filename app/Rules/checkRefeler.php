<?php

namespace App\Rules;
use App\User;

use Illuminate\Contracts\Validation\Rule;

class checkRefeler implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
public $m; 
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $count =User::where('refeler_id',$value)->count();
                if($count >= 5){          
                    $this->m='This refeler Id has no place && he have 5 refeler';
                }
    }



    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->m;
    }
}
