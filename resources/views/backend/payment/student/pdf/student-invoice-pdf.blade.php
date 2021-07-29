<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ $invoice->id_no }} Student Invoice Report </title>
	<style type="text/css">
	body{
		margin: 0;
		padding: 0;
	}
    </style>
</head>
<body>

<div>
		<img src="{{ asset('public/upload/header-logo.jpg') }}" width="100%" style="height:75px">
</div>

<table width="100%" class="table table-bordered table-sm" border="1" style="margin-top:12px">
                  <tbody>
                    <tr>

                      <th colspan="5" class="text-center" style="font-size: 20px"><h4>Student Information</h4></th>
                      <th colspan="2">Invoice Date : <br>{{ date('d-M-Y',strtotime($invoice->invoice_date)) }}</th>
                  </tr>
                  <tr >
                      <th width="20%" class="text-center">Student ID</th>
                      <th width="18%">Student Name</th>
                      <th width="18%">Father Name</th>
                      <th width="10%"style="text-align: center;">Class</th>
                      <th width="10%"style="text-align: center;">Group</th>
                      <th width="10%"style="text-align: center;">Section</th>
                      <th width="15%"style="text-align: center;">Session</th>
                    </tr>
                     <tr>
                      <td width="20%" style="text-align: center;">{{$invoice['user']['id_no']}}</td>
                      <td width="18%">{{$invoice->user->name}}</td>
                      <td width="18%">{{$invoice['user']['fname']}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->student_class->name}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->group->name}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->section->name}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->year->name}}</td>
                    </tr>
                  </tbody>
                </table>
                
                <table width="100%" class="table table-bordered table-sm" style="margin-top:8px" border="1">
                  <thead>
                    <tr {{-- style="background-color: #001f3f;color: white" --}}>
                      <th>SL.</th>
                      <th class="text-center">Invoice ID</th>
                      <th>Fee Category</th>
                      <th style="text-align: right;">Amount</th>
                      <th style="text-align: right;">Subtotal</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                   @endphp
                   @foreach($invoice['invoicedetails'] as $key => $invoicedetail)
                  
                    <tr>
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{ $invoicedetail->invoice_id }}</td>
                      <td>{{$invoicedetail['feecategory']['cat_name']}}</td>
                      <td style="text-align: right;">{{ $invoicedetail->amount }}</td>
                      
                      <td style="text-align: right;">{{$invoicedetail->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $invoicedetail->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="4">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                     <tr>
                      <th style="text-align: right;" colspan="4">Discount Amount</th>
                      @if($invoice->payment->discount_amount == null)
                      <td style="text-align: right;">0.00</td>
                      @else
                      <td style="text-align: right;">{{$invoice['payment']['discount_amount']}}</td>
                      @endif
                    </tr>
                     @php
                   $total_amount = $total_sum - $invoice['payment']['discount_amount'];
                   @endphp
                     <tr>
                      <th style="text-align: right;" colspan="4">Total Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['total_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="4">Paid Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="4">Due Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['due_amount']}}</td>
                    </tr>
                  </tbody>
                </table>
    <i style="text-align: left;font-size: 12px;padding-top: -20px;">Print Date : {{date("d-M-Y h:i:s a")}}</i>

   
       <hr style="border:solid 1px;width: 22%;color: #000;text-align: right;padding-top: -20px;">
      <p style="text-align: right;margin-top: -7px;margin-right: 35px;">Accoutant</p>
    
                {{-- ===========Second part=========== --}}
                
                <hr>

  <div>
		<img src="{{ asset('public/upload/header-logo.jpg') }}" width="100%" style="height:75px">
</div>

<table width="100%" class="table table-bordered table-sm" border="1" style="margin-top:12px">
                  <tbody>
                    <tr>

                      <th colspan="7" class="text-center" style="font-size: 20px"><h4>Student Information</h4></th></tr>
                 <tr >
                      <th width="20%" class="text-center">Student ID</th>
                      <th width="18%">Student Name</th>
                      <th width="18%">Father Name</th>
                      <th width="10%"style="text-align: center;">Class</th>
                      <th width="10%"style="text-align: center;">Group</th>
                      <th width="10%"style="text-align: center;">Section</th>
                      <th width="15%"style="text-align: center;">Session</th>
                    </tr>
                     <tr>
                      <td width="20%" style="text-align: center;">{{$invoice['user']['id_no']}}</td>
                      <td width="18%">{{$invoice->user->name}}</td>
                      <td width="18%">{{$invoice['user']['fname']}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->student_class->name}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->group->name}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->section->name}}</td>
                      <td width="10%" style="text-align: center;">{{$invoice->assign_student->year->name}}</td>
                    </tr>
                  </tbody>
                </table>
               
                <table width="100%" class="table table-bordered table-sm" style="margin-bottom: 15px;" border="1" style="margin-top:8px">
                  <thead>
                    <tr {{-- style="background-color: #001f3f;color: white" --}}>
                      <th>SL.</th>
                      <th class="text-center">Invoice ID</th>
                      <th>Fee Category</th>
                      <th style="text-align: right;">Amount</th>
                      <th style="text-align: right;">Subtotal</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                   @endphp
                   @foreach($invoice['invoicedetails'] as $key => $invoicedetail)
                  
                    <tr>
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{ $invoicedetail->invoice_id }}</td>
                      <td>{{$invoicedetail['feecategory']['cat_name']}}</td>
                      <td style="text-align: right;">{{ $invoicedetail->amount }}</td>
                      
                      <td style="text-align: right;">{{$invoicedetail->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $invoicedetail->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="4">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                     <tr>
                      <th style="text-align: right;" colspan="4">Discount Amount</th>
                      @if($invoice->payment->discount_amount == null)
                      <td style="text-align: right;">0.00</td>
                      @else
                      <td style="text-align: right;">{{$invoice['payment']['discount_amount']}}</td>
                      @endif
                    </tr>
                     @php
                   $total_amount = $total_sum - $invoice['payment']['discount_amount'];
                   @endphp
                     <tr>
                      <th style="text-align: right;" colspan="4">Total Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['total_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="4">Paid Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="4">Due Amount</th>
                      <td style="text-align: right;">{{$invoice['payment']['due_amount']}}</td>
                    </tr>
                  </tbody>
                </table>
                <i style="text-align: left;font-size: 12px;padding-top: -20px;">Print Date : {{date("d-M-Y h:i:s a")}}</i>

    <div>
       <hr style="border:solid 1px;width: 22%;color: #000;text-align: right;">
      <p style="text-align: right;margin-top: -7px;margin-right: 35px;">Accoutant</p>
    </div>
</body>
</html>