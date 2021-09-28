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

             

          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Employee Salary</li>
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
                <h5 >Employee Salary<b>
                
                  <a  href="{{route('accounts.salary.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Employee Salary List</i></a>
               </b> </h5>
              </div> 
              

                <div class="card-body" >
               <div class="form-row">
                <div class="form-group col-md-4">
                  <label class="control-lablel">Date</label>
                  <input type="text" name="date" id="date"  class="datepicker" class="form-control" placeholder="YYYY-MM-DD">
                </div>
                   <div class="form-group col-md-4">
                      <a class="btn btn-danger" id="search" style="margin-top: 30px;color: white">Search</a>
                  </div>
                 </div>
                </div>
                </div>

                <div class="card-body">
              <div id="DocumentResults"></div>
              <script type="text/x-handlebars-template" id="document-template" >
                <form action="{{route('accounts.salary.store')}}" method="post">
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
                <br>
                <button type="submit" class="btn btn-primary float-right" >Submit</button>
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
    var date = $('#date').val();
    $('.notifyjs-corner').html('');

    if(date == ''){
      $.notify("Date Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
      $.ajax({
        url: "{{route('accounts.salary.getsemployee')}}",
        type: "get",
     data: {'date':date},
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

      "date": {
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