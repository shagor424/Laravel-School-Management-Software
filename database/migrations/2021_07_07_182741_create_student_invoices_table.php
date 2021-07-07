<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('invoice_date')->nullable();
            $table->biginteger('student_id')->nullable();
            $table->tinyInteger('status')->default('0')->comment('0=pending,1=Approved');
            $table->integer('created_by')->nullable();
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('student_invoices');
    }
}
