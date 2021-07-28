<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class StudentClass extends Model
{
   public function user(){
 return $this->hasMany(User::class,'class_id','id');
}

  public function assign_student(){
 return $this->hasMany(AssignStudent::class,'class_id','id');
}

}
