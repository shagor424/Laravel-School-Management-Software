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
              Edit Grade Point
              @else
              Add Grade Point
              @endif


          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Grade Point</li>
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
                <h5 ><b>
                   @if(isset($editdata))
              Edit Grade Point
              @else
              Add Grade Point
              @endif
                  <a  href="{{route('marksex.grade.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Grade Point List</i></a>
               </b> </h5>
              </div> 
            
                
              <form method="post" action="{{(@$editdata)?route('marksex.grade.update',$editdata->id):route('marksex.grade.store')}}" id="myform">
                @csrf
                 <div class="card-body">
                   <div class="form-row">
                     <div class="form-group col-md-6">
                       <label>Grade</label>
                       <input type="text" name="grade" value="{{@$editdata->grade}}" class="form-control">
                     </div>
                     <div class="form-group col-md-6">
                       <label>Grade Point</label>
                       <input type="text" name="grade_point" value="{{@$editdata->grade_point}}" class="form-control">
                     </div>
                     <div class="form-group col-md-6">
                       <label>Start Marks</label>
                       <input type="text" name="start_marks" value="{{@$editdata->start_marks}}" class="form-control">
                     </div>
                     <div class="form-group col-md-6">
                       <label>End Marks</label>
                       <input type="text" name="end_marks" value="{{@$editdata->end_marks}}" class="form-control">
                     </div>
                      <div class="form-group col-md-6">
                       <label>Start Point</label>
                       <input type="text" name="start_point" value="{{@$editdata->start_point}}" class="form-control">
                     </div>
                     <div class="form-group col-md-6">
                       <label>End Point</label>
                       <input type="text" name="end_point" value="{{@$editdata->end_point}}" class="form-control">
                     </div>
                     <div class="form-group col-md-6">
                       <label>Remarks</label>
                       <input type="text" name="remarks" value="{{@$editdata->remarks}}" class="form-control">
                     </div>
                     <div class="form-group col-md-6" style="padding-top: 30px">
                       <button type="submit"class="btn btn-success">{{(@$editdata->remarks)?'Grade Point Update' : 'Add Grade Point'}}</button>
                     </div>
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

     
      grade: {
        required: true,
        },

     grade_point: {
        required: true,
        },
     start_marks: {
        required: true,
        
     
         },
     end_marks: {
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