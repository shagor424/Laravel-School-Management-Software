<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Designation;
use DB;

class StudentDesiController extends Controller
{
    public function view(){
    	$data['alldata'] = Designation::all();
    	
    return view('backend.setup.designation.view-desi',$data);
    } 
    
    public function add(){

    	return view('backend.setup.designation.add-desi');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'name'=>'unique:designations,name'

        ]);

    	$data = new Designation();
    	$data->name = $request->name;
    	$data->save();

    	return redirect()->route('desis.student.desi.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = Designation::find($id);
            return view('backend.setup.designation.add-desi',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = Designation::find($id);
             $this->validate($request,[
            'name'=>'unique:designations,name,'.$data->id
        ]);
        $data->name = $request->name;
        $data->save();

    return redirect()->route('desis.student.desi.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = Designation::find($request->id); 
             $data->delete();
            return redirect()->route('desis.student.desi.view')->with('success','Data Deleted Successfully');


     }  
}
