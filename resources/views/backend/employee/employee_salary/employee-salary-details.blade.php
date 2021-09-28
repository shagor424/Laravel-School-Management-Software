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
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Salary Details</li>
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
           
            <tr style="background-color: #b382dd;">
                <h5 ><b>
                 Employee Salary Increment Details Report
                  <a  href="{{route('employees.salary.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Salary Increment List</i></a>
               </b> </h5>
              </div> 
               <div class="card-body">
               <h5 style="color: green"> <strong>Employee Name : {{$details->id_no}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;<strong>Employee Name : {{$details->name}}</strong></h5>
                  <br/>
                <table class=" table-sm table table-bordered table-hover">
                  <thead>
                    <tr style="background-color: #b382dd;">
                      <th>SL</th>
                      <th>Employee ID</th>

                      <th>Name</th>
                      <th> Join Date</th>
                      
                      <th>Previous Salary</th>
                      <th>Increment Salary</th>
                      <th>Present Salary</th>
                      <th>Effected Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($salary as $key=>$value)
                    <tr >
                      @if($key=="0")
                      <td style="color: red" class="text-center" colspan="9"><strong>Joining Salary:   {{$value->previous_salary}}</strong></td>
                      @else
                      <td style="text-align: center;" >{{$key+1}}</td>
                      <td style="text-align: center;" >{{$details->id_no}}</td>
                      <td>{{$details->name}}</td>
                      <td style="text-align: center;">{{date('d-M-Y',strtotime($details->join_date))}}</td>
                      <td style="text-align: center;">{{$value->previous_salary}}</td>
                      <td style="text-align: center;">{{$value->increment_salary}}</td>
                      <td style="text-align: center;">{{$value->present_salary}}</td>
                      <td style="text-align: center;">{{date('d-M-Y',strtotime($value->effected_date))}}</td>
                      @endif
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              
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
  

  @endsection