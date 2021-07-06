@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
          {{--   <h1 class="m-0 text-dark"> Assign Subject Details </h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Assign Subject Details</li>
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
                <h5 ><b>Assign Subject Details
                  <a  href="{{route('asssubs.student.asssub.view')}}" class="btn btn-warning  float-right"><i class="fa fa-list"> Assign Subject List</i></a></b>
                </h5>
              </div> 
            <div class="card-body">
              <h4 style="color:  blue "> <strong>Class Name :</strong> {{$editdata['0']['student_class']['name']}} &nbsp;&nbsp;&nbsp;&nbsp;<strong>Group Name :</strong>{{$editdata['0']['student_group']['name']}} &nbsp;&nbsp;&nbsp;&nbsp; <strong>Clss Title :</strong>{{$editdata['0']['class_title']['name']}} </h4>
                <table class="table table-sm  table-hover">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>Subject ID</th>
                    <th>Subject Name</th>

                    <th>Full Mark</th>
                    <th>Pass Mark</th>
                    <th>Subjective Mark</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($editdata as $key => $feecatam)
                    <tr >
                      <td>{{$key+1}}</td>
                      <td>{{$feecatam['subject']['id']}}</td>
                      <td style="text-align: left">{{$feecatam['subject']['name']}}</td>
                      <td>{{$feecatam->full_mark}}</td>
                      <td>{{$feecatam->pass_mark}}</td>
                      <td>{{$feecatam->subjective_mark}}</td>
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