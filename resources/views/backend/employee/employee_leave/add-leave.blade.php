@extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Edit Employee Leave
              @else
              Add Employee Leave
              @endif


          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Leave</li>
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
       <section class="col-md-12">
              <div class="card-header"style="background-color: #605ca8;color: white;padding: 5px">
                <h5 ><b>
                   @if(isset($editdata))
              Edit Employee Leave
              @else
              Add Employee Leave
              @endif
                  <a  href="{{route('employees.leave.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Employee Leave List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body" style="background-color:#E6E6E6">
                
              <form method="post" action="{{(@$editdata)?route('employees.leave.update',$editdata->id):route('employees.leave.store')}}" id="myform">
                @csrf
                <div class="form-row">
                  

                  <div class="form-group col-md-3">
                    <label>Employee Name <font style="color: red">*</font></label>
                    <select name="employee_id" id="employee_id" class="form-control select2bs4">
                      <option value="">Select Employee</option>
                      @foreach($employees as $employee)
                      <option value="{{$employee->id}}" {{(@$editdata->employee_id==$employee->id)?"selected":""}}>{{$employee->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label>Leave Start Date <font style="color: red">*</font></label>
                    <input  type="text" class="datepicker" name="start_date" id="start_date" value="{{@$editdata->start_date}}" class="form-control" placeholder="yyyy-mm-dd">
                    
                  </div>

                   <div class="form-group col-md-3">
                    <label>Leave End Date <font style="color: red">*</font></label>
                    <input  type="text" class="datepicker2" name="end_date" id="end_date"value="{{@$editdata->end_date}}" class="form-control" placeholder="yyyy-mm-dd">
                    
                  </div>
                  <div class="form-group col-md-3">
                    <label>Leave Purpose <font style="color: red">*</font></label>
                    <select name="leave_purpose_id" id="leave_purpose_id" class="form-control select2bs4">
                      <option value="">Select Leave Purpose</option>
                      @foreach($leave_purpose as $purpose)
                      <option value="{{$purpose->id}}" {{(@$editdata->leave_purpose_id==$purpose->id)?"selected":""}}>{{$purpose->name}}</option>
                      @endforeach
                      <option value="0">New Purpose</option>
                    </select>
                    <input type="text" name="name" class="form-control" placeholder="Write Purpose" id="add-others" style="display: none;">
                  </div>

              
                 
      <div class="form-group col-md-12">            
    
    <button type="submit"class="btn btn-primary float-right" class="btn btn-block">{{(@$editdata)?'Update Employee Leave':'Add Employee Leave'}}</button>

                  </div>
                </div> 
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
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

     
      employee_id: {
        required: true,
        },

     leave_purpose_id: {
        required: true,
        
     
          },

     start_date: {
        required: true,
        
      },

     end_date: {
        required: true,
        
     
        
      
       
      }
    },
    messages: {
     

      name: {
        required: "Please Enter Class Name",
        
      },
      
      
     
   
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

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#leave_purpose_id',function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id == '0'){
        $('#add-others').show();
      }
         else{

          $('#add-others').hide();

      }


    });

  });
</script>
<script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

    <script>
        $('.datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection