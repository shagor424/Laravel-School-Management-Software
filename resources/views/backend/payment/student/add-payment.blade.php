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
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Payment</li>
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

          <section class="col-md-12 offset-md-0">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">Add Student Payment
                  <a  href="{{route('payments.student.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Payment List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:#E6E6E6">
  
   <div class="row"> 
  <div class="col-md-2">
    <div class="form-group"> 
        <label for="payment_date" class="col-sm-12 control-label">Payment Date <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
             <input type="text" name="payment_date" class="form-control datepicker" value="{{ $date }}"   placeholder="YYYY-MM-DD" data-validation="requierd"   id="payment_date">
            @error('payment_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         <div class="col-md-2">
   <div class="form-group">
        <label for="invoice_no" class="col-sm-12 control-label"> Invoice No <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-md-4">
          <input type="text"  name="invoice_no" class="form-control text-center" value="{{$invoice_no}}" id="invoice_no" data-validation="requierd" readonly style="background-color:  #d3de23 ">
          @error('invoice_no')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

     

     <div class="col-md-2">
    <div class="form-group"> 
        <label for="model" class="col-sm-12 control-label">Student Name </label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="model" class="form-control text-center" value="{{old('model')}}" id="model" ata-validation="requierd" readonly  style="background-color: #D8FDBA" >
            @error('model')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
       
   
  <div class="col-md-2">
   <div class="form-group">
        <label for="student_id" class="col-sm-12 control-label"> Student ID <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <select  name="student_id" class="form-control select2bs4" id="student_id">
          <option value="">Select Student</option>
                @foreach($students as $student)
                <option value="{{$student->id}}">{{$student->id_no}}--{{$student->name}}</option>
                @endforeach
            </select>
          @error('student_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
    
   
   <div class="col-md-2">
    <div class="form-group"> 
        <label for="fname" class="col-sm-12 control-label">Father Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="fname" class="form-control text-center" value="{{old('fname')}}" id="fname"   style="background-color: #D8FDBA" >
            @error('fname')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
  

 <div class="col-md-2">
    <div class="form-group">
        <label for="feecat_id" class="col-sm-12 control-label">Fee Category <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
            <select name="feecat_id" class="form-control select2bs4" id="feecat_id">
                <option value="">Select Fee Category</option>
                @foreach($feecats as $feecat)
                <option value="{{$feecat->id}}">{{$feecat->name}}</option>
                @endforeach
            </select>
            @error('feecat_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

 
<div class="col-md-2">
      <div class="form-group"> 
        <label for="mname" class="col-sm-12 control-label">Mother Name</label>
      </div>
    </div>
        <div class="col-sm-4">
           <input type="text" name="mname" class="form-control text-center" value="{{old('mname')}}" id="mname"  readonly  style="background-color: #D8FDBA" >
            @error('mname')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
   
 
   <div class="col-md-2">
    <div class="form-group"> 
        <label for="mobile" class="col-sm-12 control-label">Student Mobile <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="mobile" class="form-control text-center" value="{{old('mobile')}}" id="mobile"    style="background-color: #D8FDBA" >
            @error('mobile')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>
 

    
        <div class="col-sm-12">
            <a style="font-size: 14px;font-weight: bold;margin: 0;width: 150px"class="btn btn-danger btn-block float-right"><i  style="font-size: 30px;color: white" class="fa fa-plus-circle addeventmore"> <strong style="color: white;font-size: 16px;margin: 0">Add More</strong></i></a>
        </div></i>
      
         </div>
</div>

<!-- Strat Card Body 2 -->

<div class="card-body"> 
  <form method="POST" action="{{route('payments.student.store')}}" class="form-horizontal"enctype="multipart/form-data" id="myform">
    @csrf
    <table class="table table-bordered table-sm" width="100%">
      <thead>
        <tr style="background-color: #001f3f;color: white">
          <th width="30%">Name</th>
          <th width="18%">Father Name</th>
          <th width="10%">Mobile</th>
          <th width="5%" class="text-center">Time</th>
          <th width="11%" class="text-center">Amount</th>
          <th width="11%">SubTotal</th>
          <th width="6%">Action</th>
        </tr>
      </thead>
      <tbody id="addrow" class="addrow">
        
      </tbody>
      <tbody>
        <tr>
          <td colspan="5">Discount</td>
          <td class="text-right"><input type="text" name="discount_amount" id="discount_amount" class="form-control form-control-sm discount_amount text-right" placeholder="Enter Discount Amount"></td>
        </tr>
        <tr>
          <td colspan="2"></td>
         
          <td></td>
          <td></td>
          <td></td>
           <td>
            <input type="text" name="estimated_amount" value="0" id="estimated_amount" class="form-control form-control-sm text-right estimated_amount" readonly="" style="background-color: #D8FDBA">
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
<br>
 <!-- <div class="form-row">
    <div class="form-group col-md-12">
      <textarea class="form-control" name="description" id="description" placeholder="Write Here Your Description"></textarea>
    </div>
  </div>-->

  <div class="form-row">
    <div class="form-group col-md-3">
      <select class="form-control form-control-sm select2bs4" name="paid_status" id="paid_status">
        <option value="">Select Paid Status</option>
        <option value="full_paid">Full Paid</option>
        <option value="full_due">Full Due</option>
        <option value="some_paid">Some Paid</option>
      </select>
      <input type="text" name="paid_amount" class="form-control form-control-sm  paid_amount" id="paid_amount" placeholder="Enter Paid Amount" style="display: none">
    </div>

    {{--  <div class="form-group col-md-9">
      <select class="form-control form-control-sm select2bs4" name="student_id" id="student_id">
        <option value="">Select Student</option>
        @foreach($students as $student)
        <option value="{{ $student->id }}">{{ $student->id_no }}--- {{ $student->name }} ---{{ $student->mobile }}</option>
        @endforeach
        <option value="0">New Customer</option>
      </select>
    </div> --}}
  </div>

  {{-- <div class="form-row new_customer" style="display: none">

     <div class="form-group col-sm-3">
      <input type="text" name="shop_name" id="shop_name" class="form-control form-control-sm" placeholder="Enter Shop Name">
    </div>

     <div class="form-group col-sm-3">
      <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Enter Customer Name">
    </div>
    
     <div class="form-group col-sm-3">
        <input type="text" name="mobile" id="mobile" class="form-control form-control-sm" placeholder="Enter Mobile">
    </div>
    <div class="form-group col-sm-3">
      <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Enter Address">
    </div>
  </div> --}}

    <div class="form-group">
        <div class="col-sm-12">
            <button style="font-size: 20px;font-weight: bold;" type="submit" class="btn btn-success btn-block pull-right" id="storebutton">Payment Submit</button>
        </div>
         </div>
      </form>
   </div>

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
<!-- store -->

<script type="text/x-handlebars-template" id="document-template">
<tr class="delete_add-more_item" id="delete_add-more_item">
    <input type="hidden" name="invoice_date" value="@{{invoice_date}}">
    <input type="hidden" name="invoice_no" value="@{{invoice_no}}">
    <input type="hidden" name="feecat_id" value="@{{feecat_id}}">
    
    

    <td>
         <input  type="hidden" name="student_id[]" value="@{{student_id}}">
         @{{name}}
      </td>
     <td>
         <input type="hidden" name="student_id[]" value="@{{fname}}">
         @{{fname}}

    </td>

      <td>
         <input type="hidden" name="student_id[]" value="@{{mobile}}">
         @{{mobile}}

    </td>
  
     <td>
         <input type="number" min="1" name="selling_quantity[]" value="1" class="form-control form-control-sm text-center selling_quantity">
    </td>
     <td>
         <input type="text"  name="amount[]"  class="form-control form-control-sm text-center amount">
    </td>

     <td>
         <input type="text" name="selling_price[]" value="0.00" class="form-control form-control-sm text-right selling_price">
    </td>
     <td class="float-center">
         <i class="btn btn-danger  btn-sm fa fa-window-close removeeventmore"></i>
    </td>
  </tr>
</script>
<!-- add purchase -->
<script type="text/javascript">
  $(document).ready(function () {
  $(document).on("click",".addeventmore", function (){
    var invoice_date = $('#invoice_date').val();
    var student_id = $('#student_id').val();
    var name = $('#student_id').find('option:selected').text();
    // var feecat_id = $('#feecat_id').val();
    // var feecat_name = $('#feecat_id').find('option:selected').text();
    var fname = $('#fname').val();
    var mobile = $('#mobile').val();



    $('.notifyjs-corner').html('');

 if(invoice_no == ''){
      $.notify("Invoice No Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
    if(invoice_date == ''){
      $.notify("Invoice Date Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }


 
     if(student_id == ''){
      $.notify("Student ID Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
     if(feecat_id == ''){
      $.notify("Fee Category Required",{globalPosition:'top right}',className:'error'});
      return false;
    }

     
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var data = {
        invoice_date:invoice_date,
        invoice_no:invoice_no,
        student_id:student_id,
        name:name,
        // feecat_id:feecat_id,
        // feecat_name:name,
        fname:fname,
        mobile:mobile,

        
      };
      var html = template(data);
      $('#addrow').append(html);
      

  });
  $(document).on("click",".removeeventmore",function(event){
    $(this).closest(".delete_add-more_item").remove();
    totalAmountPrice();
  });

   $(document).on('keyup click','.amount,.selling_quantity',function(){
    var amount = $(this).closest("tr").find("input.amount").val();
    var qty = $(this).closest("tr").find("input.selling_quantity").val();
    var total = amount * qty;
    $(this).closest("tr").find("input.selling_price").val(total);
    totalAmountPrice();
  });

  $(document).on('keyup','#discount_amount',function(){
    totalAmountPrice();
  });
    function totalAmountPrice(){
      var sum =0;
      $(".selling_price").each(function(){
        var value = $(this).val();
        if(!isNaN(value) && value.length != 0){
          sum += parseFloat(value);
        }
      });
      var discount_amount = parseFloat($('#discount_amount').val());
      if(!isNaN(discount_amount) && discount_amount.length != 0){
        sum -= parseFloat(discount_amount);
      }
      $('#estimated_amount').val(sum);
    }
});
</script>
  <!-- dropdown category -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#supplier_id',function(){
      var supplier_id =$('#supplier_id').val();

      $.ajax({
        url:"{{route('get-category')}}",
        type:"GET",
        data:{supplier_id:supplier_id},
        success:function(data){
          var html = '<option value="">Select Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.category_id+'">'+v.category.item_name+'</option>';
          });
          $('#category_id').html(html);
        }

      });
    });
  });
</script>

 <!-- dropdown sub category -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id =$('#category_id').val();

      $.ajax({
        url:"{{route('get-subcategory')}}",
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_category_id+'">'+v.subcategory.item_name+'</option>';
          });
          $('#sub_category_id').html(html);
        }

      });
    });
  });
