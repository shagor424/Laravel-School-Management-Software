<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_invoice_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('invoice_id');
            $table->biginteger('student_id');
            $table->date('invoice_date')->nullable();
            $table->biginteger('feecat_id')->nullable();
            $table->integer('selling_quantity')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->decimal('selling_price',10,2)->nullable();
            $table->tinyinteger('status')->default(1);
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
        Schema::dropIfExists('student_invoice_details');
    }
}
