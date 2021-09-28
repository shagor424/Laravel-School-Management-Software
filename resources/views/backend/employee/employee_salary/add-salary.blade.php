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
              Edit Salary Increment
              @else
              Add Salary Increment
              @endif
 

          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Salary Increment</li>
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
           
            <tr style="background-color: #b382dd;">
                <h5 ><b>
                   @if(isset($editdata))
              Edit Salary Increment
              @else
              Add Salary Increment
              @endif
                  <a  href="{{route('employees.salary.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Salary Increment List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{route('employees.salary.store',$editdata->id)}}" id="myform"enctype="multipart/form-data">
                @csrf
                
                <div class="form-row">

                  <div class="form-group col-md-4">
                    <label> Increment Salray <font style="color: red">*</font></label>
                    <input  type="text" name="increment_salary" id="increment_salary"class="form-control" placeholder="Enter Increment Salary">
                    
                  </div>

                  <div class="form-group col-md-4">
                    <label>Effected Date  <font style="color: red">*</font></label>
                    <input  type="date" name="effected_date" id="effected_date" class="form-control singledatepicker" placeholder="Date">
                   
                  </div>
                  <div class="form-group col-md-4" style="padding-top: 30px">
                  <button type="submit"class="btn btn-block bg-gradient-info float-right">Submit</button>
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
  <!-- /.content-wrapper -->
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {


        
 effected_date: {
        required: true,
        },


  increment_salary: {
        required: true,
        


    


      }
    },
    messages: {
     

      name: {
        required: "Please Enter Class Name",
        
      },

       fname: {
        required: "Please Enter Class Name",
        
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