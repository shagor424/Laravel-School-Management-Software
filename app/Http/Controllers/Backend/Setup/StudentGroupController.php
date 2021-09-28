<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentGroup;
use DB;

class StudentGroupController extends Controller
{
    public function view(){
    	$data['alldata'] = StudentGroup::all();
    	
    return view('backend.setup.Studentgroup.view-group',$data);
    }
    
  
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'required|unique:student_groups,name'

        ]);

    	$data = new StudentGroup();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('groups.student.group.view')->with('success','Data Inserted Successfully');
    }
        
   

        public function update(Request $request,$id){
            $data = StudentGroup::find($id);
             $this->validate($request,[
            'name'=>'required|unique:student_groups,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

    return redirect()->route('groups.student.group.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = StudentGroup::find($request->id); 
             $data->delete();
            return redirect()->route('groups.student.group.view')->with('success','Data Deleted Successfully');


     }  
}
