<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payment_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('invoice_id');
            $table->biginteger('student_id');
            $table->decimal('current_paid_amount')->nullable();
            $table->decimal('payment_date')->nullable();
            $table->tinyinteger('updated_by')->nullable();
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
        Schema::dropIfExists('student_payment_details');
    }
}
