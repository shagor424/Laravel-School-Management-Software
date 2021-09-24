<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title>Individual Student All Invoice Repoet</title>
  </head>
  <body>
 <div>
    <img src="{{ asset('public/upload/header-logo.jpg') }}" width="100%" style="height:75px">
</div>
        
        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>Individual Student All Invoice Repoet</i></u></div>
           <br>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
           
            <div class="card-body">
                                   
                <table width="100%" class="table table-bordered table-sm" border="1" > 
                  <tr style="background-color:lightgreen">
                      <th width="15%" class="text-center">Student ID</th>
                      <th width="20%">Student Name</th>
                      <th width="20%">Father Name</th>
                      <th width="10%" style="text-align:center;">Class</th>
                      <th width="10%" style="text-align:center;">Group</th>
                      <th width="10%" style="text-align:center;">Section</th>
                      <th width="13%" style="text-align:center;">Session</th> 
                      <th width="10%" style="text-align:center;">Roll</th>
                    </tr>
                     <tr><td>{{ $payment['0']['user']['id_no'] }}</td>
                     <td>{{ $payment['0']['user']['name'] }}</td>
                     <td>{{ $payment['0']['user']['fname'] }}</td>
                     <td style="text-align:center;">{{ $payment['0']['assign_student']['student_class']['name'] }}</td>
                     <td style="text-align:center;">{{ $payment['0']['assign_student']['group']['name'] }}</td>
                     <td style="text-align:center;">{{ $payment['0']['assign_student']['section']['name'] }}</td>
                     <td style="text-align:center;">{{ $payment['0']['assign_student']['year']['name'] }}</td>
                     <td style="text-align:center;">{{ $payment['0']['assign_student']['class_roll'] }}</td>
                    </tr>

                </table>
                <br>
               
                 <table width="100%" border="1" class="table table-bordered table-sm" style="margin-bottom: 15px;padding-bottom: 0">
                  <thead>
                   <tr style="background-color:lightgreen">
                      <th>SL.</th>
                      <th class="text-center">Invoice ID</th>
                      <th class="text-center">Invoice Date</th>
                      <th>Fee Category</th>
                      <th style="text-align:right">Amount</th>
                      <th style="text-align:right">Subtotal</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                    
                   @endphp
                   @foreach($invoicedetails as $key => $details)
                   <tr>
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{ $details->invoice_id }}</td>
                       <td style="text-align: center;">{{ $details->invoice_date }}</td>
                      <td>{{$details['feecategory']['cat_name']}}</td>
                      <td style="text-align:right">{{ $details->amount }}</td>
                      
                      <td style="text-align:right">{{$details->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $details->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="5">Grand Total</th>
                      <td style="text-align: right;">{{$payment->sum('total_amount')}}.00</td>
                    </tr>
                     <tr>
                      <th style="text-align: right;" colspan="5">Total Discount</th>
                      <td style="text-align: right;">{{$payment->sum('discount_amount')}}.00</td>
                    </tr>
                    <!--  @php
                   $total_amount = $payment->sum('total_amount') - $payment->sum('discount_amount');
                   @endphp -->
                     <tr>
                      <th style="text-align: right;" colspan="5">Total Amount With Discount</th>
                      <td style="text-align: right;">{{$payment->sum('total_amount') - $payment->sum('discount_amount')}}.00</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="5">Paid Amount</th>
                      <td style="text-align: right;">{{$payment->sum('paid_amount')}}.00</td>
                    </tr>
                      <tr>
                      @php
                      $total =$payment->sum('total_amount') - $payment->sum('discount_amount');
                      $paid =$payment->sum('paid_amount');
                      @endphp
                      <th style="text-align: right;" colspan="5">Due Amount</th>
                      <td style="text-align: right;">{{ $total-$paid }}.00</td>
                    </tr>
                  </tbody>
                </table>

                 <table width="100%" border="1" class="table table-bordered table-sm" style="margin-bottom: 15px;padding-bottom: 0">

                  <tr style="height: 20px">
                    <th colspan="8" style="height: 20px;font-size: 18px;padding: 8px 0px">Invoice Wise Paid Student Payment Summary</th>
                  </tr>
                  <thead>
                  <tr style="background-color:lightgreen">
                    <th>SL</th>
                    <th>Invoice ID</th>
                    <th>Payment Date</th>
                    <th>Payment Status Type</th>
                    <th>Total Amount</th>
                    <th>Discount Amount</th>
                    <th>Payment Amount</th>
                    <th>Due Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php
                    $total_pay = '0';
                   $payment = App\Model\StudentPayment::where('student_id',$details->student_id)->get();
                   @endphp
                  @foreach($payment as $key => $dtl)
                  <tr>
                    <td style="text-align: center;">{{$key+1}}</td>
                    <td style="text-align: center;">{{$dtl->invoice_id}}</td>
                    <td style="text-align: center;">{{date('d-M-Y',strtotime($dtl->created_at))}}</td>
                    
                    <td style="text-align: center;">{{$dtl->paid_status}}</td>
                    <td style="text-align: right;">{{$dtl->total_amount}}</td>
                    <td style="text-align: right;">{{$dtl->discount_amount}}</td>
                    <td style="text-align: right;">{{$dtl->paid_amount}}</td>
                     <td style="text-align: right;">{{$dtl->due_amount}}</td>
                  </tr>
                    @php
                   $total_pay += $dtl->paid_amount;
                   @endphp
                  @endforeach
                   <tr>
                    <th colspan="4" >Total</th>
                    <td style="text-align: right;background-color: lightgreen">{{$payment->sum('total_amount')}}.00</td>
                    <td style="text-align: right;background-color: lightgreen">{{$payment->sum('discount_amount')}}.00</td>
                    <td style="text-align: right;background-color: lightgreen">{{$payment->sum('paid_amount')}}.00</td>
                    <td style="text-align: right;background-color: lightgreen">{{ $total-$paid }}.00</td>
                  </tr>

                  </tbody>
                </table>
                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 10px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td style="text-align: center;border-top: solid " width="25%">Student Signature</td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Accountant Signature</td>
          </tr>
        </table>
                

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
 
   
  </body>
</html>