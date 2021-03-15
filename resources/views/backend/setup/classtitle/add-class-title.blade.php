@extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Edit Class Title
              @else
              Add Class Title
              @endif


          </b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Class Title</li>
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
              <div class="card-header">
                <h5 style="color:   #008B8B"><b>
                   @if(isset($editdata))
              Edit Class Title
              @else
              Add Class Title
              @endif
                  <a  href="{{route('setups.student.classtitle.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> Class Title List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{(@$editdata)?route('setups.student.classtitle.update',$editdata->id):route('setups.student.classtitle.store')}}" id="myform">
                @csrf
                <div class="form-row">
                  

                  <div class="form-group col-md-4">
                    <label style="color: #C71585">Class Title</label>
                    <input  type="text" name="name" id="name"value="{{@$editdata->name}}" class="form-control" placeholder="Enter Class Title" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font>
                  </div>

                  

              
                 
               <div class="form-group col-md-6" style="padding-top: 30px">
                    
    
    <button type="submit"class="btn btn-primary">{{(@$editdata)?'Update Class Title':'Add Class Title'}}</button>

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

     
      name: {
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