<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class StudentPayment extends Model 
{
  public function user(){
      	return $this->belongsTo(User::class, 'student_id', 'id');
      }

      public function invoice(){ 
        return $this->belongsTo(StudentInvoice::class, 'invoice_id', 'id');
      }

       public function invoicecustomer(){
        return $this->belongsTo(StudentInvoice::class, 'student_id', 'id');
      }

     public function invoicedetail(){
        return $this->belongsTo(StudentInvoiceDetail::class, 'invoice_id', 'student_id');
      }

      public function paymentdetails(){
        return $this->belongsTo(StudentPaymentDetail::class, 'invoice_id', 'id');
      }

       public function assign_student(){
        return $this->belongsTo(AssignStudent::class, 'student_id', 'student_id');
      }
  
}
