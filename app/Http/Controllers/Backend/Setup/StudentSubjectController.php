<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;
use DB;
use App\Model\StudentSection;

class StudentSubjectController extends Controller
{
    public function view(){
    	$data['alldata'] = Subject::all();
    	
    return view('backend.setup.Subject.view-subject',$data);
    } 
    
    public function add(){

    	return view('backend.setup.Subject.add-subject');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'unique:subjects,name'

        ]);

    	$data = new Subject();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('subjects.student.subject.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Subject::find($id);
            return view('backend.setup.Subject.add-subject',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Subject::find($id);
             $this->validate($request,[
            'name'=>'unique:subjects,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

    return redirect()->route('subjects.student.subject.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = Subject::find($request->id); 
             $data->delete();
            return redirect()->route('subjects.student.subject.view')->with('success','Data Deleted Successfully');


     }  
}
