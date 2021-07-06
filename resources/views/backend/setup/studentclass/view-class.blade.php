@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Student Class</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Student Class</li>
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
              <div class="card-header" style="background-color: #605ca8;color: white;padding: 5px">
                <h5><b>Student Class List</b>
                  <a  href="{{route('setups.student.class.add')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle"> Add Student Class</i></a>
                </h3>
              </div> 
            <div class="card-body" style="margin:15px;">
                <table id="example1" class="table  table-hover table-sm">
                  <thead>
                   <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>Class ID</th>
                    <th>Class Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $value)
                    <tr class="{{$value->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$value->id}}</td>
                     
                      <td>{{$value->name}}</td>
                     
                  
                      <td>
                    <a title="Edit" href="{{route('setups.student.class.edit',$value->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('setups.student.class.delete',$value->id)}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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