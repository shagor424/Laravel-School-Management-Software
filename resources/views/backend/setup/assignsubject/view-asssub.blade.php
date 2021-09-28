@extends('backend.layouts.master')
@section('content')
 

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Assign Subject</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Assign Subject</li>
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
                <h5 ><b>Assign Subject List
                  <a  href="{{route('asssubs.student.asssub.add')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle"> Add Assign Subject</i></a></b>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-sm table-hover">
                  <thead>
                   <tr style="background-color: #b382dd;">
                    <th>SL</th>
                  
                    <th>Class Name </th>

                  
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $asssub)
          <tr class="{{$asssub->id}}" >
                      <td>{{$key+1}}</td>

                      
                      <td>{{$asssub['class_title']['name']}}</td>
                   
                     
                  
                      <td>
                        <a title="details" href="{{route('asssubs.student.asssub.details',$asssub->title_id)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
                    <a title="Edit" href="{{route('asssubs.student.asssub.edit',$asssub->title_id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('asssubs.student.asssub.delete',$asssub->title_id)}}" data-token="{{csrf_token()}}" data-id="{{$asssub->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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