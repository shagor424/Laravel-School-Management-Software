@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Employee Salary</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Salary</li>
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
                <h5 ><b>Employee Salary List</b>
                 
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>ID NO</th>
                    <th>Desig</th>
                    <th> Name </th>
                    <th>Mobile </th>
                    <th>Join Date</th>
                     <th>Salary</th>
                     
                     <th>Photo</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $employee)
                    <tr class="{{$employee->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$employee->id_no}}</td>
                      <td>{{$employee['designation']['name']}}</td>
                      <td>{{$employee->name}}</td>
                      <td>{{$employee->mobile}}</td>
                      
                      <td>{{date('d-m-Y',strtotime($employee->join_date))}}</td>
                      <td>{{$employee->salary}}</td>
                      
                     <td style="width: 8%"><img style="width: 50px;height: 60px" 
                       src="{{(!empty($employee->image))?url('public/upload/employeeimage/'.$employee->image):url('public/upload/usernoimage.png')}}"
                       alt=""></td>

                    <td>
                      <a  title="Details" href="{{route('employees.salary.details',$employee->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                     
                      <a target="_blank" title="Details" href="{{route('employees.salary.detailspdf',$employee->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-print"></i></a>

                    <a title="Edit Increment" href="{{route('employees.salary.increment',$employee->id)}}" class="btn btn-success btn-sm"><i class="fa fa-plus-circle"></i></a>
                    
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