<?php

namespace App\Http\Controllers\Admin\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentShift;
use DB;

class StudentShiftController extends Controller
{
    public function view(){
    	$data['alldata'] = StudentShift::all();
    	
    return view('backend.setup.Studentshift.view-shift',$data);
    } 
    
  
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'unique:student_shifts,name'

        ]);

    	$data = new StudentShift();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('shifts.student.shift.view')->with('success','Data Inserted Successfully');
    }
        
       

        public function update(Request $request,$id){
            $data = StudentShift::find($id);
             $this->validate($request,[
            'name'=>'unique:student_shifts,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

    return redirect()->route('shifts.student.shift.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = StudentShift::find($request->id); 
             $data->delete();
            return redirect()->route('shifts.student.shift.view')->with('success','Data Deleted Successfully');


     }  
}
