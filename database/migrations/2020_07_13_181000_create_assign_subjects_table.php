<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('title_id');
             $table->integer('class_id');
             $table->integer('subject_id');
             $table->integer('group_id');
            // $table->double('mcq_mark');
            // $table->double('cv_mark');
             $table->double('full_mark');
             $table->double('pass_mark');
             $table->double('subjective_mark');
              $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('assign_subjects');
    }
}
