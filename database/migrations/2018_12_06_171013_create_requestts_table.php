<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequesttsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requestts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Sender_id');
            $table->integer('Rec_id');
            $table->integer('status')->nullable();
            $table->foreign('sender_id')->references('id')->on('students');  
            $table->foreign('rec_id')->references('id')->on('students');
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
        Schema::dropIfExists('requestts');
    }
}
