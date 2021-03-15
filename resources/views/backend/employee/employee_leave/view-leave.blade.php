@extends('backend.layouts.master')
@section('content')
 

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Leave</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Employee Leave</li>
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
              <div class="card-header">
                <h5 style="color:  #FF5733 "><b>Employee Leave List </b>
                  <a  href="{{route('employees.leave.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Employee Leave</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color:  #f4d03f ;color: black">
                    <th>SL</th>
                    <th>ID NO</th>
                    
                    <th>Name </th>
                    <th>Desig ID</th>
                    <th>Mobile </th>
                    <th>Leave Purpose </th>
                    <th>Leave Date </th>
                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $employee)
                    <tr class="{{$employee->id}}"style="background-color:  #045FB4;border: 2px;color: white">
                      <td>{{$key+1}}</td>
                      <td>{{$employee['user']['id_no']}}</td>
                      <td>{{$employee['user']['name']}}</td>
                      <td>{{$employee['user']['desi_id']}}</td>
                      <td>{{$employee['user']['mobile']}}</td>
                      <td>{{$employee['purpose']['name']}}</td>
                      <td>{{date('d-M-Y',strtotime($employee->start_date))}} to 
                      {{date('d-M-Y',strtotime($employee->end_date))}}</td>
                    <td>
                      <a target="_blank" title="Details" href="{{route('employees.leave.details',$employee->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>

                    <a title="Edit" href="{{route('employees.leave.edit',$employee->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    
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