<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
 
class usercontroller extends Controller
{
    public function view(){
    $data['alldata'] = User::where('usertype','admin')->get();
    return view('backend.user.view-user',$data);
    }

    public function add(){

    	return view('backend.user.add-user');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email'

        ]);
        $code = rand(0000,9999);
        
    	$data = new User();
        $data->usertype = 'admin';
    	$data->role = $request->role;
        $data->name = $request->name;
    	$data->email = $request->email;
    	$data->password = bcrypt($code);
        $data->code = $code;
    	$data->mobile = $request->mobile;
    	
    	$data->save();

    	return redirect()->route('users.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = User::find($id);
            return view('backend.user.edit-user',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = User::find($id);
         $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        
        $data->status = $request->status;
        $data->save();

        return redirect()->route('users.view')->with('success','Data Updated Successfully');

        }

          public function delete($id){
            $user = User::find($id);

          if (file_exists('public/upload/userimage/' . $user->image) AND !
            empty($user->image)){
               unlink('public/upload/userimage/' . $user->image);
       }
            $user->delete();
            return redirect()->route('users.view')->with('success','Data Deleted Successfully');

          }  

         
}


