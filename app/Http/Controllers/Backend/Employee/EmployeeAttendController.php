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
use App\Model\EmployeeAtten; 

class EmployeeAttendController extends Controller
{ 
     public function view(){


    	$data['alldata'] = EmployeeAtten::select('attend_date')->groupBy('attend_date')->orderBy('id','DESC')->get();
    	return view('backend.employee.employee_attend.view-attend',$data);

    }

  

    public function add(){

    	$data['employees'] = User::where('usertype','employee')->get();
    	return view('backend.employee.employee_attend.add-attend',$data);

    }



    public function store(Request $request){
        EmployeeAtten::where('attend_date',date('Y-m-d',strtotime($request->attend_date)))->delete();
    	$countemployee = count($request->employee_id);
    	for ($i=0; $i <$countemployee;$i++){
    		$attend_status= 'attend_status'.$i;
    		$attend = new EmployeeAtten();
    		$attend->attend_date = date('Y-m-d',strtotime($request->attend_date));
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	}
    	
        return redirect()->route('employees.attendance.view')->with('success','Attendance  Inserted Successfully');
}

		public function edit($attend_date){
			$data['editdata'] = EmployeeAtten::where('attend_date',$attend_date)->get();
			$data['employees'] = User::where('usertype','employee')->get();
        return view('backend.employee.employee_attend.add-attend',$data);
		}



		public function details($attend_date){
		$data['details'] = EmployeeAtten::where('attend_date',$attend_date)->get();
            
        return view('backend.employee.employee_attend.details-attend',$data);

		


}
}
