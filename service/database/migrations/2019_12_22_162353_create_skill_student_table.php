<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skill_student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
            $table->foreign('skill_id')->references('id')->on('skills');
            $table->foreign('student_id')->references('id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skill_student');
    }
}
