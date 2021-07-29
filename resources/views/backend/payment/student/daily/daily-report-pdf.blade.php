<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Daily Wise Student Payment Report</title>
</head>
<body>

<div>
    <img src="{{ asset('public/upload/header-logo.jpg') }}" width="100%" style="height:75px">
</div>

<h2 style="text-align: center;">Daily Wise Student Payment Report</h2>
<h4 style="text-align: center;">Date : {{date('d-M-Y',strtotime($start_date))}} to {{date('d-M-Y',strtotime($end_date))}}</h4>
<table id="example1" class="table table-bordered table-sm" width="100%" border="1">
                  
                <thead>
                   <tr style="background-color: lightgreen;">
                    <th>SL</th>
                    <th>Invoice ID</th>
                    <th>Invoice Date</th>
                    <th width="15%">Student Name</th>
                    {{-- <th>Father Name</th> --}}
                    <th>Class Name</th>
                    <th>Group Name</th>
                    <th>Section Name</th>
                    <th>Session Year</th>
                    <th>Class Roll</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                     @php
                  $total_total_sum = '0';
                  $total_paid_sum = '0';
                  $total_due_sum = '0';
                  @endphp
                   @foreach($alldata as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->id}}</td>
                <td style="text-align: center;">{{date('d-m-y',strtotime($invoice->invoice_date))}}</td>
                <td>{{$invoice['payment']['user']['name']}}</td>
                {{-- <td style="text-align: center;">{{$invoice['payment']['user']['fname']}}</td> --}}

                <td style="text-align: center;">{{$invoice['payment']['assign_student']['student_class']['name']}}</td>
                <td style="text-align: center;">{{$invoice['payment']['assign_student']['group']['name']}}</td>
                <td style="text-align: center;">{{$invoice['payment']['assign_student']['section']['name']}}</td>
                <td style="text-align: center;">{{$invoice['payment']['assign_student']['year']['name']}}</td>
                <td style="text-align: center;">{{$invoice['payment']['assign_student']['class_roll']}}</td>
                <td style="text-align: right;">{{$invoice['payment']['total_amount']}}</td>
                <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
                <td style="text-align: right;">{{$invoice['payment']['due_amount']}}</td>
              </tr>

               @php
                $total_total_sum += $invoice['payment']['total_amount'];
                 $total_paid_sum += $invoice['payment']['paid_amount'];
                  $total_due_sum =+ $invoice['payment']['due_amount'];
                @endphp
               @endforeach 
                  </tbody>
                    <tr>
                      <td colspan="9" align="right">Total Amount </td>
                      <td style="background-color: lightgreen;text-align: right;">{{$total_total_sum}}.00</td>
                      <td style="background-color: lightgreen;text-align: right;">{{$total_paid_sum}}.00</td>
                      <td style="background-color: red;text-align: right;">{{$total_due_sum}}.00</td>
                    </tr>
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
            <td  width="20%"></td>
            <td style="text-align: center;" width="45%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="35%">Headmaster/Principal Signature</td>
          </tr>
        </table>

</body>
</html>
        <!-- Small boxes (Stat box) --> 
      
        <!-- /.row -->
        <!-- Main row -->
        