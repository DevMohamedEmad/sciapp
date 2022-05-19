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
        Schema::create('profile_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('student_name');
            $table->string('level');
            $table->string('hours');
            $table->string('cgpa');
            $table->string('major');
            $table->string('minor');
            $table->timestamps();    
            //------forign key=-----------------
            $table->foreign('user_id')->references('id')->on('users')  ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('profile_users');
    }
};
