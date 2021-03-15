<?php

namespace App\Http\Controllers\backend\account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OtherCost;
use App\User;
use Auth;

class OtherCostController extends Controller
{
    public function view(){
    	$data['alldata'] = OtherCost::orderBy('id','desc')->get();
    	return view('backend.account.othercost.cost-view',$data);
    }

    public function add(){

    return view('backend.account.othercost.cost-add');

    }
    	 public function store(Request $request){
     		$cost = new OtherCost();
     		$cost->date = date('y-m-d',strtotime($request->date));
    		$cost->amount = $request->amount;
    		$cost->descrip = $request->descrip;
    		$cost->created_by = Auth::user()->id;
    		

    		if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/costimage'), $filename);
          $cost['image'] = $filename;
        }
    	$cost->save();
    	return redirect()->route('accounts.cost.view')->with('success','Other Cost Inserted Successfully');

     }  

     public function edit($id){
            $data['data'] = OtherCost::find($id);
            return view('backend.account.othercost.cost-add',$data);

        }


		public function update(Request $request,$id){
            $cost = OtherCost::find($id);
            $cost->date = date('y-m-d',strtotime($request->date));
    		$cost->amount = $request->amount;
    		$cost->descrip = $request->descrip;
            $cost->updated_by = Auth::user()->id;

         if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/costimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/costimage'), $filename);
          $cost['image'] = $filename;
        }
        $cost->save();

        return redirect()->route('accounts.cost.view')->with('success','Other Cost Updated Successfully');
 
        }

     public function delete($id){
            $cost = OtherCost::find($id);

          if (file_exists('public/upload/costimage/' . $cost->image) AND !
            empty($cost->image)){
               unlink('public/upload/costimage/' . $cost->image);
       }
            $cost->delete();
            return redirect()->route('accounts.cost.view')->with('success','Other Cost Deleted Successfully');

          }  
}
