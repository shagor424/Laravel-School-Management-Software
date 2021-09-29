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

class EmployeeRegiController extends Controller
{
    public function view(){

    	$data['alldata'] = User::where('usertype','employee')->get();
    	return view('backend.employee.employee_regi.view-employee',$data);

    }

    public function stsearch(Request $request){
        $data['sections'] = StudentSection::orderBy('id','asc')->get();
        $data['section_id'] = StudentSection::orderBy('id','asc')->first()->id;
        $data['section_id'] = $request->section_id;
    	
    	$data['alldata'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->get();

    	return view('backend.employee.employee_regi.view-employee',$data);
 }


    public function add(){
    	$data['designations'] = Designation::all();
    	return view('backend.employee.employee_regi.add-employee',$data);

    }



    public function store(Request $request){

            $this->validate($request,[
            
            'email'=>'required|unique:users,email'

        ]);

        DB::transaction(function() use ($request) {
            $checkyear = date('Ym',strtotime($request->join_date));
            $employee = User::where('usertype','employee')->orderBy('id','DESC')->first();
            if($employee == null){
                $firstreg = 0;
                $employeeid = $firstreg+1;
                if($employeeid < 10){
                    $id_no = '000'.$employeeid;
                }elseif ($employeeid < 100){
                    $id_no = '00'.$employeeid;
                }elseif ($employeeid < 1000){
                    $id_no = '0'.$employeeid;
                }

            }else {
                $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
                $employeeid = $employee+1;
                if($employeeid < 10){
                    $id_no = '000'.$employeeid;
                }elseif ($employeeid < 100){
                    $id_no = '00'.$employeeid;
                }elseif ($employeeid < 1000){
                    $id_no = '0'.$employeeid;
                }
            }

            $final_id_no = $checkyear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'employee';
            $user->role = $request->desi_id;
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->desi_id = $request->desi_id;


          if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/employeeimage'), $filename);
          $user['image'] = $filename;
        }

            $user->save();
            $employee_salary = new EmployeeSalary();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_date =date('Y-m-d',strtotime($request->join_date)); 
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();

        });

         return redirect()->route('employees.regi.view')->with('success','Data Inserted Successfully');

}
  	public function edit($id){
        $data['editdata'] = User::find($id);
  		$data['designations'] = Designation::all();
        return view('backend.employee.employee_regi.add-employee',$data);;
    	
    	
}

	public function update(Request $request, $id){
	
            $user = User::find($id);
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->join_date = date('Y-m-d',strtotime($request->join_date));
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->desi_id = $request->desi_id;


          if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/employeeimage/'.$user->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/employeeimage'), $filename);
          $user['image'] = $filename;
        }

            $user->save();

         return redirect()->route('employees.regi.view')->with('success','Data Updated Successfully');
         
	}

		
		public function details($id){
			 $data['details'] = User::find($id);
			$pdf = PDF::loadView('backend.employee.employee_regi.employee-details-pdf', $data);
			$pdf->SetProtection(['copy', 'print'], '', 'pass');
			return $pdf->stream('document.pdf');

		


}
}
