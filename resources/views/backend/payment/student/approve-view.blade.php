@extends('backend.layouts.master') 
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">View Invoice Details</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
       <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
           
           <div class="card">
              <div class="card-header" style="background-color: #605ca8;color: white;padding: 5px">
                <h5>Invoice No :<strong> {{$invoice->id}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Student Name :<strong> {{$invoice['payment']['user']['name']}} </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Date: <strong>{{date('d-m-Y',strtotime($invoice->invoice_date))}}</strong>
                  <a  href="{{route('payments.student.pendinglist')}}" class="btn btn-warning  float-right"><i class="fa fa-list"><strong style="font-size: 18px"> Invoice Pending List</strong></i></a>
               
               
                </h5>
              </div> 
            <div class="card-body">
                                   {{--  @php
                                     $payment = App\Model\StudentPayment::where('invoice_id',$invoice->id)->first();
                                    @endphp --}}
                <table width="100%" class="table table-bordered table-sm" >
                  <tbody>
                    <tr>

                      <th colspan="5" class="text-center" style="font-size: 20px"><h2>Student Information</h2></th></tr>
                   <tr style="background-color: #001f3f;color: white">
                      <th width="15%" class="text-center">Student ID</th>
                      <th width="15%">Student Name</th>
                      <th width="15%">Father Name</th>
                      <th width="13%">Mobile</th>
                      <th width="40%">Address</th>
                     {{--  <th width="40%">Address</th> --}}
                    </tr>
                     <tr>
                      <td width="17%"class="text-center">{{$invoice['payment']['user']['id_no']}}</td>
                      <td width="17%">{{$invoice['payment']['user']['name']}}</td>
                      <td width="17%">{{$invoice['payment']['user']['fname']}}</td>
                      <td width="13%">{{$invoice['payment']['user']['mobile']}}</td>
                      <td width="36%">{{$invoice['payment']['user']['address']}}</td>
                      {{-- <td width="36%">{{$invoice['user']['class']['name']}}</td> --}}
                    </tr>
                  </tbody>
                </table>
                <br>
               <form method="post" action="{{route('payments.student.approvestore',$invoice->id)}}">
                @csrf
                 <table width="100%" class="table table-bordered table-sm" style="margin-bottom: 15px;">
                  <thead>
                    <tr style="background-color: #001f3f;color: white">
                      <th>SL.</th>
                      <th class="text-center">Invoice ID</th>
                      <th>Fee Category</th>
                      <th class="text-right">Amount</th>
                      <th class="text-right">Subtotal</th>
                    </tr> 
                  </thead>
                  <tbody>
                     @php
                   $total_sum = '0';
                   @endphp
                   @foreach($invoice['invoicedetails'] as $key => $invoicedetail)
                  
                    <tr>
                      {{-- <input type="hidden" name="student_id" value="{{$invoicedetail->invoice->student_id}}">
                      <input type="hidden" name="total_amount[{{$invoicedetail->invoice->id}}]" value="{{$invoicedetail->invoice->total_amount}}"> --}}

                    {{-- <input type="hidden" name="student_id" value="{{$invoicedetail->student_id}}">
                      <input type="hidden" name="total_amount[{{$invoicedetail->id}}]" value="{{$invoicedetail->total_amount}}"> --}}

                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{ $invoicedetail->invoice_id }}</td>
                      <td>{{$invoicedetail['feecategory']['cat_name']}}</td>
                      <td class="text-right">{{ $invoicedetail->amount }}</td>
                      
                      <td class="text-right">{{$invoicedetail->selling_price}}</td>
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
                      <td style="text-align: right;background-color: #D8FDBA">{{$invoice['payment']['total_amount']}}</td>
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
                <button id="approve" type="submit" class="btn btn-danger btn-block font-weight-bold float-right">Invoice Approve Store</button>
               </form>
                
                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <!-- modal -->


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div style="background: gray" class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover table-sm">
                <tr>
                  <th width="50%">Invoice ID</th>
                  <td width="50%">gfgf</td>
                </tr>
              </table>
            </div>
            <div style="background: gray" class="modal-footer float-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  @endsection