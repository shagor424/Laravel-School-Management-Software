<?php

namespace App\Http\Controllers\backend\Marks;

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
use App\Model\StudentMarksGrade;
class StudentMarksGradeController extends Controller
{
   public function view(){
   	$data['alldata'] = StudentMarksGrade::all();
   	return view('backend.marks.grade-view',$data);
   }

   	public function add(){
   		return view('backend.marks.grade-add');
   }

   public function store(Request $request){
   		$data = new StudentMarksGrade();
   		$data->grade = $request->grade;
   		$data->grade_point = $request->grade_point;
   		$data->start_marks = $request->start_marks;
   		$data->end_marks = $request->end_marks;
   		$data->start_point = $request->start_point;
   		$data->end_point = $request->end_point;
   		$data->remarks = $request->remarks;
   		$data->save();
   		return redirect()->route('marks.grade.view')->with('success','Data Inserted Succssfully');
   }
   		public function edit($id){
   			$data['editdata'] =StudentMarksGrade::find($id);
   			return view('backend.marks.grade-add',$data);
   } 

   public function update(Request $request,$id){
   		$data = StudentMarksGrade::find($id);
   		$data->grade = $request->grade;
   		$data->grade_point = $request->grade_point;
   		$data->start_marks = $request->start_marks;
   		$data->end_marks = $request->end_marks;
   		$data->start_point = $request->start_point;
   		$data->end_point = $request->end_point;
   		$data->remarks = $request->remarks;
   		$data->save();
   		return redirect()->route('marks.grade.view')->with('success','Data Updated Succssfully');
   }

   public function delete(Request $request){
            $data = StudentMarksGrade::find($request->id); 
             $data->delete();
            return redirect()->route('marks.grade.view')->with('success','Data Deleted Successfully');


     }  
}

