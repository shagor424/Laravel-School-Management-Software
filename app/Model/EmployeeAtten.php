<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class EmployeeAtten extends Model
{
    public function user(){
    	return $this->belongsTo(User::class,'employee_id','id');
    }

   // public function designations(){
    //	return $this->belongsTo(Designation::class,'employee_id','desi_id');
   // }
}
