<?php 

namespace App\Http\Controllers\Admin\Backend\Student;

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

class StudentRegiController extends Controller
{
    public function view(){

        $data['sections'] = StudentSection::orderBy('id','asc')->get();
        $data['section_id'] = StudentSection::orderBy('id','asc')->first()->id;

    	$data['groups'] = StudentGroup::orderBy('id','asc')->get();
    	$data['group_id'] = StudentGroup::orderBy('id','asc')->first()->id;
    	$data['shifts'] = StudentShift::orderBy('id','asc')->get();
    	$data['shift_id'] = StudentShift::orderBy('id','asc')->first()->id;
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['year_id'] = StudentYear::orderBy('id','desc')->first()->id;
    	$data['classes'] = StudentClass::orderBy('id','asc')->get();
    	$data['class_id'] = StudentClass::orderBy('id','asc')->first()->id;
    	$data['alldata'] = AssignStudent::where('year_id',$data['year_id'])->where('class_id',$data['class_id'])->where('group_id',$data['group_id'])->where('shift_id',$data['shift_id'])->where('section_id',$data['section_id'])->get();
    	return view('backend.student.student_regi.view-student',$data);

    }

    public function stsearch(Request $request){
        $data['sections'] = StudentSection::orderBy('id','asc')->get();
        $data['section_id'] = StudentSection::orderBy('id','asc')->first()->id;
        $data['section_id'] = $request->section_id;
    	$data['groups'] = StudentGroup::orderBy('id','asc')->get();
    	$data['group_id'] = $request->group_id;
    	$data['shifts'] = StudentShift::orderBy('id','asc')->get();
    	$data['shift_id'] = $request->shift_id;
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['year_id'] = $request->year_id;
    	$data['classes'] = StudentClass::orderBy('id','asc')->get();
    	$data['class_id'] = $request->class_id;
    	$data['alldata'] = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->get();
    	return view('backend.student.student_regi.view-student',$data);
 }


    public function add(){
    	$data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all();
    	$data['shifts'] = StudentShift::all();
    	$data['sections'] = StudentSection::all();
    	return view('backend.student.student_regi.add-student',$data);

    }



    public function store(Request $request){

         $this->validate($request,[
            
            'email'=>'unique:users,email'

        ]);
        DB::transaction(function() use ($request) {
            $checkyear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype','student')->orderBy('id','DESC')->first();
            if($student == null){
                $firstreg = 0;
                $studentid = $firstreg+1;
                if($studentid < 10){
                    $id_no = '000'.$studentid;
                }elseif ($studentid < 100){
                    $id_no = '00'.$studentid;
                }elseif ($studentid < 1000){
                    $id_no = '0'.$studentid;
                }

            }else {
                $student = User::where('usertype','student')->orderBy('id','DESC')->first()->id;
                $studentid = $student+1;
                if($studentid < 10){
                    $id_no = '000'.$studentid;
                }elseif ($studentid < 100){
                    $id_no = '00'.$studentid;
                }elseif ($studentid < 1000){
                    $id_no = '0'.$studentid;
                }
            }

            $final_id_no = $checkyear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'student';
            $user->role = 'student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
           


          if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/stimage'), $filename);
          $user['image'] = $filename;
        }





            $user->save();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->section_id = $request->section_id;
            $assign_student->save();

            $discoun_student = new DisscountStudent();
            $discoun_student->assign_student_id = $assign_student->id;
            $discoun_student->fee_catagory_id = '1';
            $discoun_student->discount = $request->discount;
            $discoun_student->save();
        });

         return redirect()->route('students.regi.view')->with('success','Data Inserted Successfully');

}
  	public function edit($student_id){
  		$data['editdata'] = AssignStudent::with(['student','disscount'])->where('student_id',$student_id)->first();
  		
  	    $data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all(); 
    	$data['shifts'] = StudentShift::all();
        $data['sections'] = StudentSection::all();
    	
    	return view('backend.student.student_regi.add-student',$data);
}

	public function update(Request $request, $student_id){
	 DB::transaction(function() use ($request,$student_id) {
	 		$user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            


          if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/stimage/'.$user->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/stimage'), $filename);
          $user['image'] = $filename;
        }

            $user->save();
            $assign_student = AssignStudent::where('id',$request->id)->where('student_id',$student_id)->first();
           
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->year_id = $request->year_id;
             $assign_student->section_id = $request->section_id;
            $assign_student->save();

            $discoun_student =DisscountStudent::where('assign_student_id',$request->id)->first();
           
            $discoun_student->discount = $request->discount;
            $discoun_student->save();
        });

         return redirect()->route('students.regi.view')->with('success','Data Updated Successfully');
         
	}

		public function promotion($student_id){
  		$data['editdata'] = AssignStudent::with(['student','disscount'])->where('student_id',$student_id)->first();
  		
  	    $data['years'] = StudentYear::orderBy('id','desc')->get();
    	$data['classes'] = StudentClass::all();
    	$data['groups'] = StudentGroup::all(); 
    	$data['shifts'] = StudentShift::all();
    	$data['sections'] = StudentSection::all();
    	return view('backend.student.student_regi.promotion-student',$data);
}

	public function promotionstore(Request $request, $student_id){
	 DB::transaction(function() use ($request,$student_id) {
	 		$user = User::where('id',$student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->dob = date('Y-m-d',strtotime($request->dob));
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
           


          if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/stimage/'.$user->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/stimage'), $filename);
          $user['image'] = $filename;
        }

            $user->save();
            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->section_id = $request->section_id;
            $assign_student->save();

            $discoun_student = new DisscountStudent();
           	$discoun_student->assign_student_id = $assign_student->id;
           	$discoun_student->fee_catagory_id = '1';
            $discoun_student->discount = $request->discount;
            $discoun_student->save();
        });

         return redirect()->route('students.regi.view')->with('success','Student Promotion Successfully');
         
	}
		public function details($student_id){
			 $data['details'] = AssignStudent::with(['student','disscount'])->where('student_id',$student_id)->first();
			$pdf = PDF::loadView('backend.student.student_regi.student-details-pdf', $data);
			$pdf->SetProtection(['copy', 'print'], '', 'pass');
	
        }
	
}
