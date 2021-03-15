@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Registration</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Add Employee</li>
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
                <h5 style="color:  #FF5733 "><b>Employee List </b>
                  <a  href="{{route('employees.regi.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Employee</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color:  #f4d03f ;color: black">
                    <th>SL</th>
                    <th>ID NO</th>
                    <th>Desig</th>
                    <th> Name </th>
                    <th>Mobile </th>
                    <th>Join Date</th>
                     <th>Salary</th>
                      @if(Auth::user()->role=="Admin")
                    <th>CD</th>
                    @endif
                     <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $employee)
                    <tr class="{{$employee->id}}"style="background-color:  #045FB4;border: 2px;color: white">
                      <td>{{$key+1}}</td>
                      <td>{{$employee->id_no}}</td>
                      <td>{{$employee['designation']['name']}}</td>
                      <td>{{$employee->name}}</td>
                      <td>{{$employee->mobile}}</td>
                      
                      <td>{{date('d-M-Y',strtotime($employee->join_date))}}</td>
                      <td>{{$employee->salary}}</td>
                       @if(Auth::user()->role=="Admin")
                      <td style="width: 5%">{{$employee->code}}</td>
                      @endif
                     <td style="width: 8%"><img style="width: 50px;height: 60px" 
                       src="{{(!empty($employee->image))?url('public/upload/employeeimage/'.$employee->image):url('public/upload/usernoimage.png')}}"
                       alt=""></td>

                    <td>
                      <a target="_blank" title="Details" href="{{route('employees.regi.details',$employee->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>

                    <a title="Edit" href="{{route('employees.regi.edit',$employee->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('employees.regi.delete',$employee->id)}}" data-token="{{csrf_token()}}" data-id="{{$employee->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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