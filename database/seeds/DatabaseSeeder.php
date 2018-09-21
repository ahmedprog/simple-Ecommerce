<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
        // $this->call(Test::class);
    }
}

class Test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    //  */
    // public function run()
    // {
    //     // $num=10;
    //     // for($i=0;$i<$num;$i++){}
    //         DB::table('admins')->insert([
    //             'username'=>'admin',
    //             'email'=>'admin@a.com',
    //             'password'=>bcrypt(123456)
    //         ]);
        
    //     $this->command->info('admin add');
    // }
    
    public function run()
    {
        // $num=10;
        // for($i=0;$i<$num;$i++){}
            DB::table('users')->insert([
                'username'=>'admin',
                'email'=>'admin@a.com',
                'password'=>bcrypt(123456)
            ]);
        
        $this->command->info('admin add');
    }
}
