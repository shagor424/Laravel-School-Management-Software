@extends('backend.layouts.master')  
@section('content')

 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid"> 
        <div class="row mb-2">
          <div class="col-sm-6 of">
            <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Edit Assign Subject
              @else
              Add Assign Subject
              @endif


          </b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
           
           <div class="card">
              <div class="card-header">
                <h5 style="color:   #a04000"><b>
                   @if(isset($editdata))
              Edit Assign Subject
              @else
              Add Assign Subject
              @endif
                  <a  href="{{route('asssubs.student.asssub.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> Assign Subject List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
             <form method="post" action="{{route('asssubs.student.asssub.update',$editdata['0']->class_id)}}" id="myform">

              @csrf

              <div class="add_item">
               
                <div class="form-row" style="background-color:  #f4d03f ">

                  <div class="form-group col-md-3">
                    <label style="color: #0e6251">Class Title Name</label>
                   <select name="title_id" class="form-control"id="title_id">
                     <option value="">Select Class Title Name</option>
                    @foreach($class_titles as $title)
                     <option value="{{$title->id}}" {{($editdata[0]->title_id==$title->id)?"selected":""}}>{{$title->name}}</option>
                     @endforeach
                   </select>
                  </div>

                  <div class="form-group col-md-3">
                    <label style="color: #0e6251">Class Name</label>
                   <select name="class_id" class="form-control"id="class_id">
                     <option value="">Select Class Name</option>
                    @foreach($student_classes as $cls)
                     <option value="{{$cls->id}}" {{($editdata[0]->class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>
                     @endforeach
                   </select>
                  </div>
                

                  <div class="form-group col-md-3">
                    <label style="color: #0e6251">Group Name</label>
                   <select name="group_id" class="form-control"id="group_id">
                     <option value="">Select Group Name</option>
                    @foreach($student_groups as $group)
                     <option value="{{$group->id}}" {{($editdata[0]->class_id==$group->id)?"selected":""}}>{{$group->name}}</option>
                     @endforeach
                   </select>
                  </div>
                </div>

</div>

                 @foreach($editdata as $edit)
                  <div class="delete_whole_extra_item_add"id="delete_whole_extra_item_add" >
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label style="color: #0e6251">Subject Name</label>
                   <select name="subject_id[]" class="form-control" id="subject_id">
                     <option value="">Select Subject Name</option>
                      @foreach($subjects as $subject)
                     <option value="{{$subject->id}}" {{($edit->subject_id==$subject->id)?"selected":""}}>{{$subject->name}}</option>
                     @endforeach
                   </select>
                    
                  </div>
                  
                
                  <div class="form-group col-md-2">
                    <label style="color: #0e6251">Full Mark</label>
                   <input  type="text" name="full_mark[]" id="full_mark"value="{{$edit->full_mark}}" class="form-control" placeholder="Enter Full Mark" style="color: #2F4F4F">
                    </div>

                    <div class="form-group col-md-2">
                    <label style="color: #0e6251">Pass Mark</label>
                   <input  type="text" name="pass_mark[]" id="pass_mark"value="{{$edit->pass_mark}}" class="form-control" placeholder="Enter Pass Mark" style="color: #2F4F4F">
                    </div>
                    <div class="form-group col-md-2">
                    <label style="color: #0e6251">Subjective Mark</label>
                   <input  type="text" name="subjective_mark[]" id="subjective_mark"value="{{$edit->subjective_mark}}" class="form-control" placeholder=" Subjective Mark" style="color: #2F4F4F">
                    </div>
                  
                  <div class="form-group col-md-1" style="padding-top: 30px;">
                    <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                    <span class="btn btn-danger removeentmore"><i class="fa fa-minus-circle"></i></span>
                    </div>
                  </div>
                  
               </div>
                @endforeach
</div>
<div class="form-group col-md-5 offset-md-7">
              
    <button type="submit"class="btn btn-danger">{{(@$editdata)?'Update Assign Subject':'Add Assign Subject'}}</button>
</div>
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

      "group_id": {
        required: true,
         },

       "title_id": {
        required: true,
         },
     
     "class_id": {
        required: true,
         },
     
     "subject_id[]": {
        required: true,
         },

     "full_mark[]": {
    required: true,
       
      },
       "pass_mark[]": {
    required: true,
},
     "subjective_mark[]": {
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







  @extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 of">
            <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Edit Fee Catagory Amount
              @else
              Add Fee Catagory Amount
              @endif


          </b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
           
           <div class="card">
              <div class="card-header">
                <h5 style="color:   #a04000"><b>
                   @if(isset($editdata))
              Edit Fee Catagory Amount
              @else
              Add Fee Catagory Amount
              @endif
                  <a  href="{{route('feecatams.student.feecatam.view')}}" class="btn btn-success btn-sm float-right"><i class="fa fa-list"> Fee Catagory Amount List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
   <form method="post" action="{{route('feecatams.student.feecatam.update',$editdata[0]->fee_catagory_id)}}" id="myform">

              @csrf
              <div class="add_item">
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Fee Catagory</label>
                   <select name="fee_catagory_id" class="form-control"id="fee_catagory_id">
                     <option value="">Select Fee Catagory</option>
                    @foreach($fee_catagories as $catagory)
                     <option value="{{$catagory->id}}" {{($editdata[0]->fee_catagory_id==$catagory->id)?"selected":""}}>{{$catagory->name}}</option>
                     @endforeach
                   </select>
                   
                  </div>
                </div>
                <div class="delete_whole_extra_item_add"id="delete_whole_extra_item_add" >
                @foreach($editdata as $edit)
                <div class="form-row">
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Student Class</label>
                   <select name="class_id[]" class="form-control" id="class_id">
                     <option value="">Select Class</option>
                      @foreach($student_classes as $cls)
                     <option value="{{$cls->id}}" {{($edit->class_id==$cls->id)?"selected":""}}>{{$cls->name}}</option>
                     @endforeach
                   </select>
                    
                  </div>
                  

                
                  <div class="form-group col-md-5">
                    <label style="color: #0e6251">Amount</label>
                   <input  type="text" name="amount[]" id="amount" value="{{$edit->amount}}" class="form-control" placeholder="Enter Amount" style="color: #2F4F4F">
                    </div>
                  
                  <div class="form-group col-md-1" style="padding-top: 30px;">
                    <div class="form-row">
      
                     </div>

                    
                  </div>
                  
               </div>
             </div>
         @endforeach
         <div class="form-group col-md-4 offset-md-7">
        <strong> <button type="submit"class="btn btn-danger">{{(@$editdata)?'Update Fee Catagory Amount':'Add Fee Catagory Amount'}}</button></strong>
       </div>
</div>
              
    

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

    
     

      "amount[]": {
        required: "Please Enter Class Name",
        
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