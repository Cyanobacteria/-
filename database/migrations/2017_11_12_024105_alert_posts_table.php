<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlertPostsTable extends Migration
{




    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('posts');
    }




















 
  
   
    
}
