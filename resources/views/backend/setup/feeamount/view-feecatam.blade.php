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
                <h5><b> Fee Category Amount List</b>
                 <button type="button" class="btn btn-warning float-right btn" data-toggle="modal" data-target="#addFeeCategoryAmount"><i class="fa fa-plus-circle"></i> Add Fee Category Amount</button>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-sm table-hover">
                  <thead>
                 <tr style="background-color: #b382dd;">
                    <th>SL</th>
                   
                    <th>Fee Catagory </th>
                   
                    <th class="text-center">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $feecatam)
                    <tr class="{{$feecatam->id}}" >
                      <td>{{$key+1}}</td>
                      
                      <td>{{$feecatam['fee_catagory']['cat_name']}}</td>

                     <td>

                      <a href="{{ route('feecatams.student.feecatam.details',$feecatam->fee_catagory_id) }}" class="btn btn-success  btn-xs"  ><i class="fa fa-eye"></i> </a>

                      <a href="{{ route('feecatams.student.feecatam.edit',$feecatam->fee_catagory_id) }}" class="btn btn-primary  btn-xs"  ><i class="fa fa-edit"></i> </a>

                       
                  
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


   {{-- Add Class --}}

  <div class="modal fade" id="addFeeCategoryAmount" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"style="background-color:#d9dad6;border-bottom: 5px solid #7e3796 ;">
            <div class="modal-header " style="background-color: #7e3796;color: white;padding: 10px">
              <h4 class="modal-title"> 
              Add Fee Category Amount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
            <form method="post" action="{{route('feecatams.student.feecatam.store')}}" id="myform">

              @csrf
              <div class="add_item">
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Fee Catagory</label>
                   <select name="fee_catagory_id" class="form-control select2bs4"id="fee_catagory_id">
                     <option value="">Select Fee Catagory</option>
                    @foreach($fee_catagories as $catagory)
                     <option value="{{$catagory->id}}">{{$catagory->cat_name}}</option>
                     @endforeach
                   </select>
                   
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Student Class</label>
                   <select name="class_id[]" class="form-control select2bs4" id="class_id">
                     <option value="">Select Class</option>
                      @foreach($student_classes as $cls)
                     <option value="{{$cls->id}}">{{$cls->name}}</option>
                     @endforeach
                   </select>
                    
                  </div>
                  

                
                  <div class="form-group col-md-4">
                    <label style="color: #0e6251">Amount</label>
                   <input  type="text" name="amount[]" id="amount" class="form-control" placeholder="Enter Amount" style="color: #2F4F4F">
                    </div>
                  
                  <div class="form-group col-md-3" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>

                    
                  </div>
                  
               </div>
</div>
              <div class="modal-footer col-md-12">
                 <button type="button" class="btn btn-danger pull-right"  data-dismiss="modal">Close</button>
               <button type="submit"class="btn btn-primary">Add Fee Category Amount</button>
            </div>

            </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- end Add Category -->
</div>













 <div style="visibility: hidden;">
   <div class="whole_extra_item_add"id="whole_extra_item_add">
     <div class="delete_whole_extra_item_add"id="delete_whole_extra_item_add" >
       <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #784212">Student Class</label>
                   <select name="class_id[]" class="form-control" id="class_id">
                     <option value="">Select Class</option>
                      @foreach($student_classes as $cls)
                     <option value="{{$cls->id}}">{{$cls->name}}</option>
                     @endforeach
                   </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label style="color: #784212">Amount</label>
                   <input  type="text" name="amount[]" id="amount"value="{{@$editdata->amount}}" class="form-control" placeholder="Enter Amount" style="color: #2F4F4F">
                  </div>

            <div class="form-group col-md-3" style="padding-top: 30px;">

         
      <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
       <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span> 
  
            
           </div> 
         </div>
       </div>
    </div>
  </div>


  <script type="text/javascript">
  $(document).ready(function (){
    var counter = 0;
    $(document).on("click",".addeventmore",function(){
      var whole_extra_item_add = $("#whole_extra_item_add").html();
      $(this).closest(".add_item").append(whole_extra_item_add);
      counter++;

    });
    $(document).on("click", ".removeeventmore",function(event){
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter -= 1
    });

  });


</script>




<script>
$(document).ready(function () {
  
  $('#myform').validate({
    rules: {
     "fee_catagory_id": {
        required: true,
         },
     
     "class_id[]": {
        required: true,
         },

     "amount[]": {
    required: true,
       
      }
    },
    messages: {
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