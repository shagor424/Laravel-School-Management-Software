@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Class Title</h1>
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Class Title</li>
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
                <h5 style="color:  #FF5733 "><b>Class Title List</b>
                  <a  href="{{route('setups.student.classtitle.add')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"> Add Class Title</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table-sm table table-bordered table-hover">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Class Title ID</th>
                    <th>Class Title Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $classtitle)
                    <tr class="{{$classtitle->id}}"style="background-color:  #a1c880;border: 2px">
                      <td>{{$key+1}}</td>
                      <td>{{$classtitle->id}}</td>
                     
                      <td>{{$classtitle->name}}</td>
                     
                  
                      <td>
                    <a title="Edit" href="{{route('setups.student.classtitle.edit',$classtitle->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('setups.student.classtitle.delete',$classtitle->id)}}" data-token="{{csrf_token()}}" data-id="{{$classtitle->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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