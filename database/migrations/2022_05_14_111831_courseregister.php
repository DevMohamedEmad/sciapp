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
        Schema::create('courseregisters', function (Blueprint $table) {
            $table->id();
            $table->string('semester');
            $table->string('course_name');
            $table->string('course_dep');
            $table->string('final');
            $table->string('lecture');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id')->references('id')->on('courses')  ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseregisters');
    }


};
