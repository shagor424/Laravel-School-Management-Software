<?php

namespace App\Http\Controllers\Admin\Backend\account;

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
use App\Model\AccountEmployeeSalary;

class SalaryController extends Controller
{
    public function view(){
    	$data['alldata'] = AccountEmployeeSalary::all();
    	return view('backend.account.employee.fee-view',$data);
    }

    public function add(){

        return view('backend.account.employee.fee-add');
    }

    public function salarygetstudent(Request $request){
     	$date = date('Y-m',strtotime($request->date));
     		if($date !=''){
    		$where[] = ['attend_date','like',$date.'%'];
    	}
    	$data = EmployeeAtten::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    	$html['thsource']  = '<th>Serial</th>';
    	$html['thsource'] .= '<th>Employee ID</th>';
    	$html['thsource'] .= '<th>Employee Name</th>';
    	$html['thsource'] .= '<th>Basic Salary</th>';
    	$html['thsource'] .= '<th>Salary(This Month)</th>';
    	$html['thsource'] .= '<th>Action</th>';
    	
    	foreach ($data as $key => $attend){
    	$account_salary = AccountEmployeeSalary::where('employee_id',$attend->employee_id)->where('date',$date)->first();
    	if($account_salary !=null){
    		$checked = 'checked';
    	}else{
    		$checked='';
    	}


    	    $totalattend = EmployeeAtten::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
    	    $absentcount=count($totalattend->where('attend_status','Absent'));

    		
    		$html[$key]['tdsource']  ='<td>'.($key+1).'</td>';
    		$html[$key]['tdsource'] .='<td>'.$attend['user']['id_no'].'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
    		$html[$key]['tdsource'] .='<td>'.$attend['user']['name'].'</td>';
    		$html[$key]['tdsource'] .='<td>'.$attend['user']['salary'].'</td>';
    		$salary = (float)$attend['user']['salary'];
    		$salaryperday = (float)$salary/30;
    		$totalsalariminus = (float)$absentcount*(float)$salaryperday;
    		$totalsalary = (float)$salary-(float)$totalsalariminus;
    		$html[$key]['tdsource'] .='<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'"'.'</td>';
    		$html[$key]
            ['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$attend->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform:scale(1.5);margin-left:10px;">'.'<td>';
    	}

    	return response()->json(@$html); 
}

    public function store(Request $request){
        $date = date('Y-m-d',strtotime($request->date));
        AccountEmployeeSalary::where('date',$date)->delete();
        $checkdata = $request->checkmanage;
        if($checkdata !=null){
            for($i=0; $i <count($checkdata); $i++){
                $data = new AccountEmployeeSalary();
                $data->date = $date;
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        }

        if(!empty(@data) || empty($checkdata)){
            return redirect()->route('accounts.salary.view')->with('success','Data Updated Successfully');
        }else{
            return redirect()->back()->with('error','Sorry data not saved!!');
        }

    }

}