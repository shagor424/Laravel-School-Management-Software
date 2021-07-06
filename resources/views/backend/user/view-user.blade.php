@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage User</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
           
           <div class="panel"style="background:white;padding-bottom:5px">
              <div class="panel-header" style="background-color: #605ca8;color: white;padding: 5px">
                <h5>User List
                  <a  href="{{route('users.add')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle float-right"> Add User</i></a>
                </h5>
              </div> 
            <div class="panel-body" style="margin:15px;">
                <table id="example1" class="table  table-hover table-sm ">
                  <thead>
                   <tr style="background-color: #001f3f;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>User Type</th>
                    <th>Name</th>s
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Role</th>
                    <th>Code</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $user)
                    <tr >
                      <td>{{$key+1}}</td>
                      <td>{{$user->id}}</td>
                      <td>{{$user->usertype}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->mobile}}</td>
                      <td>{{$user->role}}</td>
                      <td>{{$user->code}}</td>
                      <td><img style="width: 50px;height: 60px" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->image))?url('public/upload/userimage/'.$user->image):url('public/upload/usernoimage.png')}}"
                       alt="User profile picture"></td>
                      <td>
                    <a title="Edit" href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('users.delete',$user->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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