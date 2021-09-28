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
              <li class="breadcrumb-item active">Edit Student Invoice</li>
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
                <h5>Invoice No :<strong> {{$payment['invoice']['invoice_no']}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Customer Name :<strong> {{$payment['user']['name']}} </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Invoice Date: <strong>{{date('d-m-Y',strtotime($payment['invoice']['invoice_date']))}}</strong>
                  <a  href="{{route('payments.student.credit')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"><strong style="font-size: 18px"> Student Credit List</strong></i></a>
               
               
                </h5>
              </div> 
            <div class="card-body">
                                    
                <table width="100%" class="table table-bordered table-sm" >
                  <tbody>
                   <tr style="background-color: #b382dd;">
                      <th colspan="8" class="text-center" style="font-size: 20px"><h5>Student Information</h5></th>
                    </tr>
                    <tr {{-- style="background-color: #001f3f;color: white" --}}>
                      <th width="15%" class="text-center">Student ID</th>
                      <th width="20%">Student Name</th>
                      <th width="20%">Father Name</th>
                      <th width="10%">Class</th>
                      <th width="10%">Group</th>
                      <th width="10%">Section</th>
                      <th width="10%">Session</th>
                      <th width="10%">Roll</th>
                    </tr>
                     <tr>
                      <td width="10%"class="text-center">{{$payment['user']['id_no']}}</td>
                      <td width="20%">{{$payment->user->name}}</td>
                      <td width="20%">{{$payment->user->fname}}</td>
                      <td width="10%">{{$payment->assign_student->student_class->name}}</td>
                      <td width="10%">{{$payment->assign_student->group->name}}</td>
                      <td width="10%">{{$payment->assign_student->section->name}}</td>
                      <td width="10%">{{$payment->assign_student->year->name}}</td>
                      <td width="10%" class="text-center">{{$payment->assign_student->class_roll}}</td>
                    </tr>
                  </tbody>
                </table>
                <br>
               <form method="post" action="{{route('payments.student.invoice-update',$payment->invoice_id)}}" id="myform">
                @csrf
                 <table width="100%" class="table table-bordered table-sm" style="margin-bottom: 15px;">
                  <thead>
                    <tr>
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
                   @foreach($invoicedetails as $key => $details)
                  
                    <tr>
                      <td style="text-align: center;">{{$key+1}}</td>
                      <td style="text-align: center;">{{ $details->invoice_id }}</td>
                      <td>{{$details['feecategory']['cat_name']}}</td>
                      <td class="text-right">{{ $details->amount }}</td>
                      
                      <td class="text-right">{{$details->selling_price}}</td>
                    </tr>

                   @php
                   $total_sum += $details->selling_price;
                   @endphp
                    @endforeach
                    <tr>
                      <th style="text-align: right;" colspan="4">Grand Total</th>
                      <td style="text-align: right;">{{$total_sum}}.00</td>
                    </tr>
                     <tr>
                      <th style="text-align: right;" colspan="4">Discount Amount</th>
                      @if($payment->discount_amount == null)
                      <td style="text-align: right;">0.00</td>
                      @else
                      <td style="text-align: right;">{{$payment->discount_amount}}</td>
                      @endif
                    </tr>
                     @php
                   $total_amount = $total_sum - $payment->discount_amount;
                   @endphp
                     <tr>
                      <th style="text-align: right;" colspan="4">Total Amount</th>
                      <td style="text-align: right;">{{$payment->total_amount}}</td>
                    </tr>
                    <tr>
                      <th style="text-align: right;" colspan="4">Paid Amount</th>
                      <td style="text-align: right;">{{$payment->paid_amount}}</td>
                    </tr>
                    <tr>
                      <input type="hidden" name="new_paid_amount" value="{{$payment->due_amount}}">
                      <th style="text-align: right;" colspan="4">Due Amount</th>
                      <td style="text-align: right;">{{$payment->due_amount}}</td>
                    </tr>
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-md-2">
                   <div class="form-group"> 
                    <label for="payment_date" class="col-sm-12 control-label">Payment Date <span class="text-danger">*</span></label>
                  </div>
                </div>
        <div class="col-sm-3">
             <input type="text" name="payment_date" class="form-control"  id="datepicker" placeholder="YYYY-MM-DD" data-validation="requierd"  id="payment_date" readonly="">
           
        </div>
                  <div class="form-group col-md-3">
                    <select class="form-control form-control-sm select2bs4" name="paid_status" id="paid_status">
                      <option value="">Select Paid Status</option>
                      <option value="full_paid">Full Paid</option>
                      <option value="some_paid">Some Paid</option>
                    </select>
                  </div>
                    <div class="col-md-3">
                    <input type="text" name="paid_amount" class="form-control form-control  paid_amount" id="paid_amount" placeholder="Enter Paid Amount" style="display: none;background-color: lightgreen">
                    </div>
                    
                  </div>
                </div>
                <button type="submit" class="btn btn-danger float-right">Invoice Payment Update</button>
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

<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
    

      <script type="text/javascript">
  $(document).on('change','#paid_status', function(){
    var paid_status = $(this).val();
    if(paid_status == 'some_paid'){
      $('.paid_amount').show();
    }else{
       $('.paid_amount').hide();
    }
  });
</script>
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      paid_status: {
      required: true,
        
      },

      category_id: {
      required: true,
        
      },
     
      selling_price: {
      required: true,
        
      },

      sell_price: {
      required: true,
        
      },
      unit_price: {
        required: true,
        
      },
      payment_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      warranty_time: {
        required: true,
        
      },
      unit_id: {
        required: true,
        
      },
       
      purchase_code: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
      },
      password: {
        required: true, 
        minlength: 6
      },
      cpassword: {
      required: true,
      equalTo:'#password'
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      },
      
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      cpassword: {
        
        equalTo:"Confirm password Does Not Match",
        }
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  @endsection