<?php

namespace App\Http\Controllers\Admin\Backend\account;

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

class StudentFeeController extends Controller
{
    public function view(){
    	$data['alldata'] = AccountStudentFee::all();
    	return view('backend.account.student.fee-view',$data);
    }

    public function add(){
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::all();
        $data['shifts'] = StudentShift::orderBy('id','desc')->get();
        $data['sections'] = StudentSection::all();
        $data['groups'] = StudentGroup::all();
        $data['fee_catagories'] = FeeCatagory::all();

        return view('backend.account.student.fee-add',$data);
    }

    public function feegetstudent(Request $request){
     	
    	$class_id = $request->class_id;
    	$year_id = $request->year_id;
        $group_id = $request->group_id;
        $shift_id = $request->shift_id;
        $section_id = $request->section_id;
        $fee_catagory_id = $request->fee_catagory_id;
        $date = date('M-Y',strtotime($request->date));

    	$data = AssignStudent::with(['disscount'])->where('class_id',$class_id)->where('year_id',$year_id)->where('group_id',$group_id)->where('shift_id',$shift_id)->where('section_id',$section_id)->get();
    	$html['thsource']  = '<th>ID No</th>';
    	$html['thsource'] .= '<th>Name</th>';
    	$html['thsource'] .= '<th>Father Name</th>';
    	$html['thsource'] .= '<th>Group</th>';
        $html['thsource'] .= '<th>Section</th>';
        $html['thsource'] .= '<th>Shift</th>';
        $html['thsource'] .= '<th>Original Fee</th>';
    	$html['thsource'] .= '<th>Discount</th>';
    	$html['thsource'] .= '<th>Fee(This Student)</th>';
    	$html['thsource'] .= '<th>Select</th>';
    	
    	foreach ($data as $key => $std) {
    	$registrtionfee = FeeAmount::where('fee_catagory_id',$fee_catagory_id)->where('class_id',$std->class_id)->first();
    	$accountstudentfees = AccountStudentFee::where('student_id',$std->student_id)->where('year_id',$std->year_id)->where('class_id',$std->class_id)->where('fee_catagory_id',$fee_catagory_id)->where('date',$date)->where('group_id',$std->group_id)->where('shift_id',$std->shift_id)->where('section_id',$std->section_id)->first();


    		if($accountstudentfees !=null){
    			$cheked ='checked';
    			}else{
    				$checked ='';
    		}
    		$color = 'success';
    		$html[$key]['tdsource'] ='<td>'.$std['student']['id_no'].'<input type"hidden" name="fee_catagory_id" value="'.$fee_catagory_id.'">'.'</td>';

    		$html[$key]['tdsource'] .='<td>'.$std['student']['name'].'<input type"hidden" name="year_id" value="'.$year_id.'">'.'</td>';

    		$html[$key]['tdsource'] .='<td>'.$std['student']['fname'].'<input type"hidden" name="class_id" value="'.$class_id.'">'.'</td>';

    		  $html[$key]['tdsource'] .='<td>'.$std['group']['name'].'<input type"hidden" name="group_id" value="'.$group_id.'">'.'</td>';

            $html[$key]['tdsource'] .='<td>'.$std['shift']['name'].'<input type"hidden" name="shift_id" value="'.$shift_id.'">'.'</td>';

            $html[$key]['tdsource'] .='<td>'.$std['section']['name'].'<input type"hidden" name="section_id" value="'.$section_id.'">'.'</td>';

            $html[$key]['tdsource'] .='<td>'.$registrtionfee.'<input type"hidden" name="date" value="'.$date.'">'.'</td>';

            $html[$key]['tdsource'] .='<td>'.$std['disscount']['disscount'].'%'.'</td>';


    		$originalfee = $registrtionfee->amount;
    		$discount = $std['disscount']['disscount'];
    		$discountablefee = $discount/100*$originalfee;
    		$finalfee = (int)$originalfee-(int)$discountablefee;

    		$html[$key]['tdsource'] .='<td>'.'<input type="text" name="amount[]" value="'.$finalfee.'" class="form-control"readonly>'.'</td>';
    		
    		$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="student_id[]" value="'.$std->$student_id.'">'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$cheaked.' style="transform:scale(1.5);margin-left:10px;">'.'</td>';
    	}
    	return response()->json(@$html); 
}

        public function store(Request $request){

            $date = date('M-Y',strtotime($request->date));
         AssignStudent::where('class_id',$class_id)->where('year_id',$year_id)->where('group_id',$group_id)->where('shift_id',$shift_id)->where('section_id',$section_id)->delete();

         $checkdata = $request->checkmanage;
        if($checkdata !=null){
            for ($i=0; $i <count($checkdata) ; $i++){
                $data = new AccountStudentFee();
                $data->class_id = $request->class_id;
                $data->group_id = $request->group_id;            
                $data->shift_id = $request->shift_id;
                $data->section_id = $request->section_id;
                $data->year_id = $request->year_id;
                $data->date = $request->date;
                $data->fee_catagory_id = $request->fee_catagory_id;
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();

                }
         }
            if(!empty(@$data)|| empty($checkdata)){
                return redirect()->route('accounts.fee.view')->with('success', 'Well done! Successfully upadated');

                }else{
                    return redirect()->back()->with('error','Sorry! data not sent');
                }
       }     
}
        


