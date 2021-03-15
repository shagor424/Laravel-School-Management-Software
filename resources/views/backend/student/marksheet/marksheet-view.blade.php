@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div style="background-color: #A4A4A4" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 style="color:  #117a65"><strong>Manage  Mark Sheet</strong></h3>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Mark Sheet</li>
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
              <div style="background-color:  #f4d03f
;color: black" class="card-header">
                <h5 style="color:  black "><b>Mark Sheet</b>
                  
                </h5>
              </div> 
              <div class="card-body">
                <form method="get" action="{{route('marksheets.marksheet.get')}}" id="myform" target="_blank">
                 
                  <div class="form-row">

                     <div class="form-group col-md-3">
                    <label for="year_id">Session Year <font style="color: red">*</font></label>
                    <select name="year_id" id="year_id" class="form-control  form-control-sm select2bs4">
                      <option value="">Select Session Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}">{{$year->name}}</option>
                      @endforeach
                    </select>
                  </div>
                    
                    <div class="form-group col-md-3">
                    <label for="class_id">Clas Name <font style="color: red">*</font> </label>
                    <select name="class_id" id="class_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Class Name </option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>

                   <div class="form-group col-md-3">
                    <label for="exam_type_id">Exam Type <font style="color: red">*</font> </label>
                    <select name="exam_type_id" id="exam_type_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Exam Type </option>
                      @foreach($exam_types as $exam)
                      <option value="{{$exam->id}}">{{$exam->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="id_no">Student ID <font style="color: red">*</font> </label>
                    <input type="text" name="id_no" id="id_no"class="form-control ">
                  </div>
               
                <div class="form-group col-md-12">
                   <button type="submit" class="btn btn-success float-right"> Student Search</button>
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

     
     class_id: {
        required: true,
        },

    year_id: {
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

  @endsection