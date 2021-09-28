@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div  class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h3 style="color:  #117a65"><strong>Manage Tution Fee</strong></h3> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Tution Fee</li>
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
                <h5><b>Tution Fee</b>
                  
                </h5>
              </div> 
            
                <div class="card-body" style="background-color:#E6E6E6">
                   <div class="form-row">
                    
                    <div class="form-group col-md-2">
                    <label for="class_id">Class Name <font style="color: red">*</font> </label>
                    <select name="class_id" id="class_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Class Name </option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label for="group_id">  Group Name <font style="color: red">*</font></label>
                    <select name="group_id" id="group_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Group Name </option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}">{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  
                   <div class="form-group col-md-2">
                    <label  for="section_id"> Student Section <font style="color: red">*</font></label>
                    <select name="section_id" id="section_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Section Name</option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}">{{$section->name}}</option>
                      @endforeach 
                    </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label  for="shift_id"> Student Shift <font style="color: red">*</font></label>
                    <select name="shift_id" id="shift_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Shift Name</option>
                      @foreach($shifts as $shift)
                     <option value="{{$shift->id}}">{{$shift->name}}</option>
                      @endforeach
                    </select>
                  </div>


                

                  <div class="form-group col-md-2">
                    <label for="year_id">Session Year <font style="color: red">*</font></label>
                    <select name="year_id" id="year_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Session Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}">{{$year->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-2" style="margin-top: 30px">
                    <a id="search" class="btn btn-warning "> Students Search</a>

                   </div>
                 </div>
                  
                </div>

              <div class="card-body">
                <div id="DocumentResult"> </div>
                  <script type="text/x-handlebars-template" id="document-template">
                    <table class="table-sm table-bordered table-striped" style="width:100%">
                      <thead>
                        <tr style="background-color: #b382dd;">
                          @{{{thsource}}}
                         </tr>
                         <tbody>
                          @{{#each this}}
                          <tr>
                            @{{{tdsource}}}
                          </tr>
                          @{{/each}}
                        </tbody>
                      </table>
                        </script>

                  </script>
               
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
        url: "{{route('students.tutionfee.getstutionfee')}}",
        type: "get",
     data: {'class_id': class_id,'group_id': group_id,'section_id': section_id,'shift_id':shift_id,'year_id':year_id},
     beforeSend:function(){

     },
     success: function(data){
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var html = template(data);
      $('#DocumentResult').html(html);
      $('[data-toggle="tooltip"]').tooltip();

      }

      });
  });
</script>




 
  @endsection