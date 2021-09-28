@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Student Class</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Class</li>
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
                <h5><b>Student Class List</b>
                 <button type="button" class="btn btn-warning float-right btn" data-toggle="modal" data-target="#addClass"><i class="fa fa-plus-circle"></i> Add Class</button>
                </h5>
              </div> 
            <div class="card-body" style="margin:15px;">
                <table id="example1" class="table  table-hover table-sm">
                  <thead>
                   <tr style="background-color: #b382dd;">
                    <th>SL</th>
                    <th>Class ID</th>
                    <th>Class Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $value)
                    <tr class="{{$value->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$value->id}}</td>
                     
                      <td>{{$value->name}}</td>
                     
                  
                      <td>
                    <button type="button" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#editClass-{{ $value->id }}"><i class="fa fa-edit"></i> </button>

                    <a title="Delete" id="delete" href="{{route('setups.student.class.delete',$value->id)}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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


  {{-- Add Class --}}

  <div class="modal fade" id="addClass" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #7e3796 ;">
            <div class="modal-header " style="background-color: #7e3796;color: white;padding: 10px">
              <h4 class="modal-title"> 
              Add Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('setups.student.class.store')}}" id="myform">
                @csrf

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label > Class Name</label>
                  </div>
                  <div class="form-group col-md-9">
                    <input  type="text" name="name" id="name" class="form-control" placeholder="Enter Class  Name" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font>
                  </div>
                </div>
              <div class="modal-footer col-md-12">
                 <button type="button" class="btn btn-danger pull-right"  data-dismiss="modal">Close</button>
               <button type="submit"class="btn btn-primary">Add Class</button>
            </div>

            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>


@foreach($alldata as $value)
 {{-- Add Class --}}

  <div class="modal fade" id="editClass-{{ $value->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #7e3796 ;">
            <div class="modal-header " style="background-color: #7e3796;color: white;padding: 10px">
              <h4 class="modal-title"> 
              Edit Class</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('setups.student.class.update',$value->id)}}" id="myforma">
                @csrf

                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label > Class Name</label>
                  </div>
                  <div class="form-group col-md-9">
                    <input  type="text" name="name" id="name2" value="{{$value->name}}" class="form-control" placeholder="Enter Class  Name" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('name')?($errors->first('name')):''}}</font>
                  </div>
                </div>
              <div class="modal-footer col-md-12">
                 <button type="button" class="btn btn-danger pull-right"  data-dismiss="modal">Close</button>
               <button type="submit"class="btn btn-primary">Update Class</button>
            </div>

            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>

@endforeach

<script>
$(function () {
  
  $('#myform').validate({
    rules: {

     
      name: {
        required: true,
        
     
        
      },

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
<script>
$(function () {
  
  $('#myforma').validate({
    rules: {

     
      name: {
        required: true,
        
     
        
      },

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