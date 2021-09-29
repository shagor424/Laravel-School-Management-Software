<?php

namespace App\Http\Controllers\Admin\Bckend\Student;

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

class StudentExamFeeController extends Controller
{
    public function view(){

        
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::orderBy('id','asc')->get();
    	$data['groups'] = StudentGroup::orderBy('id','asc')->get();
        $data['sections'] = StudentSection::orderBy('id','asc')->get();
        $data['shifts'] = StudentShift::orderBy('id','asc')->get();
        
    	return view('backend.student.student_examfee.view-examifee',$data);

    }

    public function getsexamfee(Request $request){
    	
    	$class_id = $request->class_id;
    	
    	$year_id = $request->year_id;

        $group_id = $request->group_id;
        
        $shift_id = $request->shift_id;

        $section_id = $request->section_id;
        
       

    	if($class_id !=''){
    		$where[] = ['class_id',$class_id.'%'];
    	}
    	
    	if($year_id !=''){
    		$where[] = ['year_id',$year_id.'%'];
    	}

        if($group_id !=''){
            $where[] = ['group_id',$group_id.'%'];
        }
        
        if($shift_id !=''){
            $where[] = ['shift_id',$shift_id.'%'];
        }
        
        if($section_id !=''){
            $where[] = ['section_id',$section_id.'%'];
        }



    	$allstudent = AssignStudent::with(['disscount'])->where($where)->get();

    	$html['thsource']  = '<th>Serial</th>';
    	$html['thsource'] .= '<th>Student ID</th>';
    	$html['thsource'] .= '<th>Student Name</th>';
    	$html['thsource'] .= '<th>Class Roll</th>';
    	//$html['thsource'] = '<th>Class</th>';
    	//$html['thsource'] = '<th>Group</th>';
    	//$html['thsource'] = '<th>Section</th>';
    	//$html['thsource'] = '<th>Shift</th>';
    	
    	$html['thsource'] .= '<th>Exam Fee</th>';
    	$html['thsource'] .= '<th>Discount</th>';
    	$html['thsource'] .= '<th>Fee (This Student)</th>';
    	$html['thsource'] .= '<th>Action</th>';

    	foreach ($allstudent as $key => $v) {
    	$regifee = FeeAmount::where('fee_catagory_id','4')->where('class_id',$v->class_id)->first();
    		$color = 'success';
    		$html[$key]['tdsource']  ='<td>'.($key+1).'</td>';
    		$html[$key]['tdsource'] .='<td>'.$v['student']['id_no'].'</td>';
    		$html[$key]['tdsource'] .='<td>'.$v['student']['name'].'</td>';
    		$html[$key]['tdsource'] .='<td>'.$v->class_roll.'</td>';
    		$html[$key]['tdsource'] .='<td>'.$regifee->amount.'TK'.'</td>';
    		$html[$key]['tdsource'] .='<td>'.$v['disscount']['discount'].'%'.'</td>';

    		$originalfee = $regifee->amount;
    		$discount = $v['disscount']['discount'];
    		$disscountablefee = $discount/100*$originalfee;
    		$finalfee = (float)$originalfee-(float)$disscountablefee;

    		$html[$key]['tdsource'] .='<td>'.$finalfee.'TK'.'</td>';
    		$html[$key]['tdsource'] .='<td>';
    		$html[$key]['tdsource'] .=' <a class="btn btn-sm btn-'.$color.'" title="exam payslip" target="_blank" href="'.route("students.examfee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Tution Fee Slip</a>';
    		$html[$key]['tdsource'] .='</td>';
    	}
    	return response()->json(@$html);
    }


    public function exampayslip(Request $request){

    	$student_id = $request->student_id;
    	$class_id = $request->class_id;
    	$allstudent['details'] = AssignStudent::with(['disscount','student'])->where('student_id',$student_id)->where('class_id',$class_id)->first(); 
    	
    	$pdf = PDF::loadView('backend.student.student_examfee.examfee-pdf',$allstudent);
    	$pdf->setProtection(['copy','print'], '','pass');
    	return $pdf->stream('student-exam-fee.pdf');


    	 
 
   } 	  
}
