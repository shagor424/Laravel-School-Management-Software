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

class StudentMarksController extends Controller
{
   public function add(){
   	    $data['sections'] = StudentSection::orderBy('id','asc')->get();
    	$data['groups'] = StudentGroup::orderBy('id','asc')->get();
    	$data['shifts'] = StudentShift::orderBy('id','asc')->get();
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::orderBy('id','asc')->get();
   		$data['exam_types'] = ExamType::orderBy('id','asc')->get();
   	return view('backend.marks.marks-add',$data);

   }
		public function store(Request $request){
			$studentcount = $request->student_id;
			if($studentcount){
				for ($i=0; $i< count($request->student_id);$i++){
					$data = New StudentMark();
					$data->class_id = $request->class_id;
					$data->group_id = $request->group_id;
					$data->section_id = $request->section_id;
					$data->shift_id = $request->shift_id;
					$data->year_id = $request->year_id;
					$data->assign_subject_id = $request->assign_subject_id;
					$data->exam_type_id = $request->exam_type_id;
					$data->student_id = $request->student_id[$i];
					$data->id_no = $request->id_no[$i];
					$data->mcq_marks = $request->mcq_marks[$i];
					$data->creative_marks = $request->creative_marks[$i];
					$data->save();

				}
			}
   	    return redirect()->back()->with('success','Marks Entey Successfully');
   }

   		public function edit(){
   	    $data['sections'] = StudentSection::orderBy('id','asc')->get();
    	$data['groups'] = StudentGroup::orderBy('id','asc')->get();
    	$data['shifts'] = StudentShift::orderBy('id','asc')->get();
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::orderBy('id','asc')->get();
   		$data['exam_types'] = ExamType::orderBy('id','asc')->get();
   	return view('backend.marks.marks-edit',$data);

   }


   public function getmarks(Request $request){
			
					$class_id = $request->class_id;
					$group_id = $request->group_id;
					$section_id = $request->section_id;
					$shift_id = $request->shift_id;
					$year_id = $request->year_id;
					$assign_subject_id = $request->assign_subject_id;
					$exam_type_id = $request->exam_type_id;
					$getstudent = StudentMark::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->get();
    	return response()->json($getstudent);


}
			public function update(Request $request){
				StudentMark::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->where('assign_subject_id',$request->assign_subject_id)->where('exam_type_id',$request->exam_type_id)->delete();
			$studentcount = $request->student_id;
			if($studentcount){
				for ($i=0; $i< count($request->student_id);$i++){
					$data = New StudentMark();
					$data->class_id = $request->class_id;
					$data->group_id = $request->group_id;
					$data->section_id = $request->section_id;
					$data->shift_id = $request->shift_id;
					$data->year_id = $request->year_id;
					$data->assign_subject_id = $request->assign_subject_id;
					$data->exam_type_id = $request->exam_type_id;
					$data->student_id = $request->student_id[$i];
					$data->id_no = $request->id_no[$i];
					$data->mcq_marks = $request->mcq_marks[$i];
					$data->creative_marks = $request->creative_marks[$i];
					$data->save();

				}
			}
   	    return redirect()->back()->with('success','Marks Updated Successfully');
   }

}


