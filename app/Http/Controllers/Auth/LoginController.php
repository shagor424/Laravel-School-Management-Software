<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Toastr;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
     protected function redirectTo(){
            if (Auth()->user()->role_id == 1){
                Toastr::success(' Successfully Login', 'Success');
                return route('home');

            }elseif (Auth()->user()->role_id == 2){
                 Toastr::success(' Successfully Login', 'Success');
                return route('teacher.dashboard');
            }

            elseif (Auth()->user()->role_id == 3){
                 Toastr::success(' Successfully Login', 'Success');
                return route('parent.dashboard');
            }

            elseif (Auth()->user()->role_id == 4){
                 Toastr::success(' Successfully Login', 'Success');
                return route('student.dashboard');
            }else{
                 Toastr::success(' Something error Login!!!', 'Success');
                return route('login');
            }
        }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
     /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)

    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken(); 
        Toastr::success(' Successfully Logout', 'Success');
        return $this->loggedOut($request) ?: redirect('/login');
    }
}
