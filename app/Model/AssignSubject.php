<?php
 
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    
      public function class_title(){
    	return $this->belongsTo(StudentClass::class,'title_id','id');
    }
    public function student_class(){
    	return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function subject(){
    	return $this->belongsTo(Subject::class,'subject_id','id');
    }

    public function student_group(){
    	return $this->belongsTo(StudentGroup::class,'group_id','id');
    }
}
