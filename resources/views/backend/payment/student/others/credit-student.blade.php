@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Credit Or Due Student List</li>
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
                <h5>  Credit Or Due Student List
                  <a target="_blank"  href="{{route('payments.student.credit-pdf')}}" class="btn btn-warning  float-right "><i class="fa fa-download"> Credit Or Due Student Download</i></a>
                  <a  href="{{route('payments.student.paid')}}" class="btn btn-danger float-right mr-2"><i class="fa fa-list"> Paid List</i></a>
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>Invoice ID</th>
                    <th>Invoice No</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Mobile</th>
                    <th>Invoice Date</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Due Amount</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $key => $invoice)
                    <tr>
                <td style="text-align: center;">{{$key+1}}</td>
                <td style="text-align: center;">{{$invoice['invoice']['id']}}</td>
                <td style="text-align: center;">{{$invoice['invoice']['invoice_no']}}</td>
                <td>{{$invoice['user']['name']}}</td>
                <td>{{$invoice['user']['fname']}}</td>
                <td>{{$invoice['user']['mobile']}}</td>
                <td style="text-align: center;">{{date('d-m-y',strtotime($invoice['invoice']['invoice_date']))}}</td>
                <td style="text-align: center;">{{$invoice['total_amount']}}</td>
                <td style="text-align: center;">{{$invoice['paid_amount']}}</td>
               <td style="text-align: right;color: red;font-weight: bold;">{{$invoice['due_amount']}} </td> 
               
                      <td style="text-align: center;">
                          <a target="_blank" href="{{route('payments.student.invoice-edit',$invoice->invoice_id)}}" class="btn btn-success btn-xs"  title=" Update Invoice"> <i class="fa fa-edit"></i></a>
                           <a target="_blank" href="{{route('payments.student.idbypdf',$invoice->invoice_id)}}" class="btn btn-primary btn-xs"  title=" Print Invoice"> <i class="fa fa-print"></i></a>
                            
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


    
  @endsection