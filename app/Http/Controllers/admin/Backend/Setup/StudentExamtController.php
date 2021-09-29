<?php

namespace App\Http\Controllers\Admin\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ExamType;
use DB;
use App\Model\StudentSection;

class StudentExamtController extends Controller
{
    public function view(){
    	$data['alldata'] = ExamType::all();
    	
    return view('backend.setup.ExamType.view-examt',$data);
    } 
    
    public function add(){

    	return view('backend.setup.ExamType.add-examt');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'unique:exam_types,name'

        ]);

    	$data = new ExamType();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('examts.student.examt.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = ExamType::find($id);
            return view('backend.setup.ExamType.add-examt',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = ExamType::find($id);
             $this->validate($request,[
            'name'=>'unique:exam_types,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

    return redirect()->route('examts.student.examt.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = ExamType::find($request->id); 
             $data->delete();
            return redirect()->route('examts.student.examt.view')->with('success','Data Deleted Successfully');


     }  
}
