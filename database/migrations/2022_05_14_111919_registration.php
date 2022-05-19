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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('course_id');
            $table->string('course_name');
            $table->string('grade')->nullable();
            $table->string('grade_num')->nullable();;
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('profile_student')  ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courseregisters')  ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });

    }


    public function down()
    {
        Schema::dropIfExists('registration');
    }
};
