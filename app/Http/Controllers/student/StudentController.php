<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class StudentController extends Controller
{

    public function dashboard(){

    return view('student.layouts.home');

   }
  
}
