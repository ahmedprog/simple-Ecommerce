<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('email');            
            $table->string('password',60);
            $table->rememberToken();            
            $table->timestamps();
        });
        Schema::table('admins', function() {
            DB::table('admins')->insert([
                'username' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt(123456),
            ]);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
