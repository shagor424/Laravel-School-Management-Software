<?php

namespace App\Http\Controllers\Backend\Payment;

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
use Session;
use App\Model\FeeCatagory;
use App\Model\FeeAmount; 
use PDF;
use App\Model\AccountStudentFee;
use App\Model\StudentInvoice;
use App\Model\StudentInvoiceDetail;
use App\Model\StudentPayment;
use App\Model\StudentPaymentDetail;
use Auth;
use Str;
use Carbon\Carbon;

class StudentPaymentController extends Controller
{

    public function viewpayment(){
        $data = StudentInvoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','1')->get();
        return view('backend.payment.student.view-payment',compact('data'));
    }

    public function addpayment(){
        $data['students'] = User::orderBy('id','ASC')->get();
        $data['feecats'] = FeeCatagory::orderBy('id','ASC')->get();

        $invoice_data = StudentInvoice::orderby('id','desc')->first();
        if($invoice_data == null){
            $firstReg = '1000';
            $data['invoice_no'] = $firstReg+1;
        }else{
            $invoice_data = StudentInvoice::orderby('id','desc')->first()->invoice_no;
            $data['invoice_no'] = $invoice_data+1;
        }
        
         $data['date'] = date('Y-m-d');
        return view('backend.payment.student.add-payment',$data);

    }

    public function storepayment(Request $request){ 
 
    if($request->student_id == null){
        return redirect()->back()->with('error','Sorry! you do not select any item');

    }else{

           if($request->st_id == null){
                $student_id = $student->id;
            }else{
                 $student_id = $request->st_id;
            }


     $invoice = new StudentInvoice();
     $invoice->invoice_no = $request->invoice_no;
     $invoice->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice->total_amount = $request->estimated_amount;
     $invoice->description = $request->description;
     $invoice->student_id = $student_id;
     $invoice->status = '0';
     $invoice->created_by = Auth::user()->id;
     
     DB::transaction(function() use($request,$invoice){
        if($invoice->save()){
            $count_feecat = count($request->feecat_id);
        for ($i=0; $i < $count_feecat; $i++){

     $invoice_details = new StudentInvoiceDetail();
     $invoice_details->invoice_date = date('Y-m-d',strtotime($request->invoice_date));
     $invoice_details->invoice_id = $invoice->id;
     $invoice_details->student_id = $request->student_id[$i];
     $invoice_details->feecat_id = $request->feecat_id[$i];
     $invoice_details->amount = $request->amount[$i];
     $invoice_details->selling_quantity = $request->selling_quantity[$i];
     $invoice_details->selling_price = $request->selling_price[$i];
     // $invoice_details->total_amount = $request->estimated_amount;
     $invoice_details->status= '0';
     $invoice_details->save();


        }

            if($request->st_id == null){
                $student_id = $student->id;
            }else{
                 $student_id = $request->st_id;
            }

            $payment = new StudentPayment();
            $payment_details = new StudentPaymentDetail();
            $payment->invoice_id = $invoice->id;
            $payment->student_id = $student_id;
            $payment->paid_status =$request->paid_status; 
            $payment->discount_amount =$request->discount_amount;
            $payment->total_amount =$request->estimated_amount;

            if($request->paid_status == 'full_paid'){
                $payment->paid_amount = $request->estimated_amount;
                $payment->due_amount = '0';
                $payment_details->current_paid_amount = $request->estimated_amount;
            }elseif($request->paid_status == 'full_due') {
                $payment->paid_amount = '0';
                $payment->due_amount = $request->estimated_amount;
                $payment_details->current_paid_amount = '0';

            } elseif ($request->paid_status == 'some_paid') {
                $payment->paid_amount = $request->paid_amount;
                $payment->due_amount = $request->estimated_amount-$request->paid_amount;
                $payment_details->current_paid_amount = $request->paid_amount;
                }   

                $payment->save();
                $payment_details->invoice_id =  $invoice->id;
                $payment_details->payment_date = date('Y-m-d',strtotime($request->invoice_date));
                $payment_details->student_id = $student_id;
                $payment_details->save();
        
        }
        
     });  

     }   

    return redirect()->route('payments.student.pendinglist')->with('success','Invoice Created Successfully');
    }

          public function delete($id){
            $invoice = StudentInvoice::find($id);
            $invoice->delete();
            StudentInvoiceDetail::where('invoice_id',$invoice->id)->delete();
            StudentPayment::where('invoice_id',$invoice->id)->delete();
            StudentPaymentDetail::where('invoice_id',$invoice->id)->delete();
            return redirect()->route('payments.student.pendinglist')->with('success','Invoice Deleted Successfully');

          } 

          public function pendinglist(){
   $data = StudentInvoice::orderby('id','DESC')->latest()->orderby('invoice_date','DESC')->where('status','0')->get();
    return view('backend.payment.student.pending-list',compact('data'));
    }


  public function allview($id){
        $invoice = StudentInvoice::with(['invoicedetails'])->find($id);
         return view('backend.payment.student.show-alldata',compact('invoice'));
    }

    public function approveview($id){
        $invoice = StudentInvoice::with(['invoicedetails'])->find($id);
         return view('backend.payment.student.approve-view',compact('invoice'));
    }


public function studentinvoice($id){
        $data['invoice'] = StudentInvoice::with(['invoicedetails'])->find($id);
        $pdf = PDF::loadView('backend.payment.student.pdf.paymentIdBy-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('customer-invoice.pdf');

    }
    public function approvestore(Request $request, $id){

            $invoice = StudentInvoice::find($id);
            $invoice->approved_by = Auth::user()->id;
            $invoice->status = '1';
            $invoice->save();
         
           
      return redirect()->route('payments.student.view')->with('success','Invoice Approved Successfully');

   } 

     public function dailyview(Request $request){
       $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
       
         return view('backend.payment.student.daily-view',$data);
    }


    public function dailyreportpdf(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
         $pdf = PDF::loadView('backend.payment.student.pdf.daily-invoice-report-pdf',$data);
            $pdf->SetProtection(['copy','print'],'','pass');
            return $pdf->stream('daily-invoice-report.pdf');

     }

      public function dailyreport(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['alldata'] = Invoice::whereBetween('invoice_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.invoice.daily-view',$data);

     }
}
