<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class StudentInvoiceDetail extends Model
{
    public function feecategory(){
        return $this->belongsTo(FeeCatagory::class, 'feecat_id', 'id');
      }

      public function user(){
        return $this->belongsTo(User::class, 'student_id', 'id');
      }


       public function invoice(){
        return $this->belongsTo(StudentInvoice::class, 'invoice_id', 'id');
      }

       public function payment(){
        return $this->belongsTo(StudentPayment::class, 'invoice_id', 'invoice_id');
      }
}