</script>

 <!-- dropdown sub sub category -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_category_id',function(){
      var sub_category_id =$('#sub_category_id').val();

      $.ajax({
        url:"{{route('get-subsubcategory')}}",
        type:"GET",
        data:{sub_category_id:sub_category_id},
        success:function(data){
          var html = '<option value="">Select Sub Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_sub_category_id+'">'+v.subsubcategory.item_name+'</option>';
          });
          $('#sub_sub_category_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown brand -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_sub_category_id',function(){
      var sub_sub_category_id =$('#sub_sub_category_id').val();

      $.ajax({
        url:"{{route('get-brand')}}",
        type:"GET",
        data:{sub_sub_category_id:sub_sub_category_id},
        success:function(data){
          var html = '<option value="">Select Brand</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.brand_id+'">'+v.brand.item_name+'</option>';
          });
          $('#brand_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#brand_id',function(){
      var brand_id =$('#brand_id').val();

      $.ajax({
        url:"{{route('get-productname')}}",
        type:"GET",
        data:{brand_id:brand_id},
        success:function(data){
          var html = '<option value="">Select Product Name</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.id+'">'+v.product_name+'</option>';
          });
          $('#product_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown unit -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-unit')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#unit_id').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown model -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-model')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#model').val(data);
        }

      });
    });
  });
</script>
<!-- dropdown size -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-size')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
          $('#size').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown color -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-color')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#color').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown product code -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-product-code')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
         $('#product_code').val(data);
        
        }

      });
    });
  });
</script>


<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-warranty-time')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#warranty_time').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#product_id',function(){
      var product_id =$(this).val();

      $.ajax({
        url:"{{route('get-stock')}}",
        type:"GET",
        data:{product_id:product_id},
        success:function(data){
        $('#stock_quantity').val(data);
        }

      });
    });
  });
</script>

<!-- End dropdown  -->

<!-- paid status  -->
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
<!-- customer  -->
<script type="text/javascript">
  $(document).on('change','#customer_id', function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
      $('.new_customer').show();
    }else{
       $('.new_customer').hide();
    }
  });
</script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      selling_quantity: {
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
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },

       paid_status: {
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

 <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection
