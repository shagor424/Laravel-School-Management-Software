<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMarksGradeexesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks_gradeexes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grade');
            $table->string('grade_point');
            $table->string('start_marks');
            $table->string('end_marks');
            $table->string('start_point');
            $table->string('end_point');
            $table->string('remarks');
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
        Schema::dropIfExists('student_marks_gradeexes');
    }
}
