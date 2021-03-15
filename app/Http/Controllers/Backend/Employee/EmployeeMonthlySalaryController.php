<?php

namespace App\Http\Controllers\backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Designation;
use DB;
use PDF;
use App\Model\EmployeeSalary;
use App\Model\EmployeeLeave;
use App\Model\EmployeeLeavePurpose;
use App\Model\EmployeeMonthSalary;
use Auth;
use App\Model\EmployeeAtten;

class EmployeeMonthlySalaryController extends Controller
{
    public function view(){
    	return view('backend.employee.monthly_salary.salary-view');
     }


     public function getsalary(Request $request){
     	$date = date('Y-m',strtotime($request->attend_date));
     		if($date !=''){
    		$where[] = ['attend_date','like',$date.'%'];
    	}
    	$data = EmployeeAtten::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    	$html['thsource']  = '<th>Serial</th>';
    	$html['thsource'] .= '<th>Employee ID</th>';
    	$html['thsource'] .= '<th>Employee Name</th>';
    	$html['thsource'] .= '<th>Basic Salary</th>';
    	$html['thsource'] .= '<th>Present Salary</th>';
    	$html['thsource'] .= '<th>Action</th>';
    	
    	foreach ($data as $key => $attend) {
    	$totalattend = EmployeeAtten::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
    	$absentcount = count($totalattend->where('attend_status','Absent'));
    		$color = 'success';
    		$html[$key]['tdsource']  ='<td>'.($key+1).'</td>';
    		$html[$key]['tdsource'] .='<td>'.$attend['user']['id_no'].'</td>';
    		$html[$key]['tdsource'] .='<td>'.$attend['user']['name'].'</td>';
    		$html[$key]['tdsource'] .='<td>'.$attend['user']['salary'].'</td>';
    		$salary = (float)$attend['user']['salary'];
    		$salaryperday = (float)$salary/30;
    		$totalsalariminus = (float)$absentcount*(float)$salaryperday;
    		$totalsalary = (float)$salary-(float)$totalsalariminus;
    		$html[$key]['tdsource'] .='<td>'.$totalsalary.'</td>';
    		$html[$key]['tdsource'] .='<td>';
    		$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="payslip" target="_blank" href="'.route("employees.monthlysalary.payslip",$attend->employee_id).'">Fee Slip</a>';
    		$html[$key]['tdsource'] .='</td>';
    	}
    	return response()->json(@$html); 
}
	
	public function payslip(Request $request,$employee_id){
		$id = EmployeeAtten::where('employee_id',$employee_id)->first();
		$date = date('Y-m',strtotime($id->attend_date));

		if($date !=''){
    		$where[] = ['attend_date','like',$date.'%'];
    	}
    	$data['totalattendgroupbyid'] = EmployeeAtten::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();
    	$pdf = PDF::loadView('backend.employee.monthly_salary.salary-payslip',$data);
    	$pdf->setProtection(['copy','print'], '','pass');
    	return $pdf->stream('Employee-Salary-PaySlip.pdf');
	}


}