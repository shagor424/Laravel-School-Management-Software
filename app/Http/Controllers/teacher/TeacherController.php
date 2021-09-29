<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class TeacherController extends Controller
{

    public function dashboard(){

    return view('teacher.layouts.home');

   }
  
}
