<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('stasuses')->insert([
            'id'=>1,
            'statusName'=>'active',
            'color'=>'primary'
       ]);
       DB::table('stasuses')->insert([
           'id'=>2,
            'statusName'=>'pending',
            'color'=>'warning'
       ]);
       DB::table('stasuses')->insert([
           'id'=>3,
           'statusName'=>'blocked',
            'color'=>'danger'
       ]);
       DB::table('stasuses')->insert([
           'id'=>4,
           'statusName'=>'level complete',
            'color'=>'success'
       ]);
    }
}
