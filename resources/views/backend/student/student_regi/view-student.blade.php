@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div  class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h3 style="color:  #117a65"><strong>Manage  Students Registration</strong></h3> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Registration</li>
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
                <h5 ><b>Assign Student List
                  <a  href="{{route('students.regi.adds')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle"> Add Student</i></a></b>
                </h5>
              </div> 
              <div class="card-body"style="background-color:#E6E6E6">
                <form method="get" action="{{route('students.stsearchs')}}" id="myform">
                  <div  class="form-row">
                    
                    <div class="form-group col-md-2">
                    <label for="class_id">Clas Name <font style="color: red">*</font> </label>
                    <select name="class_id" id="class_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Class Name </option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}" {{(@$class_id==$class->id)?"selected":""}}>{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>

                <div class="form-group col-md-2">
                    <label for="group_id">  Group Name <font style="color: red">*</font></label>
                    <select name="group_id" id="group_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Group Name </option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}" {{(@$group_id==$group->id)?"selected":""}}>{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  
                   <div class="form-group col-md-2">
                    <label  for="section_id"> Student Section <font style="color: red">*</font></label>
                    <select name="section_id" id="section_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Section Name</option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}" {{(@$section_id==$section->id)?"selected":""}} >{{$section->name}}</option>
                      @endforeach 
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label  for="shift_id"> Student Shift <font style="color: red">*</font></label>
                    <select name="shift_id" id="shift_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Shift Name</option>
                      @foreach($shifts as $shift)
                      <option value="{{$shift->id}}" {{(@$shift_id==$shift->id)?"selected":""}} >{{$shift->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="year_id">Session Year <font style="color: red">*</font></label>
                    <select name="year_id" id="year_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Session Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}" {{(@$year_id==$year->id)?"selected":""}}>{{$year->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-2" style="margin-top: 30px">
                    <button type="submit"class="btn btn-danger "name="search"> Students Search</button>
                   </div>
                  </div>
                </form>
              </div>

            <div style="" class="card-body">
              @if(!@$search)
                <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                  <tr style="background-color: #b382dd;"> <!--#ffc107-->

                    <th>SL</th>
                    <th>ID</th>
                     <th>Name</th>
                    <th>Class</th>
                    <th>Roll</th>
                    <th>Year</th>
                    <th>Group</th>
                     <th>Sec</th>
                    <th>Mobile</th>
                    @if(Auth::user()->role=="Admin")
                    <th>CD</th>
                    @endif
                    {{-- <th>Img</th> --}}
                    <th width="12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $student)
                    <tr class="{{$student->id}}"style="">
                      <td style="width: 5%">{{$key+1}}</td>
                      <td style="width: 8%">{{$student['student']['id_no']}}</td>
                      <td style="text-align: left;">{{$student['student']['name']}}</td>
                      <td>{{$student['student_class']['name']}}</td>
                      <td >{{$student->class_roll}}</td>
                      <td>{{$student['year']['name']}}</td>
                      <td style="text-align: left;">{{$student['group']['name']}}</td>
                      <td>{{$student['section']['name']}}</td>
                      
                      <td>{{$student['student']['mobile']}}</td>
                       @if(Auth::user()->role=="Admin")
                      <td style="width: 5%">{{$student['student']['code']}}</td>
                      @endif
                       {{-- <td style="width: 8%"><img style="width: 50px;height: 60px" 
                       src="{{(!empty($student['student']['image']))?url('public/upload/stimage/'.$student['student']['image']):url('public/upload/usernoimage.png')}}"
                       alt=""></td> --}}
                      
                      <td style="width: 8%">
                      <a target="_blank" title="Details" href="{{route('students.regi.details',$student->student_id)}}" class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>

                    <a title="Edit" href="{{route('students.regi.edit',$student->student_id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>

                     <a title="Promotion" href="{{route('students.regi.promotion',$student->student_id)}}" class="btn btn-warning btn-xs"><i class="fa fa-check"></i></a>

                    <a title="Delete" id="delete" href="{{route('students.regi.delete',$student->id)}}" data-token="{{csrf_token()}}" data-id="{{$student->student_id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>

                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @else
                  <table id="example1" class="table table-bordered table-hover">
                  <thead>
                   <tr style="background-color:  #283747 ;color: white"> <!--#ffc107-->

                    <th>SL</th>
                    <th>ID</th>
                     <th>Name</th>
                    <th>Class</th>
                    <th>Roll</th>
                    <th>Year</th>
                     <th>Group</th>
                     <th>Sec</th>
                    <th>Mobile</th>
                     @if(Auth::user()->role=="Admin")
                    <th>CD</th>
                    @endif
                    <th>Ph</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $student)
                    <tr class="{{$student->id}}"style="background-color: #001f3f;color: white">
                      <td style="width: 5%">{{$key+1}}</td>
                      <td style="width: 8%">{{$student['student']['id_no']}}</td>
                      <td style="text-align: left;">{{$student['student']['name']}}</td>
                      <td>{{$student['student_class']['name']}}</td>
                      <td >0000</td>
                      <td>{{$student['year']['name']}}</td>
                      <td style="text-align: left;">{{$student['group']['name']}}</td>
                      <td>{{$student['section']['name']}}</td>
                      
                      <td>{{$student['student']['mobile']}}</td>
                       @if(Auth::user()->role=="Admin")
                      <td style="width: 5%">{{$student['student']['code']}}</td>
                      @endif
                       <td style="width: 8%"><img style="width: 50px;height: 60px" 
                       src="{{(!empty($student['student']['image']))?url('public/upload/stimage/'.$student['student']['image']):url('public/upload/usernoimage.png')}}"
                       alt=""></td>
                      
                      <td style="width: 12%">
                      <a target="_blank" title="Details" href="{{route('students.regi.details',$student->student_id)}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>

                    <a title="Edit" href="{{route('students.regi.edit',$student->student_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                    <a title="Promotion" href="{{route('students.regi.promotion',$student->student_id)}}" class="btn btn-info btn-sm"><i class="fa fa-check"></i></a>

                    <a title="Delete" id="delete" href="{{route('students.regi.delete',$student->student_id)}}" data-token="{{csrf_token()}}" data-id="{{$student->student_id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif
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

     
    
 class_id: {
        required: true,
        },    
 year_id: {
        required: true,
        },    
 group_id: {
        required: true,
        },    
 shift_id: {
        required: true,
       },



  section_id: {
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