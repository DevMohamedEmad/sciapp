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
        Schema::create('raghpat_eltansks', function (Blueprint $table) {

            $table->unsignedBigInteger("student_id");
            $table->unsignedBigInteger("department_id");
            $table->string("sorting");
            $table->id();
            $table->foreign('student_id')->references('id')->on('profile_student') ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments') ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('raghpat_eltansks');
    }
};
