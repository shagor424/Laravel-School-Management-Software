<?php

namespace App\Http\Controllers\Admin\Backend\Employee;

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

class EmployeeSalaryController extends Controller
{

	 public function view(){

    	$data['alldata'] = User::where('usertype','employee')->get();
    	return view('backend.employee.employee_salary.view-salary',$data);

    }

  	public function increment($id){
        $data['editdata'] = User::find($id);
  		
        return view('backend.employee.employee_salary.add-salary',$data);;
  
}

	public function store(Request $request, $id){
	
    		$user = User::find($id);
    		$previous_salary = $user->salary;
    		$present_salary = (float)$previous_salary+$request->increment_salary;
    		$user->salary = $present_salary;
    		$user->save();

    		$salarydata = new EmployeeSalary();
    		$salarydata->employee_id= $id;
    		$salarydata->previous_salary = $previous_salary;
    		$salarydata->increment_salary = $request->increment_salary;
    		$salarydata->present_salary = $present_salary;
    		$salarydata->effected_date = date('Y-m-d',strtotime($request->effected_date));
    		$salarydata->save();      

         return redirect()->route('employees.salary.view')->with('success','Data Inserted Successfully');
         
	}

		
		public function details($id){
			$data['details'] = User::find($id);
			$data['salary'] = EmployeeSalary::where('employee_id',$data['details']->id)->get();
			
			return view('backend.employee.employee_salary.employee-salary-details',$data);

	
}

public function detailspdf($id){
		 $data['detailspdf'] = User::find($id);
		 $data['salary'] = EmployeeSalary::where('employee_id',$data['details']->id)->get();
			$pdf = PDF::loadView('backend.employee.employee_salary.employee-salary-details-pdf', $data);
			$pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('document.pdf');

		


}
    
}
