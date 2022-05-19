<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('student_name');
            $table->unsignedBigInteger('course_id');
            $table->string('course_name');
            $table->string('student_state');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('profile_student') ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses') ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('open_courses');
    }



};
