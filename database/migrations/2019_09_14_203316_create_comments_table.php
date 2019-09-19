<?php


use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;


class createcommentsTable extends Migration

{


   public function up()

   {

       Schema::create('comments', function (Blueprint $table) {

           $table->bigIncrements('id')->nullable();

           $table->integer('user_id')->nullable();

            $table->integer('post_id')->nullable(); 

            $table->string('comment')->nullable();

           $table->timestamps();

       });

   }



   public function down()

   {

       Schema::dropIfExists('comments');

   }

}