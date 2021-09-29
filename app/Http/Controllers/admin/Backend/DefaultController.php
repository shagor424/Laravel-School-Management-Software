<?php 

namespace App\Http\Controllers\Admin\Backend;

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
use App\Model\StudentMark;
use App\Model\ExamType;

class DefaultController extends Controller
{
     public function getsstudent(Request $request){
     	$class_id = $request->class_id;
    	$group_id = $request->group_id;
    	$section_id = $request->section_id;
    	$shift_id = $request->shift_id;
    	$year_id = $request->year_id;
   	     $alldata = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('group_id',$request->group_id)->where('shift_id',$request->shift_id)->where('section_id',$request->section_id)->get();
    	return response()->json($alldata);

   }

    public function getsubject(Request $request){

   	 $class_id = $request->class_id;
   	 $alldata = AssignSubject::with(['subject'])->where('class_id',$class_id)->get();
   	 return response()->json($alldata);

   } 
   public function getcategory(Request $request){
      $supplier_id = $request->supplier_id;
      $allcategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
      return response()->json($allcategory);

   }

    public function subgetcategory(Request $request){
     $category_id = $request->category_id;
     $allsubcategory = SubCategory::where('id',$category_id)->groupBy('sub_category_id')->get();
     return response()->json($allsubcategory);

   }

    public function subsubgetcategory(Request $request){
     $sub_category_id = $request->sub_category_id;
     $allsubsubcategory = Product::with(['subsubcategory'])->select('sub_sub_category_id')->where('sub_category_id',$sub_category_id)->groupBy('sub_sub_category_id')->get();
     return response()->json($allsubsubcategory);

   }

   public function getbrand(Request $request){
     $sub_sub_category_id = $request->sub_sub_category_id;
     $allbrand = Product::with(['brand'])->select('brand_id')->where('sub_sub_category_id',$sub_sub_category_id)->groupBy('brand_id')->get();
     return response()->json($allbrand);

   }

   public function getproductname(Request $request){
     $brand_id = $request->brand_id;
     $allproductname = Product::where('brand_id',$brand_id)->get();
     return response()->json($allproductname);
   }

   public function getproduct(Request $request){
     $category_id = $request->category_id;
     $productname = Product::where('category_id',$category_id)->get();
     return response()->json($productname);
   }

 public function getunit(Request $request){
     $product_id = $request->product_id;
     $allunit = Product::with(['unit'])->select('unit_id')->where('id',$product_id)->first()->unit_id;
     return response()->json($allunit);

   } 

    public function getmodel(Request $request){
     $product_id = $request->product_id;
     $allmodel = Product::where('id',$product_id)->first()->model;
     return response()->json($allmodel);
   } 

   public function getsize(Request $request){
     $product_id = $request->product_id;
     $allsize = Product::where('id',$product_id)->first()->size;
     return response()->json($allsize);

   } 

   public function getcolor(Request $request){
     $product_id = $request->product_id;
     $allsize = Product::where('id',$product_id)->first()->color;
     return response()->json($allsize);
   } 

    public function getproductcode(Request $request){
     $product_id = $request->product_id;
     $productcode = Product::where('id',$product_id)->first()->product_code;
     return response()->json($productcode);
   } 

    public function getwarrantytime(Request $request){
     $product_id = $request->product_id;
     $warrantytime = Product::where('id',$product_id)->first()->warranty_time;
     return response()->json($warrantytime);
   } 

   public function getstock(Request $request){
     $product_id = $request->product_id;
     $stock = Product::where('id',$product_id)->first()->quantity;
     return response()->json($stock);
   } 


    public function getname(Request $request){
     $student_id = $request->student_id;
     $name = User::where('id',$student_id)->first()->name;
     return response()->json($name);
   } 
  
 public function getfname(Request $request){
     $student_id = $request->student_id;
     $fname = User::where('id',$student_id)->first()->fname;
     return response()->json($fname);
   } 

   public function getmname(Request $request){
     $student_id = $request->student_id;
     $mname = User::where('id',$student_id)->first()->mname;
     return response()->json($mname);
   } 
  
 public function getmobile(Request $request){
     $student_id = $request->student_id;
     $mobile = User::where('id',$student_id)->first()->mobile;
     return response()->json($mobile);
   } 

   public function getid(Request $request){
     $student_id = $request->student_id;
     $id = User::where('id',$student_id)->first()->id;
     return response()->json($id);
   }


}
