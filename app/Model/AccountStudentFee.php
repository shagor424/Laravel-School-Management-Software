<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountStudentFee extends Model
{
    public function student(){
   	return $this->belongsTo(User::class,'student_id','id');

   }
   public function student_class(){
   	return $this->belongsTo(StudentClass::class,'class_id','id');

   }
    public function year(){
   	return $this->belongsTo(StudentYear::class,'year_id','id');

   }

   public function group(){
   	return $this->belongsTo(StudentGroup::class,'group_id','id');

   }
  
   public function shift(){
      return $this->belongsTo(StudentShift::class,'shift_id','id');

   }
    public function section(){
      return $this->belongsTo(StudentSection::class,'section_id','id');

   }
   public function fee_catagory(){
    	return $this->belongsTo(FeeCatagory::class,'fee_catagory_id','id');
    }
    public function studentroll(){
    	return $this->belongsTo(Assignstudent::class,'class_roll','id');
    }
}
