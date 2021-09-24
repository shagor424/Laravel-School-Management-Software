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
           
           <div class="panel"style="background:white;padding-bottom:5px ;border-bottom: 3px solid #7e3796;">
              <div class="panel-header" style="background-color: #7e3796;color: white;padding: 10px">
                <h5>User List
                  <button type="button" class="btn btn-warning float-right btn" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus-circle"></i> Add User</button>
                </h5>
              </div> 
            <div class="panel-body" style="margin:15px;">
                <table id="example1" class="table  table-hover table-sm ">
                  <thead>
                   <tr style="background-color: #b382dd;">
                    <th>SL</th>
                    <th>ID</th>
                    <th>User Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Code</th>
                     <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $user)
                    <tr >
                      <td>{{$key+1}}</td>
                      <td>{{$user->id}}</td>
                      <td>{{$user->user_role->name}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->mobile}}</td>
                      <td>{{$user->code}}</td>
                      <td>
                     @if($user->status==1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                      <td>
                        @if($user->status==1)
                          <a id="inactive" href="{{route('users.inactive',$user->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                          @else
                          <a id="active" href="{{route('users.active',$user->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                          @endif
                         <button type="button" class="btn btn-dark  btn-xs" data-toggle="modal" data-target="#showUser-{{ $user->id }}"><i class="fa fa-eye"></i></button>

                        <button type="button" class="btn btn-primary  btn-xs" data-toggle="modal" data-target="#editUser-{{ $user->id }}"><i class="fa fa-edit"></i> </button>

                    <a title="Delete" id="delete" href="{{route('users.delete',$user->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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

 {{-- Add User --}}

  <div class="modal fade" id="addUser" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #7e3796 ;">
            <div class="modal-header " style="background-color: #7e3796;color: white;padding: 10px">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('users.store')}}" id="myform">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="role_id">User Role</label>
                    <select name="role_id" id="role_id" class="form-control select2bs4" >
                      <option value="">Select Role</option>
                      @foreach($roles as $role)
                      <option value="{{ $role->id }}">{{ $role->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                    <font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number">
                  </div>

              <div class="modal-footer col-md-12">
                 <button type="button" class="btn btn-danger pull-right"  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success pull-right">Add User</button>
            </div>

            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>
</div>
{{-- Add User --}}
@foreach($alldata as $user)
  <div class="modal fade" id="editUser-{{ $user->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #7e3796 ;">
            <div class="modal-header " style="background-color: #7e3796;color: white;padding: 10px">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('users.update',$user->id)}}" id="myform">
                @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="role_id">User Role</label>
                   <select name="role_id" id="role_id" class="form-control select2bs4" >
                      <option value="">Select Role</option>
                      @foreach($roles as $role)
                      <option value="{{ $role->id }}" {{($user->role_id==$role->id)? "selected":""}}>{{ $role->name }}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{$user->name}}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"value="{{$user->email}}">
                    <font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile"value="{{$user->mobile}}">
                  </div>

              <div class="modal-footer col-md-12">
                 <button type="button" class="btn btn-danger pull-right"  data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success pull-right">Update User</button>
            </div>

            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>
</div>
@endforeach




@foreach($alldata as  $user)
  <div class="modal fade" id="showUser-{{ $user->id }}" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-small">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #7e3796 ;">
            <div class="modal-header " style="background-color: #7e3796;color: white;padding: 10px">
              <h4 class="modal-title"> User Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
           
           <table class="table table-bordered table-hover table-sm" >
            <tr>
              <th width="30%">User ID</th>
              <th width="70%">{{ $user->id }}</th>
            </tr>
            <tr>
              <th width="30%"> Name</th>
              <th width="70%">{{ $user->name }}</th>
            </tr>
            <tr>
              <th width="30%">Email</th>
              <th width="70%">{{ $user->email }}</th>
            </tr>
            <tr>
              <th width="30%"> Mobile</th>
              <th width="70%">{{ $user->mobile }}</th>
            </tr>
           {{--  <tr>
              <th width="30%">Address</th>
              <th width="70%">{{ $user->address }}</th>
            </tr> --}}
             <tr>
              <th width="30%">User Photo</th>
               <td>
                        @if($user->role_id == 1)
                        <img style="width: 80px;height: 100px" class="profile-user-img img-fluid "
                       src="{{(!empty($user->image))?url('public/upload/adminimage/'.$user->image):url('public/upload/userimage.png')}}"
                       alt="User profile picture">
                       @elseif($user->role_id == 2)
                        <img style="width: 80px;height: 100px" class="profile-user-img img-fluid "
                       src="{{(!empty($user->image))?url('public/upload/teacheranimage/'.$user->image):url('public/upload/userimage.png')}}"
                       alt="User profile picture">
                        @elseif($user->role_id == 3)
                        <img style="width: 80px;height: 100px" class="profile-user-img img-fluid "
                       src="{{(!empty($user->image))?url('public/upload/parenttimage/'.$user->image):url('public/upload/userimage.png')}}"
                       alt="User profile picture">
                    
                       @elseif($user->role_id == 4)
                        <img style="width: 80px;height: 100px" class="profile-user-img img-fluid "
                       src="{{(!empty($user->image))?url('public/upload/studentimage/'.$user->image):url('public/upload/userimage.png')}}"
                       alt="User profile picture">
                       

                       @elseif($user->role_id == 5)
                        <img style="width: 80px;height: 100px" class="profile-user-img img-fluid "
                       src="{{(!empty($user->image))?url('public/upload/employeeimage/'.$user->image):url('upload/userimage.png')}}"
                       alt="User profile picture">

                       @endif
                     </td>
            </tr>
           </table>
                  

              <div class="modal-footer ">
                 <button type="button" class="btn btn-danger "  data-dismiss="modal">Close</button>
            </div>
           
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>

@endforeach









<script>
$(function () {
  
  $('#myform').validate({
    rules: {

      role_id: {
      required: true,
        
      },
      name: {
        required: true,
        
      },
      mobile: {
        required: true,
        
      },
      gender: {
        required: true,
        
      },
       
      address: {
      required: true,
        
      },


      email: {
        required: true,
        email: true
       
    
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      }
      
      
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
  @endsection