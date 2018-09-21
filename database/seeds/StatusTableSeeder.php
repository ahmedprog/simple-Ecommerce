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
            'statusName'=>'active',
            'color'=>'primary'
       ]);
       DB::table('stasuses')->insert([
            'statusName'=>'pending',
            'color'=>'warning'
       ]);
       DB::table('stasuses')->insert([
            'statusName'=>'blocked',
            'color'=>'danger'
       ]);
       DB::table('stasuses')->insert([
            'statusName'=>'level complete',
            'color'=>'success'
       ]);
    }
}
