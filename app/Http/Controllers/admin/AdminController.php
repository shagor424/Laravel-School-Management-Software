<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class AdminController extends Controller
{

    public function dashboard(){

    return view('backend.layouts.home');

   }
  
}
