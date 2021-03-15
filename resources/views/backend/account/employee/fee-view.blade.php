@extends('backend.layouts.master')
@section('content')
  

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Employee Salary</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add/Edit Employee Salary</li>
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
                <h5 style="color:  #FF5733 "><b>Employee Salary List </b>
                  <a  href="{{route('accounts.salary.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add/Edit Employee Salary</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color:  #f4d03f ;color: black">
                    <th>SL</th>
                    <th>ID No</th>
                    <th> Name</th>
                    <th> Date</th>
                    <th> Amount</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $value)
                    <tr class="{{$value->id}}">
                    <td style="text-align: center">{{$key+1}}</td>
                    <td style="text-align: center">{{$value['user']['id_no']}}</td>
                    <td style="text-align: center">{{$value['user']['name']}}</td> 
                    <td style="text-align: center">{{date('M Y',strtotime($value->date))}}</td>
                    <td style="text-align: center">{{$value->amount}}.00</td>
                      
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