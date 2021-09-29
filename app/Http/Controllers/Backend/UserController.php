<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use Auth;
class UserController extends Controller
{
    public function view(){
    $data['roles'] = Role::all();
    $data['alldata'] = User::all();
    return view('backend.user.view-user',$data);
    }

    public function add(){

    	return view('backend.user.add-user');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'role_id'=>'required',
            'email'=>'required|unique:users,email'

        ]);
        $code = rand(0000,9999);
        
    	$data = new User();
       
    	$data->role_id = $request->role_id;
        if($data->role_id==1){
          $data->usertype = 'admin';

        }elseif($data->role_id==2){
            $data->usertype = 'teacher';
        }
        elseif($data->role_id==3){
            $data->usertype = 'parent';
        }elseif($data->role_id==4){
            $data->usertype = 'student';
        }elseif($data->role_id==5){
            $data->usertype = 'employee';
        }

        
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

 $this->validate($request,[
            'name'=>'required',
            'role_id'=>'required',
            'email'=>'required|unique:users,email,'.$data->id,

        ]);

        $data->role_id = $request->role_id;
        if($data->role_id==1){
          $data->usertype = 'admin';

        }elseif($data->role_id==2){
            $data->usertype = 'teacher';
        }
        elseif($data->role_id==3){
            $data->usertype = 'parent';
        }elseif($data->role_id==4){
            $data->usertype = 'student';
        }elseif($data->role_id==5){
            $data->usertype = 'employee';
        }
        $data->name = $request->name;
        $data->email = $request->email;
        
        $data->mobile = $request->mobile;
        $data->save();

        return redirect()->route('users.view')->with('success','Data Updated Successfully');

        }

          public function inactive($id){
            $user = User::find($id);
             if(Auth::user()->id ==$id){
            return redirect()->back()->with('error','Inactive No Permission');
        }
            $user->status = 0;
            $user->save();
           return redirect()->route('users.view')->with('success','User Inactive Successfully');
        }

        public function active($id){

            $user = User::find($id);
             if(Auth::user()->id ==$id){
           
            return redirect()->back()->with('error','Active No Permission');
        }
            $user->status = 1;
            $user->save();
          return redirect()->route('users.view')->with('success','User Active Successfully');
        } 

          public function delete($id){
            $user = User::find($id);

           if(Auth::user()->id ==$id){
                   
                    return redirect()->back()->with('error','Active No Permission');
                }

            if($user->role_id == 1){
          if (file_exists('public/upload/adminimage/' . $user->image) AND !
            empty($user->image)){
               unlink('public/upload/adminimage/' . $user->image);
           }
         }
           elseif($user->role_id == 2){
            if (file_exists('public/upload/teacherimage/' . $user->image) AND !
            empty($user->image)){
               unlink('public/upload/teacherimage/' . $user->image);
           }

         }elseif($user->role_id == 3){
            if (file_exists('public/upload/parentimage/' . $user->image) AND !
            empty($user->image)){
               unlink('public/upload/parentimage/' . $user->image);
           }
        }
           elseif($user->role_id == 4){
            if (file_exists('public/upload/studentimage/' . $user->image) AND !
            empty($user->image)){
               unlink('public/upload/studentimage/' . $user->image);
           }
        }  
         elseif($user->role_id == 5){
            if (file_exists('public/upload/employeeimage/' . $user->image) AND !
            empty($user->image)){
               unlink('public/upload/employeeimage/' . $user->image);
           }
        }


            $user->delete();
            return redirect()->route('users.view')->with('success','Data Deleted Successfully');

          }  

         
}


