<?php 

namespace App\Http\Controllers\Backend\Setup;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FeeCatagory;
use App\Model\StudentClass;
use App\Model\StudentSection;
use Auth;

use App\Model\FeeAmount;

use DB;

class StudentFeecatamController extends Controller
{
    public function view(){

    $data['alldata'] = FeeAmount::select('fee_catagory_id')->groupBy('fee_catagory_id')->get();
    return view('backend.setup.feeamount.view-feecatam',$data);
    } 
    
    public function add(){
    	$data['fee_catagories'] = FeeCatagory::all();
    	$data['student_classes'] = StudentClass::all();
    	return view('backend.setup.feeamount.add-feecatam',$data);
    }
    
     public function store(Request $request){
     	$countclass = count($request->class_id);
     	if($countclass !=NULL){
     		for ($i=0; $i <$countclass ; $i++) { 
     			$fee_amount = new FeeAmount();
     			$fee_amount->fee_catagory_id = $request->fee_catagory_id;
     			$fee_amount->class_id = $request->class_id[$i];
     			$fee_amount->amount = $request->amount[$i];
     			$fee_amount->save();
     		}
     	
     	} 
    	return redirect()->route('feecatams.student.feecatam.view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($fee_catagory_id){
            $data['editdata'] = FeeAmount::where('fee_catagory_id',$fee_catagory_id)->orderby('class_id','asc')->get();
            //dd($data['editdata']->toArray());
            $data['fee_catagories'] = FeeCatagory::all();
            $data['student_classes'] = StudentClass::all();
            return view('backend.setup.feeamount.edit-fee-amount',$data);

        }

        public function update(Request $request,$fee_catagory_id){
            if($request->class_id==NULL){
                
                return redirect()->back()->with('error','Sorrry! you do not select item');
            }else{
                FeeAmount::whereNotIn('class_id',$request->class_id)->where('fee_catagory_id',$fee_catagory_id)->delete();
                foreach ($request->class_id as $key => $value){
                $fee_amount_exist = FeeAmount::where('class_id',$request->class_id[$key])->where('fee_catagory_id',$request->fee_catagory_id)->first();

                if ($fee_amount_exist){
                    $fee_amount = $fee_amount_exist;
                }else{
                    $$fee_amount = new FeeAmount();
                }
                
                $fee_amount->fee_catagory_id = $request->fee_catagory_id;
                $fee_amount->class_id = $request->class_id[$key];
                $fee_amount->amount = $request->amount[$key];
                $fee_amount->updated_by = Auth::user()->id;
                $fee_amount->save();
            }
        }
        
return redirect()->route('feecatams.student.feecatam.view')->with('success','Data Updated Successfully');

     
}
          public function delete(Request $request,$fee_catagory_id){
            $data = FeeAmount::find($request->fee_catagory_id); 
             $data->delete();
            return redirect()->route('feecatams.student.feecatam.view')->with('success','Data Deleted Successfully');


     }  
        public function details($fee_catagory_id){
            $data['editdata'] = FeeAmount::where('fee_catagory_id',$fee_catagory_id)->orderby('class_id','asc')->get();
            //dd($data['editdata']->toArray());
           
            return view('backend.setup.feeamount.details-fee-amount',$data);

        }


}