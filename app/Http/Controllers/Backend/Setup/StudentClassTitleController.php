<?php

namespace App\Http\Controllers\backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\StudentSection;
use App\Model\ClassTitle;
use DB;


class StudentClassTitleController extends Controller
{
    public function view(){
    	$data['alldata'] = ClassTitle::all();
    	
    return view('backend.setup.ClassTitle.view-class-title',$data);
    }
    
    public function add(){

    	return view('backend.setup.ClassTitle.add-class-title');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'unique:class_titles,name'

        ]);

    	$data = new ClassTitle();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('setups.student.classtitle.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = ClassTitle::find($id);
            return view('backend.setup.ClassTitle.add-class-title',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = ClassTitle::find($id);
             $this->validate($request,[
            'name'=>'unique:class_titles,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

    return redirect()->route('setups.student.classtitle.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = ClassTitle::find($request->id); 
             $data->delete();
            return redirect()->route('setups.student.class.view')->with('success','Data Deleted Successfully');


     }  
}
