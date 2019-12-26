<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('project_id');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('offer_statuses');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
