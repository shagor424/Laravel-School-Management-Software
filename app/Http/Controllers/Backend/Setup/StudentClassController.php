<?php

namespace App\Http\Controllers\Backend\Setup;  

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\StudentSection;
use App\Model\ClassTitle;
use DB;

class StudentClassController extends Controller
{
    public function view(){
   
    $data['alldata'] = StudentClass::all();
    return view('backend.setup.studentclass.view-class',$data);
    }
    
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|unique:student_classes,name'

        ]);
       

    	$data = new StudentClass();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('setups.student.class.view')->with('success','Data Inserted Successfully');
    }
        
     

        public function update(Request $request,$id){
            $data = StudentClass::find($id);
             $this->validate($request,[
            'name'=>'required|unique:student_classes,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

    return redirect()->route('setups.student.class.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = StudentClass::find($request->id); 
             $data->delete();
            return redirect()->route('setups.student.class.view')->with('success','Data Deleted Successfully');


     }  

}
