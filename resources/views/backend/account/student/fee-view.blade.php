@extends('backend.layouts.master')
@section('content')
  

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark">Manage Students Fee</h1> --}}
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Add Students Fee</li>
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
                <h5 ><b>Students Fee List </b>
                  <a  href="{{route('accounts.fee.add')}}" class="btn btn-warning  float-right"><i class="fa fa-plus-circle"> Add/Edit Students Fee</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class=" table-sm table table-bordered table-hover">
                  <thead>
                  <tr style="background-color: #b382dd;">
                    <th>SL</th>
                    <th>ID No</th>
                    <th> Name</th>
                    <th> Class</th>
                    <th> Year</th>
                    <th> Roll</th>
                    <th> Fee Type</th>
                    <th> Date</th>
                    <th> Amount</th>
                    <th> Action</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $value)
                    <tr class="{{$value->id}}">
                      <td style="text-align: center">{{$key+1}}</td>
                      <td style="text-align: center">{{$value['student']['id_no']}}</td>
                      <td style="text-align: center">{{$value['student']['name']}}</td>
                      <td style="text-align: center">{{$value['class']['name']}}</td>
                      <td style="text-align: center">{{$value['year']['name']}}</td>
                      <td style="text-align: center">{{$value['studentroll']['class_roll']}}</td>
                      <td style="text-align: center">{{$value['fee_catagory_id']['name']}}</td>
                      <td style="text-align: center">{{date('M Y',strtotime($value->date))}}</td>
                      <td style="text-align: center">{{$value->amount}}</td>
                      
                    <td>
                      
                    <a title="Edit" href="{{route('accounts.fee.edit',$value->id)}}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('accounts.fee.delete',$value->id)}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    
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