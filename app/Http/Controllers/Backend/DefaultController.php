<?php 

namespace App\Http\Controllers\backend;

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
use App\Model\StudentMark;
use App\Model\ExamType;

class DefaultController extends Controller
{
     public function getsstudent(Request $request){
     	$class_id = $request->class_id;
    	$group_id = $request->group_id;
    	$section_id = $request->section_id;
    	$shift_id = $request->shift_id;
    	$year_id = $request->year_id;
   	     $alldata = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->get();
    	return response()->json($alldata);

   }

    public function getsubject(Request $request){

   	 $class_id = $request->class_id;
   	 $alldata = AssignSubject::with(['subject'])->where('class_id',$class_id)->get();
   	 return response()->json($alldata);

   }
}
