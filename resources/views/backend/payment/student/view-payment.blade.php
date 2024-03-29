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
              <li class="breadcrumb-item active">View Invoice Approved List</li>
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
           
           @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                   <button  type="button" style="margin-top: -30px;color:white" class="close text-white" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
          @endif
          <div class="panel"style="background:white;padding-bottom:5px ;border-bottom: 3px solid #7e3796;">
              <div class="panel-header" style="background-color: #7e3796;color: white;padding: 10px">
                <h5>  Invoice Approve List
                  <a   href="{{route('payments.student.add')}}" class="btn btn-warning float-right "><i class="fa fa-plus-circle"> Add Invoice</i></a>
                  <a  href="{{route('payments.student.pendinglist')}}" class="btn btn-danger  float-right mr-2"><i class="fa fa-list"> Invoice Pending List</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table  table-hover table-sm">
                  <thead>
                  <tr style="background-color: #b382dd;">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Invoice No</th>
                    <th>Student Name</th>
                    <th>Invoice Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody> 
                    @foreach($data as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice->id}}</td>
                <td style="text-align: center;">{{$invoice->invoice_no}}</td>
                <td>{{$invoice['payment']['user']['name']}}</td>
                <td style="text-align: center;">{{date('d-m-Y',strtotime($invoice->invoice_date))}}</td>
                <td style="text-align: right;">{{$invoice['payment']['total_amount']}}</td>
                <td style="text-align: right;">{{$invoice['payment']['paid_amount']}}</td>
                <td style="text-align: right;">{{$invoice['payment']['due_amount']}}</td>
                <td style="text-align: right;">
                     @if($invoice->status==1)
                    <span style="padding: 8px" class="badge badge-success">Approved</span>
                    @else
                    <span style="padding: 8px" class="badge badge-danger">Pending</span>
                    @endif
                  </td>
                      <td style="text-align: center;"> 
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewinvoice-{{ $invoice->id }}"><i class="fa fa-eye"></i>
                            </button>
                           <a href="{{route('payments.student.idbypdf',$invoice->id)}}" target="_blank" class="btn btn-warning btn-sm"  title="Show All Data"> <i class="fa fa-print"></i></a>
                            @if($invoice->status==0)
                          <a href="{{route('payments.student.delete',$invoice->id)}}" class="btn btn-danger btn-sm" id="delete" style="Delete Data"> <i class="fa fa-trash"></i></a>
                          @endif
                      </td> 
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
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

@foreach($data as $key => $invoice)
    <div class="modal fade" id="viewinvoice-{{ $invoice->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info" {{-- style="background-color: #605ca8;color: white;" --}}>
              <h6>Invoice No :<strong> {{$invoice->id}}</strong> &nbsp;Student Name :<strong> {{$invoice['user']['name']}} </strong> &nbsp;&nbsp;&nbspStudent ID :<strong> {{$invoice['user']['id_no']}} </strong>&nbsp;&nbsp;Invoice Date: <strong>{{date('d-m-Y',strtotime($invoice->invoice_date))}}</strong>
                </h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
               <table width="100%" class="table table-bordered table-sm" >
                  <tbody>
                    <tr>

                      <th colspan="8" class="text-center" style="font-size: 20px"><h2>Student Information</h2></th></tr>
                  <tr {{-- style="background-color: #001f3f;color: white" --}}>
                      <th width="15%" class="text-center">Student ID</th>
                      <th width="20%">Student Name</th>
                      <th width="20%">Father Name</th>
                      <th width="10%" class="text-center">Class</th>
                      <th width="10%" class="text-center">Group</th>
                      <th width="10%" class="text-center">Section</th>
                      <th width="10%" class="text-center">Session</th>
                      <th width="10%" class="text-center">Roll</th>
                    </tr>
                     <tr>
                      <td width="10%"class="text-center">{{$invoice['user']['id_no']}}</td>
                      <td width="20%">{{$invoice->user->name}}</td>
                      <td width="20%">{{$invoice['user']['fname']}}</td>
                      <td width="10%" class="text-center">{{$invoice->assign_student->student_class->name}}</td>
                      <td width="10%" class="text-center">{{$invoice->assign_student->group->name}}</td>
                      <td width="10%" class="text-center">{{$invoice->assign_student->section->name}}</td>
                      <td width="10%" class="text-center">{{$invoice->assign_student->year->name}}</td>
                      <td width="10%" class="text-center">{{$invoice->assign_student->class_roll}}</td>
                    </tr>
                  </tbody>
                </table>
                {{-- <br> --}}
                <table width="100%" class="table table-bordered table-sm" style="margin-bottom: 15px;">
                  <thead>
                    <tr {{-- style="background-color: #001f3f;color: white --}}">
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
            </div>
            <div class="modal-footer" {{-- style="background-color: #605ca8;color: white;" --}}>
              <button type="button" class="btn btn-danger btn sm" data-dismiss="modal">Close</button>
             
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      @endforeach
  @endsection