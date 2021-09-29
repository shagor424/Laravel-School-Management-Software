<?php 

namespace App\Http\Controllers\Admin\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClass;
use App\Model\Subject; 
use App\Model\AssignSubject;
use App\Model\StudentSection;
use App\Model\StudentGroup;
use DB;
use App\Model\ClassTitle;
use Auth;

class AsssubController extends Controller
{
    public function view(){
    $data['alldata'] = AssignSubject::select('title_id')->groupBy('title_id')->get();
  
    return view('backend.setup.assignsubject.view-asssub',$data);
    } 
    
    public function add(){
    	$data['subjects'] = Subject::all();
        $data['class_titles'] = ClassTitle::all();
    	$data['student_classes'] = StudentClass::all();
        $data['student_groups'] = StudentGroup::all();
    	return view('backend.setup.assignsubject.add-asssub',$data);
    }
    
     public function store(Request $request){
     	$subjectCount = count($request->subject_id);
     	if($subjectCount !=NULL){
     		for ($i=0; $i <$subjectCount ; $i++) { 
     			$assign_sub = new AssignSubject();
                $assign_sub->title_id = $request->title_id;
     			$assign_sub->class_id = $request->class_id;
                $assign_sub->group_id = $request->group_id;
     			$assign_sub->subject_id = $request->subject_id[$i];
     			$assign_sub->full_mark = $request->full_mark[$i];
     			$assign_sub->pass_mark = $request->pass_mark[$i];
     			$assign_sub->subjective_mark = $request->subjective_mark[$i];
     			$assign_sub->save();
     		}
     	
     	} 
    	return redirect()->route('asssubs.student.asssub.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($title_id){
         $data['editdata'] = AssignSubject::where('title_id',$title_id)->orderby('title_id','asc')->get();   
            //dd($data['editdata']->toArray());
            $data['class_titles'] = ClassTitle::all();
            $data['subjects'] = Subject::all();
            $data['student_classes'] = StudentClass::all();
            $data['student_groups'] = Studentgroup::all();
            return view('backend.setup.assignsubject.edit-assign-subject',$data);

        }

        public function update(Request $request,$title_id){
            if($request->subject_id==NULL){
                
                return redirect()->back()->with('error','Sorrry! you do not select item');
            }else{
                 AssignSubject::whereNotIn('subject_id',$request->subject_id)->where('title_id',$title_id)->delete();

               foreach ($request->subject_id as $key => $value){
                $assign_subject_exist = AssignSubject::where('subject_id',$request->subject_id[$key])->where('title_id',$request->title_id)->first();

                
                if ($assign_subject_exist){
                    $assign_sub = $assign_subject_exist;
                }else{
                    $assign_sub = new AssignSubject();
                }

               
                $assign_sub->title_id = $request->title_id;
                $assign_sub->class_id = $request->class_id;
                $assign_sub->group_id = $request->group_id;
                $assign_sub->subject_id = $request->subject_id[$key];
                $assign_sub->full_mark = $request->full_mark[$key];
                $assign_sub->pass_mark = $request->pass_mark[$key];
                $assign_sub->subjective_mark = $request->subjective_mark[$key];
                $assign_sub->updated_by = Auth::user()->id;
                $assign_sub->save();
               
               
                
     			
     		}
        }
        
           

return redirect()->route('asssubs.student.asssub.view')->with('success','Assign Subject Updated Successfully');
    

 }       

        public function details($title_id){

             $data['editdata'] = AssignSubject::where('title_id',$title_id)->orderby('subject_id','asc')->get();
            
            //dd($data['editdata']->toArray());
           
            return view('backend.setup.assignsubject.details-assign-subject',$data);

        }
}
