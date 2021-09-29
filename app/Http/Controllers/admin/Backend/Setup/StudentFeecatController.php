<?php

namespace App\Http\Controllers\Admin\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FeeCatagory;
use App\Model\StudentSection;
use DB;

class StudentFeecatController extends Controller
{
    public function view(){
    	$data['alldata'] = FeeCatagory::all();
    	
    return view('backend.setup.FeeCatagory.view-feecat',$data);
    } 
    
    public function add(){

    	return view('backend.setup.FeeCatagory.add-feecat');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'cat_name'=>'required|unique:fee_catagories,cat_name'

        ]);

    	$data = new FeeCatagory();
    	$data->cat_name = $request->cat_name;
    	$data->save();

    	return redirect()->route('feecats.student.feecat.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
            $editdata = FeeCatagory::find($id);
            return view('backend.setup.FeeCatagory.add-feecat',compact('editdata'));

        }

        public function update(Request $request,$id){
            $data = FeeCatagory::find($id);

             $this->validate($request,[
            'cat_name'=>'required|unique:fee_catagories,cat_name,'.$data->id
        ]);
        $data->cat_name = $request->cat_name;
        $data->save();

    return redirect()->route('feecats.student.feecat.view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = FeeCatagory::find($request->id); 
             $data->delete();
            return redirect()->route('feecats.student.feecat.view')->with('success','Data Deleted Successfully');


     }  
}
