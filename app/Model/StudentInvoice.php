<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class StudentInvoice extends Model
{

    public function user(){
        return $this->belongsTo(User::class, 'student_id', 'id'); 
      }
    public function payment(){
        return $this->belongsTo(StudentPayment::class, 'id', 'invoice_id');
      }

     public function paymentdetails(){
        return $this->belongsTo(StudentPaymentDetail::class, 'id', 'invoice_id');
      }

      public function invoicedetails(){
        return $this->hasMany(StudentInvoiceDetail::class, 'invoice_id', 'id');
      }

 public function assign_student(){
 return $this->belongsTo(AssignStudent::class,'student_id','student_id');
  }

      

    
}
