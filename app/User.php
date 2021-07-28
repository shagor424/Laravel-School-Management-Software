<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Model\Designation;
use App\Model\StudentClass;
use App\Model\AssignStudent;
use DB;
use PDF;
use App\Model\EmployeeSalary;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function designation(){
    return $this->belongsTo(Designation::class,'desi_id','id');

   }

    public function employee(){
 return $this->belongsTo(EmployeeSalary::class,'id','employee_id');

 }

 public function roll(){
 return $this->belongsTo(AssignStudent::class,'id','student_id');

 }

 public function assign_student(){ 
 return $this->hasMany(AssignStudent::class,'id','student_id');

 }

 public function payment(){
 return $this->hasMany(StudentPayment::class,'student_id','id');

 }

  public function invoice(){
 return $this->hasMany(StudentInvoice::class,'student_id','id');

 }

 public function invoicedetails(){
 return $this->hasMany(StudentInvoiceDetail::class,'student_id','id');

 }

}


