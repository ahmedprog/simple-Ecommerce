<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInDirectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_directs', function (Blueprint $table) {
            $table->engine = 'InnoDB';            
            $table->increments('id');
            $table->integer('user_id')->unsigned();             
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('inDirect_user')->unsigned();             
            $table->foreign('inDirect_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');            
            $table->integer('level');             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_directs');
    }
}
