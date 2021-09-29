<?php

namespace App\Http\Controllers\Admin\Backend\marksheet;

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
use App\Model\FeeCatagory;
use App\Model\FeeAmount; 
use PDF;
use App\Model\AccountStudentFee;
use App\Model\ExamType;
use App\Model\StudentMark;
use App\Model\StudentMarksGrade;
use App\Model\StudentMarksGradeex;
use App\Model\EmployeeAtten;
 
class MarkSheetController extends Controller
{
    public function marksheetview(){

    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::orderBy('id','asc')->get();
        return view('backend.student.marksheet.marksheet-view',$data);
    }

    public function marksheetget(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$exam_type_id = $request->exam_type_id;
    	$id_no = $request->id_no;

    	$count_fail = StudentMark:: where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('mcq_marks','<','10')->get()->count();

    	$singlestudent = StudentMark:: where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();

    	if($singlestudent == true){

    		$allmarks = StudentMark::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();
    		$allgrades = StudentMarksGrade::all();

    		return view('backend.student.marksheet.marksheet-pdf',compact('allmarks','allgrades','count_fail'));

    	}else{
    		return redirect()->back()->with('error','Sorry! These criteria does not match!');

    	}
    }

    public function attendanceview(){

        $data['employees'] = User::where('usertype','employee')->get();
       
        return view('backend.employee.employee_attend.attendance-report-view',$data);
    }
        public function attendanceget(Request $request){
            $employee_id = $request->employee_id;
            if($employee_id !=''){
                $where[] = ['employee_id',$employee_id];
            }
            $date = date('Y-m',strtotime($request->attend_date));
            if($date !=''){
            $where[] = ['attend_date','like',$date.'%'];
            }

            $singleattendance = EmployeeAtten::with(['user'])->where($where)->first();
            if($singleattendance == true){
            $data['alldata'] = EmployeeAtten::with(['user'])->where($where)->get();
            $data['absents'] =  EmployeeAtten::with(['user'])->where($where)->where('attend_status','Absent')->get()->count();
            $data['leaves'] = EmployeeAtten::with(['user'])->where($where)->where('attend_status','Leave')->get()->count();
            $data['month'] = date('M-Y',strtotime($request->attend_date));
            $pdf = PDF::loadView('backend.employee.employee_attend.attendance-report-pdf',$data);
            $pdf ->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('Stuff Attendance Report.pdf');
            }else{
                return redirect()->back()->with('error','Sorry! These criteria does not match!');
            }

        }

         public function resultsheetview(){
        $data['years'] = StudentYear::orderBy('id','desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::orderBy('id','asc')->get();
        return view('backend.student.resultsheet.resultsheet-view',$data);
    }

    public function resultsheetget(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;

        $singleresult = StudentMark:: where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->first();
        if($singleresult == true){
            $data['alldata'] = StudentMark::select('year_id','class_id','exam_type_id','student_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();
             $pdf = PDF::loadView('backend.student.resultsheet.resultsheet-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('Class Wise Result Report.pdf');
        }else{
            return redirect()->back()->with('error','Sorry! These criteria does not match!');
        }
    }
}
