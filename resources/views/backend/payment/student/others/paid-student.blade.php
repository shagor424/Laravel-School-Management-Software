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
              <li class="breadcrumb-item active">Paid Student List</li>
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
                <h5> Paid List
                  <a target="_blank"  href="{{route('payments.student.credit-pdf')}}" class="btn btn-warning  float-right"><i class="fa fa-download"> Paid Student Download</i></a>
                  <a  href="{{route('payments.student.credit')}}" class="btn btn-danger float-right mr-2"><i class="fa fa-list"> Credit List</i></a>
                  
               
                </h5>
              </div> 
            <div class="card-body">
                 <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                  <tr style="background-color: #b382dd;">
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
                          
                           
                            {{-- <a href="{{route('payments.student.approveview',$invoice->student_id)}}" class="btn btn-primary btn-xs"  title="Edit Invoice"> <i class="fa fa-print"></i></a> --}}
                           <a target="_blank" href="{{route('payments.student.idbypdf',$invoice->invoice_id)}}" class="btn btn-primary btn-xs"  title="Print Invoice"> <i class="fa fa-print"></i></a>
                            
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