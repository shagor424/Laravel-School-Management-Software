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
use App\Model\FeeCatagory;
use App\Model\FeeAmount; 
use PDF;
use App\Model\AccountStudentFee;
use App\Model\StudentInvoice;
use App\Model\StudentInvoiceDetail;
use App\Model\StudentPayment;
use App\Model\StudentPaymentDetail;


class StudentPaymentController extends Controller
{
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
}
