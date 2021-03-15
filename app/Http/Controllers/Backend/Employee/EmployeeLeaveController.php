<?php

namespace App\Http\Controllers\backend\Employee;

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
use App\Model\Designation;
use DB;
use PDF;
use App\Model\EmployeeSalary;
use App\Model\EmployeeLeave;
use App\Model\EmployeeLeavePurpose;


class EmployeeLeaveController extends Controller
{
   public function view(){


    	$data['alldata'] = EmployeeLeave::orderBy('id','DESC')->get();
    	return view('backend.employee.employee_leave.view-leave',$data);

    }

  

    public function add(){

    	$data['employees'] = User::where('usertype','employee')->get();
    	$data['leave_purpose'] = EmployeeLeavePurpose::all();
    	return view('backend.employee.employee_leave.add-leave',$data);

    }



    public function store(Request $request){

    	if($request->leave_purpose_id == "0"){
    		$leavepurpose = new EmployeeLeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id ;
         }   else{
         	$leave_purpose_id = $request->leave_purpose_id;
         }
         	$employee_leave = new EmployeeLeave();
         	$employee_leave->employee_id = $request->employee_id;
         	$employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
         	$employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
         	$employee_leave->leave_purpose_id = $leave_purpose_id;
         	$employee_leave->save();

        return redirect()->route('employees.leave.view')->with('success','Data Inserted Successfully');
}

		public function edit($id){
			$data['editdata'] = EmployeeLeave::find($id);
			$data['employees'] = User::where('usertype','employee')->get();
    	   $data['leave_purpose'] = EmployeeLeavePurpose::all();
			
			return view('backend.employee.employee_leave.add-leave',$data);
		}



	public function update(Request $request, $id){
	
           if($request->leave_purpose_id == "0"){
    		$leavepurpose = new EmployeeLeavePurpose();
    		$leavepurpose->name = $request->name;
    		$leavepurpose->save();
    		$leave_purpose_id = $leavepurpose->id ;
         }   else{
         	$leave_purpose_id = $request->leave_purpose_id;
         }
         	$employee_leave = EmployeeLeave::find($id);
         	$employee_leave->employee_id = $request->employee_id;
         	$employee_leave->start_date = date('Y-m-d',strtotime($request->start_date));
         	$employee_leave->end_date = date('Y-m-d',strtotime($request->end_date));
         	$employee_leave->leave_purpose_id = $leave_purpose_id;
         	$employee_leave->save();

         return redirect()->route('employees.leave.view')->with('success','Data Updated Successfully');
         
	}

		public function details($id){
			 $data['details'] = User::find($id);
			$pdf = PDF::loadView('backend.employee.employee_regi.employee-details-pdf', $data);
			$pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('document.pdf');

		


}
}
