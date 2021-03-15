<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    public function fee_catagory(){
    	return $this->belongsTo(FeeCatagory::class,'fee_catagory_id','id');
    }
    public function student_class(){
    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }
}
