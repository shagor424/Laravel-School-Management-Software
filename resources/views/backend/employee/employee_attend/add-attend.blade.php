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
              Edit Employee Attendance
              @else
              Add Employee Attendance
              @endif


          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Attendance</li>
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
                <h5 ><b>
                   @if(isset($editdata))
              Edit Employee Attendance
              @else
              Add Employee Attendance
              @endif
                  <a  href="{{route('employees.attendance.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Employee Attendance List</i></a>
               </b> </h5>
              </div> 
            
                
              <form method="post" action="{{route('employees.attendance.store')}}" id="myform">
                @csrf
                @if(isset($editdata))
                 <div class="card-body">

                    <div class="form-group col-md-3">
                    <label>Attendance Date <font style="color: red">*</font></label>
                    <input  type="text" name="attend_date" class="datepicker" value="{{$editdata['0']['attend_date']}}" id="attend_date" class="form-control" placeholder="yyyy-mm-dd" readonly>
                  </div>

                <table id="example1" class=" table-sm table table-bordered table-striped dt-responsive">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">ID NO</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name </th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Designation </th>
                   <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Mobile </th>
                    <th colspan="3"class="text-center" style="vertical-align: middle;">Attendance Status </th>
                  </tr>
                  <tr>
                    <th class="text-center btn present_all" style="display: table-cell;background-color:#114090;color: white ">Present </th>
                    <th class="text-center btn leave_all" style="display: table-cell;background-color:#114090;color: white ">Leave </th>
                    <th class="text-center btn absent_all" style="display: table-cell;background-color:#114090;color: white ">Absent </th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($editdata as $key => $data)
                    <tr id="div{{$data->id}}" class="text-center">
                    <input type="hidden" name="employee_id[]" value="{{$data->employee_id}}"class="employee_id">
                      <td>{{$key+1}}</td>
                      <td>{{$data['user']['id_no']}}</td>
                      <td>{{$data['user']['name']}}</td>
                      <td>{{$data['user']['desi_id']}}</td>
                      <td>{{$data['user']['mobile']}}</td>
                      <td colspan="3">
                        <div class="switch-toggle switch-3 switch-candy">
                          <input type="radio" name="attend_status{{$key}}" class="present" id="present{{$key}}" value="Present"{{($data->attend_status=='Present')?'checked':''}}/>
                          <label for="present{{$key}}" >Present</label>
                        
                          <input type="radio" name="attend_status{{$key}}" class="leave" id="leave{{$key}}" value="Leave" {{($data->attend_status=='Leave')?'checked':''}}/>
                          <label for="leave{{$key}}" >Leave</label>

                          <input type="radio" name="attend_status{{$key}}" class="absent" id="absent{{$key}}" value="Absent" {{($data->attend_status=='Absent')?'checked':''}}/>
                          <label for="absent{{$key}}" >Absent</label>

                        </div>

                      </td>
                      

                      </tr>
                    @endforeach
                  </tbody>
                </table>
              
                 
      <div class="form-group col-md-12">            
    
    <button type="submit"class="btn btn-primary float-right" class="btn btn-block">{{(@$editdata)?'Update Employee Leave':'Add Employee Leave'}}</button>

                  </div>
                </div> 
                @else
                <div class="card-body">

                    <div class="form-group col-md-3">
                    <label>Attendance Date <font style="color: red">*</font></label>
                    <input  type="text" class="datepicker" name="attend_date" id="attend_date" class="form-control" placeholder="yyyy-mm-dd">
                  </div>

                <table id="example1" class=" table-sm table table-bordered table-striped dt-responsive">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">SL</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">ID NO</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Name </th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Designation </th>
                   <th rowspan="2" class="text-center" style="vertical-align: middle;">Employee Mobile </th>
                    <th colspan="3"class="text-center" style="vertical-align: middle;">Attendance Status </th>
                  </tr>
                  <tr>
                    <th class="text-center btn present_all bg-warning" style="display: table-cell;color: white ">Present </th>
                    <th class="text-center btn leave_all bg-warning" style="display: table-cell;color: white ">Leave </th>
                    <th class="text-center btn absent_all bg-warning" style="display: table-cell;;color: white ">Absent </th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($employees as $key => $employee)
                    <tr id="div{{$employee->id}}" class="text-center">
                    <input type="hidden" name="employee_id[]" value="{{$employee->id}}"class="employee_id">
                      <td>{{$key+1}}</td>
                      <td>{{$employee->id_no}}</td>
                      <td>{{$employee->name}}</td>
                      <td>{{$employee->desi_id}}</td>
                      <td>{{$employee->mobile}}</td>
                      <td colspan="3">
                      	<div class="switch-toggle switch-3 switch-candy">
                      		<input type="radio" name="attend_status{{$key}}" class="present" id="present{{$key}}" value="Present" checked="checked"/>
                      		<label for="present{{$key}}" >Present</label>
                      	
                      		<input type="radio" name="attend_status{{$key}}" class="leave" id="leave{{$key}}" value="Leave" checked="checked"/>
                      		<label for="leave{{$key}}" >Leave</label>

                      		<input type="radio" name="attend_status{{$key}}" class="absent" id="absent{{$key}}" value="Absent" checked="checked"/>
                      		<label for="absent{{$key}}" >Absent</label>

                      	</div>

                      </td>
                      

                      </tr>
                    @endforeach
                  </tbody>
                </table>
              
                 
      <div class="form-group col-md-2">            
    
    <button type="submit"class="btn btn-primary" class="btn btn-block">{{(@$editdata)?'Update Employee Leave':'Add Employee Leave'}}</button>

                  </div>
                </div> 
                @endif
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
  <script type="text/javascript">
  	$(document).on('click','.present',function(){
  		$(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
  	});
  	$(document).on('click','.leave',function(){
  		$(this).parents('tr').find('.datetime').css('pointer-events','').css('background-color','white').css('color','#495057');
  	});
  	$(document).on('click','.absent',function(){
  		$(this).parents('tr').find('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
  	});
  </script>

  <script type="text/javascript">
  	$(document).on('click','.present_all',function(){
  		$("input[value=Present]").prop('checked',true);
  		$('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
  	});
  		$(document).on('click','.leave_all',function(){
  		$("input[value=Leave]").prop('checked',true);
  		$('.datetime').css('pointer-events','none').css('background-color','white').css('color','#495057');
  	});
  			$(document).on('click','.absent_all',function(){
  		$("input[value=Absent]").prop('checked',true);
  		$('.datetime').css('pointer-events','none').css('background-color','#dee2e6').css('color','#495057');
  	});
  </script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

     
      attend_date: {
        required: true,
        },

     attend_status: {
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

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#leave_purpose_id',function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id == '0'){
        $('#add-others').show();
      }
         else{

          $('#add-others').hide();

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

  @endsection