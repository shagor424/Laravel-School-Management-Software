<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class ParentController extends Controller
{

    public function dashboard(){

    return view('parent.layouts.home');

   }
  
}
