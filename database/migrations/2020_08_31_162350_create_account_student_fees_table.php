<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountStudentFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_student_fees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('class_id')->nullable();
            $table->integer('group_id')->nullable();
            $table->integer('section_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('class_roll')->nullable();
            $table->integer('fee_catagory_id')->nullable();
            $table->date('date')->nullable();
            $table->double('amount')->nullable();
            
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
        Schema::dropIfExists('account_student_fees');
    }
}
