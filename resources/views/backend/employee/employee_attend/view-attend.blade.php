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
           
           <div class="card">
              <div class="card-header"style="background-color: #605ca8;color: white;padding: 5px">
                <h5 ><b>Employee Attendance List 
                  <a  href="{{route('employees.attendance.add')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle"> Add Employee Attendance</i></a></b>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
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