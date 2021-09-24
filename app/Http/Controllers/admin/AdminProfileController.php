<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class AdminProfileController extends Controller
{
    public function view(){
    $id = Auth::user()->id; 
    $user = User::find($id);
    
    return view('admin.profile.view-profile',compact('user'));

   }
   public function edit(){
     $id = Auth::user()->id;
     $editdata = User::find($id);
     return view('admin.profile.edit-profile',compact('editdata'));

   }
   public function update(Request $request){

         $data = User::find(Auth::user()->id);
       
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address= $request->address;
        $data->gender = $request->gender;
        $data->dob= $request->dob;
        $data->edu = $request->edu;
        

        if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/adminimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/adminimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();
      return redirect()->route('admin.profiles.view')->with('success','Profile Updated Successfully');

        }

        public function passwordview(){

        return view('admin.profile.edit-password');
 

        } 

        public function passwordupdate(Request $request){

          $id = Auth::user()->id;
          $db_pass = Auth::user()->password;
          $old_pass = $request->old_password;
          $new_pass = $request->new_password;
          $confirm_pass = $request->confirm_password;

          if(Hash::check($old_pass, $db_pass)){
            if($new_pass === $confirm_pass){

                User::find($id)->update([
                  'password' => Hash::make($request->new_password)
                ]);

                Auth::logout();
                return redirect()->route('login');
            }else{
               return redirect()->back()->with('error','New Password and Confirm Password Does Not Match!');
            }

          }else{

            return redirect()->back()->with('error','Your Current Password Does Not Match!');
          }
}
}
