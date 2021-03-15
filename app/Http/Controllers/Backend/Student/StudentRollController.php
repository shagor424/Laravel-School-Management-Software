<?php 

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AssignStudent;
use App\Model\DisscountStudent;
use App\Model\StudentClass;
use App\Model\StudentGroup;
use App\Model\StudentYear;
use App\Model\StudentShift;
use App\Model\AssignSubject;
use App\Model\StudentSection;
use App\Model\Subject;
use App\User;
use DB;
use PDF;

class StudentRollController extends Controller
{
    public function view(){

        $data['sections'] = StudentSection::orderBy('id','asc')->get();
    	$data['groups'] = StudentGroup::orderBy('id','asc')->get();
    	$data['shifts'] = StudentShift::orderBy('id','asc')->get();
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::orderBy('id','asc')->get();
    	
    	return view('backend.student.student_roll.view-roll',$data);

    }

    public function getstudent(Request $request){
    	$alldata = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->get();
    	return response()->json($alldata);
    }


    public function store(Request $request){

    	$class_id = $request->class_id;
    	$group_id = $request->group_id;
    	$section_id = $request->section_id;
    	$shift_id = $request->shift_id;
    	$year_id = $request->year_id;
    	if($request->student_id !=null){
    		for ($i=0; $i < count($request->student_id);$i++){
    			AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->where('student_id',$request->student_id[$i])->update(['class_roll' =>$request->class_roll[$i]]);
    		}
    	}else {
    		return redirect()->back()->with('error','Sorry! There Are No Student');
    	}

    	 return redirect()->route('students.roll.view')->with('success','Roll Generate Successfully');

   } 	
}
