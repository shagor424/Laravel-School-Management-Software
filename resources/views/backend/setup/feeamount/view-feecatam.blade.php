@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Fee Catagory Amount</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Add Fee Catagory Amount</li>
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
                <h5 ><b>Fee Catagory Amount</b>
                  <a  href="{{route('feecatams.student.feecatam.add')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle"> Add Fee Catagory Amount</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-sm table-hover">
                  <thead>
                  <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                   
                    <th>Fee Catagory </th>
                   
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $feecatam)
                    <tr class="{{$feecatam->id}}" >
                      <td>{{$key+1}}</td>
                      
                      <td>{{$feecatam['fee_catagory']['name']}}</td>
                     
                     
                  
                      <td class="text-center">
                        <a title="Edit" href="{{route('feecatams.student.feecatam.details',$feecatam->fee_catagory_id)}}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                    <a title="Edit" href="{{route('feecatams.student.feecatam.edit',$feecatam->fee_catagory_id)}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('feecatams.student.feecatam.delete',$feecatam->fee_catagory_id)}}" data-token="{{csrf_token()}}" data-id="{{$feecatam->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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