 @extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
           {{--  <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Edit Student Fee
              @else
              Add Student Fee
              @endif


          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Student Fee</li>
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
              Edit Student Fee
              @else
              Add Student Fee
              @endif
                  <a  href="{{route('accounts.fee.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Student Fee List</i></a>
               </b> </h5>
              </div> 
            
                
             <div class="card-body">
                
                  <div {{-- style="background-color:  #b2babb " --}} class="form-row">
                    
                    <div class="form-group col-md-3">
                    <label for="class_id">Clas Name <font style="color: red">*</font> </label>
                    <select name="class_id" id="class_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Class Name </option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}">{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>

                

                  <div class="form-group col-md-3">
                    <label for="year_id">Group ID <font style="color: red">*</font></label>
                    <select name="group_id" id="group_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Group Name</option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}">{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>

                    <div class="form-group col-md-3">
                    <label for="class_id">Section Name<font style="color: red">*</font> </label>
                    <select name="section_id" id="section_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Section </option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}">{{$section->name}}</option>
                      @endforeach
                    </select>
                  </div>
                

                  <div class="form-group col-md-3">
                    <label for="class_id">Shift Name <font style="color: red">*</font> </label>
                    <select name="shift_id" id="shift_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Shift Name </option>
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
                    <label for="fee_catagory_id">Fee Catagory <font style="color: red">*</font></label>
                    <select name="fee_catagory_id" id="fee_catagory_id" class="form-control form-control-sm select2bs4">
                      <option value="">Select Fee Catagory</option>
                      @foreach($fee_catagories as $fee_catagory)
                      <option value="{{$fee_catagory->id}}">{{$fee_catagory->name}}</option>
                      @endforeach
                    </select>
                  </div>
                    
                    <div class="form-group col-md-3">
                       <label>Month Name</label>
                       <input type="text" id="date" class="datepicker" name="date"class="form-control form-control-sm" placeholder="yyyy-mm-dd">
                     </div>


                  <div class="form-group col-md-3" style="margin-top: 30px">
                    <a id="search" class="btn btn-warning  pull-right"> <strong style="color: white">Students Fee Search</strong></a>

                   </div>
                 </div>

                   <br/><br/>
               
                  
                </form>
              </div>

                <div class="card-body">
              <div id="DocumentResults"></div>
              <script type="text/x-handlebars-template" id="document-template" >
                <form action="{{route('accounts.fee.store')}} method="post">
                  @csrf
                <table class="table-sm table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr style="background-color: #001f3f;color: white">
                      @{{{thsource}}}
                    </tr>
                  </thead>
                  <tbody>
                    @{{#each this}}
                    <tr>
                      @{{{tdsource}}}
                    </tr>
                    @{{/each}}
                  </tbody>
                </table>
                <button type="submit" class"btn btn-primary" style="margin-top:10%">Submit</button>
                </form>
              </script>
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
 


<script type="text/javascript">
  $(document).on('click','#search',function(){
    var class_id = $('#class_id').val();
    var year_id = $('#year_id').val();
    var shift_id = $('#shift_id').val();
    var section_id = $('#seciton_id').val();
    var group_id = $('#group_id').val();
    var fee_catagory_id = $('#fee_catagory_id').val();
    var date = $('#date').val();
    $('.notifyjs-corner').html('');
    if(class_id == ''){
      $.notify("Class Name Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
     
     if(year_id == ''){
      $.notify("Year Required",{globalPosition:'top right}',className:'error'});
      return false;
    }

    if(group_id == ''){
      $.notify("Group Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
    if(section_id == ''){
      $.notify("Section  Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
    if(shift_id == ''){
      $.notify("Shift  Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
    if(fee_catagory_id == ''){
      $.notify("Fee CatagorY Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
    if(date == ''){
      $.notify("Date Required",{globalPosition:'top right}',className:'error'});
      return false;
    }
      $.ajax({
        url: "{{route('accounts.fee.getstudent')}}",
        type: "GET",
     data: {'class_id': class_id,'year_id':year_id,'fee_catagory_id':fee_catagory_id,'group_id':group_id,'section_id':section_id,'shift_id':shift_id,'date':date},
     beforeSend:function(){

     },
     success: function(data){
      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var html = template(data);
      $('#DocumentResults').html(html);
      $('[data-toggle="tooltip"]').tooltip();
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

<script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>

  @endsection