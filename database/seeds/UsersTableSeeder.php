<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // this way to create sample of users
        // factory(App\User::class, 25)->create();
        //other way to create users and Tasks togther if has relationship   
//        factory(App\User::class, 25)->create()->each(function($u){
//            // every users has 10 task
//            for( $i = 0 ; $i < 10 ; $i++ ):
//            $u->user()->save(factory(App\User::class)->make());
//            endfor;
//        });
//
        
    }
}