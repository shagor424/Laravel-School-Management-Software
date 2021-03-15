<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class ProfileController extends Controller {
    public function view(){
    $id = Auth::user()->id; 
    $user = User::find($id);
    
    return view('backend.user.view-profile',compact('user'));

   }
   public function edit(){
   	 $id = Auth::user()->id;
     $editdata = User::find($id);
     return view('backend.user.edit-profile',compact('editdata'));

   }
   public function update(Request $request){
         $data = User::find(Auth::user()->id);
       
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address= $request->address;
        $data->gender = $request->gender;
        

        if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/userimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/userimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();
      return redirect()->route('profiles.view')->with('success','Profile Updated Successfully');

        }

        public function passwordview(){

        return view('backend.user.edit-password');
 

        } 

        public function passwordupdate(Request $request){
          if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->curpassword])){

            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->curpassword);
            $user->save();
            return redirect()->route('profiles.view')->with('success','Password Change Successfully');

          }else{
            return redirect()->back()->with('error','Your Current Password Does Not Match!');
          }
}
}


