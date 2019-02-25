<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('NumberOfStudents');
            $table->integer('Project_ID')->unsigned()->nullable();
            // $table->foreign('Project_ID')->references('id')->on('proposals');
            $table->integer('Supervisor_ID')->unsigned()->nullable();
            // $table->foreign('Supervisor_ID')->references('id')->on('supervisors');
            $table->integer('Leader')->nullable();
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
        Schema::dropIfExists('groups');
    }
}
