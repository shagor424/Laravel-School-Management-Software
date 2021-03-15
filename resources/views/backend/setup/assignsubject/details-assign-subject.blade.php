@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Assign Subject Details </h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
              <div class="card-header">
                <h5 style="color:  #FF5733 "><b>Assign Subject Details</b>
                  <a  href="{{route('asssubs.student.asssub.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> Assign Subject List</i></a>
                </h5>
              </div> 
            <div class="card-body">
              <h4 style="color:  blue "> <strong>Class Name :</strong> {{$editdata['0']['student_class']['name']}} &nbsp;&nbsp;&nbsp;&nbsp;<strong>Group Name :</strong>{{$editdata['0']['student_group']['name']}} &nbsp;&nbsp;&nbsp;&nbsp; <strong>Clss Title :</strong>{{$editdata['0']['class_title']['name']}} </h4>
                <table class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color: #117a65;color: white;text-align: center;">
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
                    <tr style="background-color:  orange  ;text-align: center;">
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