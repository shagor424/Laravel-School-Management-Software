<?php

namespace App\Http\Controllers\Admin\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentGroup;
use App\Model\StudentSection;
use DB;

class StudentSectionController extends Controller
{
    public function view(){

    	$data['alldata'] = StudentSection::all();
    	
    return view('backend.setup.studentsection.view-section',$data);
    }
    
    public function add(){

    	return view('backend.setup.studentsection.add-section');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'unique:student_sections,name'

        ]);

    	$data = new StudentSection();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('setups.student.section.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = StudentSection::find($id);
            return view('backend.setup.studentsection.add-section',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = StudentSection::find($id);
             $this->validate($request,[
            'name'=>'unique:student_sections,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

    return redirect()->route('setups.student.section.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = StudentSection::find($request->id); 
             $data->delete();
            return redirect()->route('setups.student.section.view')->with('success','Data Deleted Successfully');


     }  
}
 