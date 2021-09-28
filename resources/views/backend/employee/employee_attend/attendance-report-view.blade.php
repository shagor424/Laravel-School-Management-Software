 @extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div  class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h3 style="color:  #117a65"><strong>Manage Stuff Attendance</strong></h3> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Stuff Attendance</li>
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
                <h5 ><b>Stuff Attendance</b>
                  
                </h5>
              </div> 
              <div class="card-body">
                <form method="get" action="{{route('stuffattendances.attendance.get')}}" id="myform" target="_blank">
                 
                  <div class="form-row">

                     <div class="form-group col-md-4">
                    <label for="employee_id">Empolyee Name <font style="color: red">*</font></label>
                    <select name="employee_id" id="employee_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Employee Name</option>
                      @foreach($employees as $employee)
                      <option value="{{$employee->id}}">{{$employee->name}}</option>
                      @endforeach
                    </select>
                  </div>
                    

                  <div class="form-group col-md-4">
                    <label for="id_no">Attendance Date <font style="color: red">*</font> </label>
                    <input type="text" class="datepicker" name="attend_date" id="attend_date"class="form-control form-control-sm" placeholder="yyyy-mm-dd">
                  </div>
               
                <div class="form-group col-md-4" style="padding-top: 30px">
                   <button type="submit" class="btn btn-success float-left"> Employee Search</button>
                  </div>
                </form>
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

    attend_date: {
        required: true,
        },
     exam_type_id: {
        required: true,
        
     
         },
     id_no: {
        required: true,
        
     
         },
     start_point: {
        required: true,
        
     
         },
     end_point: {
        required: true,
        
     },
     remarks: {
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
<script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

  @endsection