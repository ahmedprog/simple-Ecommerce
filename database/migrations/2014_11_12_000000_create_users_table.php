<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';            
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->text('address');            
            $table->string('password');
            $table->bigInteger('govid')->unique();
            $table->bigInteger('mobile');           
            $table->integer('refeler_id')->unsigned()->nullable();                        
//            $table->string('status')->default('pending');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function($table)
        {
            $table->foreign('refeler_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
