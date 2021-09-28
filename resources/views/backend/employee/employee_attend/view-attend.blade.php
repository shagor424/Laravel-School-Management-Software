@extends('backend.layouts.master')
@section('content')
 

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Employee Attendance</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Employee Attendance</li>
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
                <h5 ><b>Employee Attendance List 
                  <a  href="{{route('employees.attendance.add')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle"> Add Employee Attendance</i></a></b>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #b382dd;">
                    <th>SL</th>
                    <th>Attendance Date </th>
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $employee)
                    <tr class="{{$employee->id}}">
                      <td>{{$key+1}}</td>
                      
                     
                      <td >{{date('d-M-Y',strtotime($employee->attend_date))}}</td>
                    <td class="text-center">
                      <a title="Details" href="{{route('employees.attendance.details',$employee->attend_date)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>

                    <a title="Edit" href="{{route('employees.attendance.edit',$employee->attend_date)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                    
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
  @endsection