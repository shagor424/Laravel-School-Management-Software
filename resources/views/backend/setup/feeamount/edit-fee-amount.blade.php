@extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6 of">
            {{-- <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Edit Fee Catagory Amount
              @else
              Add Fee Catagory Amount
              @endif


          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Fee Amount</li>
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
                <h5 ><b>
                   @if(isset($editdata))
              Edit Fee Catagory Amount
              @else
              Add Fee Catagory Amount
              @endif
                  <a  href="{{route('feecatams.student.feecatam.view')}}" class="btn btn-warning  float-right"><i class="fa fa-users"> Fee Catagory Amount List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
             <form method="post" action="{{route('feecatams.student.feecatam.update',$editdata['0']->fee_catagory_id)}}" id="myform">

              @csrf
              <div class="add_item">
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Fee Catagory</label>
                   <select name="fee_catagory_id" class="form-control select2bs4"id="fee_catagory_id">
                     <option value="">Select Fee Catagory</option>
                    @foreach($fee_catagories as $catagory)
                     <option value="{{$catagory->id}}"{{($editdata['0']->fee_catagory_id==$catagory->id)?"selected":""}}>{{$catagory->cat_name}}</option>
                     @endforeach
                   </select>
                   
                  </div>
                </div>

              @foreach($editdata as $edit)
              <div class="delete_whole_extra_item_add"id="delete_whole_extra_item_add" >
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Student Class</label>
                   <select name="class_id[]" class="form-control select2bs4" id="class_id">
                     <option value="">Select Class</option>
                      @foreach($student_classes as $cls)
                     <option value="{{$cls->id}}"{{($edit->class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>
                     @endforeach
                   </select>
                    
                  </div>
                  

                
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Amount</label>
                   <input  type="text" name="amount[]" id="amount"value="{{@$edit->amount}}" class="form-control" placeholder="Enter Amount" style="color: #2F4F4F">
                    </div>
                  
                  <div class="form-group col-md-1" style="padding-top: 30px;">


         <div class="form-row">
      <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
       <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span> 
  </div>
                    

                    
                  </div>
               </div>
             </div>
               @endforeach
        </div>
              
    <button type="submit"class="btn btn-primary">{{(@$editdata)?'Update Fee Catagory Amount':'Add Fee Catagory Amount'}}</button>

                </form>

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

  <div style="visibility: hidden;">
   <div class="whole_extra_item_add"id="whole_extra_item_add">
     <div class="delete_whole_extra_item_add"id="delete_whole_extra_item_add" >
       <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #784212">Student Class</label>
                   <select name="class_id[]" class="form-control " id="class_id">
                     <option value="">Select Class</option>
                      @foreach($student_classes as $cls)
                     <option value="{{$cls->id}}"{{$cls->name}}></option>
                     @endforeach
                   </select>
                  </div>
                  <div class="form-group col-md-5">
                    <label style="color: #784212">Amount</label>
                   <input  type="text" name="amount[]" id="amount" class="form-control" placeholder="Enter Amount" style="color: #2F4F4F">
                  </div>

            <div class="form-group col-md-1" style="padding-top: 2px;">

         <div class="form-row">
      <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
       <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i></span> 
  </div>
            
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