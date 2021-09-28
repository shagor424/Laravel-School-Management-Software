@extends('backend.layouts.master')
@section('content') 
 

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Employee Monthly salary</li>
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
        
          <!-- Left col -->
        </section>
          <section class="content">
            <div class="row">
              <div class="col-12">
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
                <h5 ><b>Select Date </b>
                 
                </h5>
              </div> 
            <div class="card-body">
               <div class="form-row">
                <div class="form-group col-md-4">
                  <label class="control-lablel">Date</label>
                  <input type="text" class="datepicker" name="attend_date" id="date" class="form-control" placeholder="yyyy-mm-dd">
                </div>
                   <div class="form-group col-md-4">
                      <a class="btn btn-success" id="search" style="margin-top: 30px;color: white">Search</a>
                  </div>
                 </div>
                </div>
             
            <div class="card-body">
              <div id="DocumentResults"></div>
              <script type="text/x-handlebars-template" id="document-template" >
                <table class="table-sm table-bordered table-striped" style="width:100%">
                  <thead>
                    <tr style="background-color: #b382dd;">
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
                
              </script>
            </div>
            
           </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
  $(document).on('click','#search',function(){
    var attend_date = $('#date').val();
    $('.notifyjs-corner').html('');

    if(attend_date == ''){
      $.notify("Date Required",{globalPosition:'top right}',className:'error'}); 
      return false;
    }
      $.ajax({
        url: "{{route('employees.monthlysalary.getsalary')}}",
        type: "get",
     data: {'attend_date': attend_date},
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
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  <!-- /.content-wrapper -->
  @endsection