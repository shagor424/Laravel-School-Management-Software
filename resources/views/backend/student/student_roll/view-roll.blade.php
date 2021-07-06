@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div  class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            {{-- <h3 style="color:  #117a65"><strong>Manage  Students Roll</strong></h3> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Roll</li>
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
              <div  class="card-header" style="background-color: #605ca8;color: white;padding: 5px">
                <h5><b>Roll Generate</b>
                  
                </h5>
              </div> 
              <div class="card-body">
                <form method="POST" action="{{route('students.roll.store')}}" id="myform">
                  @csrf
                  <div  class="form-row">
                    
                    <div class="form-group col-md-2">
                    <label for="class_id">Clas Name <font style="color: red">*</font> </label>
                    <select name="class_id" id="class_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Class Name </option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>



                <div class="form-group col-md-2">
                    <label for="group_id">  Group Name <font style="color: red">*</font></label>
                    <select name="group_id" id="group_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Group Name </option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}">{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  
                   <div class="form-group col-md-2">
                    <label  for="section_id"> Student Section <font style="color: red">*</font></label>
                    <select name="section_id" id="section_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Section Name</option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}">{{$section->name}}</option>
                      @endforeach 
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label  for="shift_id"> Student Shift <font style="color: red">*</font></label>
                    <select name="shift_id" id="shift_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Shift Name</option>
                      @foreach($shifts as $shift)
                      <option value="{{$shift->id}}">{{$shift->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="year_id">Session Year <font style="color: red">*</font></label>
                    <select name="year_id" id="year_id" class="form-control select2bs4 form-control-sm">
                      <option value="">Select Session Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}">{{$year->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-2" style="margin-top: 30px">
                    <a id="search" class="btn btn-danger "> Students Search</a>

                   </div>
                 </div>

                   <br/><br/>
                  <div class="row d-none" id="roll_generate">
                  <div class="col-md-12">
                    <table class="table-sm table-bordered  dt-responsive" style="width: 100%">
                      <thead>
                        <tr style="background-color: #001f3f;color: white">
                          <th>ID</th>
                          <th>Student Name</th>
                          <th>Father Name</th>
                          <th class="text-center">Class Roll</th>
                        </tr>
                      </thead>
                      <tbody id="roll-generate-tr">
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                  <div>
                   <button type="submit" class="btn btn-success float-right">Roll Generate</button>
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
<script type="text/javascript">
  $(document).on('click','#search',function(){
    var class_id = $('#class_id').val();
    var group_id = $('#group_id').val();
    var section_id = $('#section_id').val();
    var shift_id = $('#shift_id').val();
    var year_id = $('#year_id').val();
    $('.notifyjs-corner').html('');
    if(class_id == ''){
      $.notify("Class Name Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
     if(group_id == ''){
      $.notify("Group Name Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
    if(section_id == ''){
      $.notify("Section Name Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
     if(shift_id == ''){
      $.notify("Section Name Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
     if(year_id == ''){
      $.notify("Year Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
      $.ajax({
        url: "{{route('students.roll.get-student')}}",
        type: "GET",
     data: {'class_id': class_id,'group_id': group_id,'section_id': section_id,'shift_id':shift_id,'year_id':year_id},
     success: function(data){
      $('#roll_generate').removeClass('d-none');
      var html = '';
      $.each(data, function(key, v) {
        html +=
        '<tr>'+
        '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
        '<td>'+v.student.name+'</td>'+
        '<td>'+v.student.fname+'</td>'+
        '<td><input type="text" class="form-control text-center" name="class_roll[]" value="'+v.class_roll+'"></td>'+
        '</tr>';
      });
      html = $('#roll-generate-tr').html(html);
     }

      });
  });
</script>




  <script>
$(function () {
  
  $('#myform').validate({
    rules: {

      "class_roll[]": {
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