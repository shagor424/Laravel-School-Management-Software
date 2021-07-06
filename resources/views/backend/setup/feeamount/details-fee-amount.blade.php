@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark"> Fee Amount Details </h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Fee Amount Details</li>
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
                <h5 ><b>Fee Amount Details</b>
                  <a  href="{{route('feecatams.student.feecatam.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Fee Catagory Amount List</i></a>
                </h5>
              </div> 
            <div class="card-body">
              <h4 style="color:  blue "> <strong>Fee Type :</strong> {{$editdata['0']['fee_catagory']['name']}}</h4>
                <table class="table table-sm table-hover">
                  <thead>
                  <tr style="background-color: #001f3f;color: white;">
                    <th>SL</th>
                    <th>Class</th>
                    <th>Fee Catagory</th>
                    <th class="text-center">Amount</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($editdata as $key => $feecatam)
                    <tr >
                      <td>{{$key+1}}</td>
                      <td style="text-align: left;">{{$feecatam['student_class']['name']}}</td>
                      <td>{{$feecatam['fee_catagory']['name']}}</td>
                      <td class="text-center">{{$feecatam->amount}}</td>
                      
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