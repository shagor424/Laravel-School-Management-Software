@extends('backend.layouts.master')
@section('content')
 

<!-- Content Wrapper. Contains page content -->
  <div  class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 style="color:  #117a65"><strong>Manage Students Marks Entry</strong></h3>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Marks Entry</li>
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
              <div class="card-header"style="background-color: #605ca8;color: white;padding: 5px">
                <h5><b>Marks Entry</b>
                  
                </h5>
              </div> 
              <div class="card-body" {{-- style="background-color:#E6E6E6" --}}>
                <form method="POST" action="{{route('marks.store')}}" id="myform">
                  @csrf
                  <div  class="form-row">
                    
                    <div class="form-group col-md-3">
                    <label for="class_id">Clas Name <font style="color: red">*</font> </label>
                    <select name="class_id" id="class_id" class="form-control  form-control-sm select2bs4">
                      <option value="">Select Class Name </option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="assign_subject_id">Subject Name <font style="color: red">*</font></label>
                    <select name="assign_subject_id" id="assign_subject_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Subject Name</option>
                      
                    </select>
                  </div>

                <div class="form-group col-md-3">
                    <label for="group_id">  Group Name <font style="color: red">*</font></label>
                    <select name="group_id" id="group_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Group Name </option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}">{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  
                   <div class="form-group col-md-3">
                    <label  for="section_id"> Student Section <font style="color: red">*</font></label>
                    <select name="section_id" id="section_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Section Name</option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}">{{$section->name}}</option>
                      @endforeach 
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label  for="shift_id"> Student Shift <font style="color: red">*</font></label>
                    <select name="shift_id" id="shift_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Shift Name</option>
                      @foreach($shifts as $shift)
                      <option value="{{$shift->id}}">{{$shift->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="year_id">Session Year <font style="color: red">*</font></label>
                    <select name="year_id" id="year_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Session Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}">{{$year->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label for="exam_type_id">Exam Type <font style="color: red">*</font></label>
                    <select name="exam_type_id" id="exam_type_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Exam Type</option>
                      @foreach($exam_types as $type)
                      <option value="{{$type->id}}">{{$type->name}}</option>
                      @endforeach
                    </select>
                  </div>
                    


                  <div class="form-group col-md-3" style="margin-top: 30px">
                    <a id="search" class="btn btn-danger "> <strong style="color: white">Students Marks Entry Search</strong></a>

                   </div>
                 </div>

                   <br/><br/>
                  <div class="row d-none" id="marks_entry">
                  <div class="col-md-12">
                    <table class="table-sm table-bordered table-striped dt-responsive" style="width: 100%">
                      <thead>
                        <tr style="background-color: #001f3f;color: white">
                          <th>ID</th>
                          <th>Student Name</th>
                          <th>Father Name</th>
                          <th class="text-center">Mcq Marks</th>
                          <th class="text-center">Creative Marks</th>
                        </tr>
                      </thead>
                      <tbody id="marks-entry-tr">
                      </tbody>
                    </table>
                  </div>
                </div>
                <br>
                  <div>
                   <button type="submit" class="btn btn-success float-right">Marks Entry</button>
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
    var assign_subject_id = $('#assign_subject_id').val();
    var exam_type_id = $('#exam_type_id').val();
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
    if(assign_subject_id == ''){
      $.notify("Subject Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
    if(exam_type_id == ''){
      $.notify("Exam Type Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
      $.ajax({
        url: "{{route('gets-student')}}",
        type: "GET",
     data: {'class_id': class_id,'group_id': group_id,'section_id': section_id,'shift_id':shift_id,'year_id':year_id},
     success: function(data){
      $('#marks_entry').removeClass('d-none');
      var html = '';
      $.each(data, function(key, v) {
        html +=
        '<tr>'+
        '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"><input type="hidden" name="id_no[]" value="'+v.student.id_no+'"></td>'+
        '<td>'+v.student.name+'</td>'+
        '<td>'+v.student.fname+'</td>'+
        '<td><input type="text" class="form-control text-center" name="mcq_marks[]"></td>'+
        
        '<td><input type="text" class="form-control text-center" name="creative_marks[]"></td>'+
        '</tr>';
      });
      html = $('#marks-entry-tr').html(html);
     }

      });
  });
</script>




  <script>
$(function () {
  
  $('#myform').validate({
    rules: {

      "creative_marks[]": {
        required: true,
      


      }
       "mcq_marks[]": {
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

<script type="text/javascript">
  $(function(){
    $(document).on('change','#class_id',function(){
      var class_id =$('#class_id').val();

      $.ajax({
        url:"{{route('get-subject')}}",
        type:"get",
        data:{class_id:class_id},
        success:function(data){
          var html = '<option value="">Select Subject</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.id+'">'+v.subject.name+'</option>';
          });
          $('#assign_subject_id').html(html);
        }

      });
    });
  });
</script>


  @endsection