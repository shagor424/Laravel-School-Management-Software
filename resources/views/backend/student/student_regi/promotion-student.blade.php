 @extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            {{-- <h1 style="color: #800080"><b>

              @if(isset($editdata))
              Promotion  Student
              @else
              Add Student
              @endif
 

          </b></h1> --}}
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Student Registration</li>
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
          <div class="panel"style="background:#C2E7FC;padding-bottom:5px ;border-bottom: 3px solid #7e3796;">
              <div class="panel-header" style="background-color: #7e3796;color: white;padding: 10px">
                <h5 ><b>
                   @if(isset($editdata))
               Student Promotion
              @else
              Student Registration
              @endif
                  <a  href="{{route('students.regi.view')}}" class="btn btn-warning float-right"><i class="fa fa-list"> Student List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body"style="background-color:#E6E6E6">
                
              <form method="post" action="{{route('students.regi.promotion.store',$editdata->student_id)}}" id="myform"enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{@$editdata->id}}">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Student Name <font style="color: red">*</font></label>
                    <input  type="text" name="name" id="name" value="{{@$editdata['student']['name']}}" class="form-control" placeholder="Enter Student Name">
                    
                  </div>

                   <div class="form-group col-md-4">
                    <label>Father Name <font style="color: red">*</font></label>
                    <input  type="text" name="fname" id="fname"value="{{@$editdata['student']['fname']}}" class="form-control" placeholder="Enter Father Name">
                    
                  </div>

                  <div class="form-group col-md-4">
                    <label> Mother Name <font style="color: red">*</font></label>
                    <input  type="text" name="mname" id="mname"value="{{@$editdata['student']['mname']}}" class="form-control" placeholder="Enter Mother Name">
                    
                  </div>

                   <div class="form-group col-md-4">
                    <label>Mobile <font style="color: red">*</font></label>
                    <input  type="text" name="mobile" id="mobile" value="{{@$editdata['student']['mobile']}}" class="form-control" placeholder="Enter Student Mobile">
                    <font style="color:red">{{($errors)->has('mobile')?($errors->first('mobile')):''}}</font>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Date Of Birth  <font style="color: red">*</font></label>
                    <input class="datepicker" type="text" name="dob" id="dob"value="{{@$editdata['student']['dob']}}" class="form-control" placeholder="YYYY-MM-DD">
                    <font style="color:red">{{($errors)->has('dob')?($errors->first('dob')):''}}</font>
                  </div>


                   <div class="form-group col-md-4">
                    <label> Address <font style="color: red">*</font></label>
                    <input  type="text" name="address" id="address"value="{{@$editdata['student']['address']}}" class="form-control" placeholder="Enter Address">
                    <font style="color:red">{{($errors)->has('address')?($errors->first('address')):''}}</font>
                  </div>

                   <div class="form-group col-md-4">
                    <label for="gender">Gender <font style="color: red">*</font></label>
                    <select name="gender" id="gender" class="form-control select2bs4">
                      <option value="">Select Gender</option>
                      <option value="Male" {{(@$editdata['student']['gender']=='Male')?'selected':''}}>Male</option>
                      <option value="Female"{{(@$editdata['student']['gender']=="Female")?"selected":""}}>Female</option>
                      <option value="Others" {{(@$editdata['student']['gender']=="Others")?"selected":""}}>Others</option>
                    </select>
                  </div>

 					 <div class="form-group col-md-4">
                    <label for="gender">Religion <font style="color: red">*</font></label>
                    <select name="religion" id="religion" class="form-control select2bs4"value="{{@$editdata->religion}}">
                      <option value="">Select Religion</option>
                      <option value="Islam"{{(@$editdata['student']['religion']=="Islam")?"selected":""}}>Islam</option>
                      <option value="Hindu"{{(@$editdata['student']['religion']=="Hindu")?"selected":""}}>Hindu</option>
                      <option value="Buddhoo"{{(@$editdata['student']['religion']=="Buddhoo")?"selected":""}}>Buddhoo</option>
                      <option value="Cristian"{{(@$editdata['student']['religion']=="Cristian")?"selected":""}}>Cristian</option>
                      <option value="Others"{{(@$editdata['student']['religion']=="Others")?"selected":""}}>Others</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label> Discount <font style="color: red">*</font></label>
                    <input  type="text" name="discount" id="discount"value="{{@$editdata['disscount']['discount']}}" class="form-control" placeholder="Enter Discount">
                    <font style="color:red">{{($errors)->has('discount')?($errors->first('discount')):''}}</font>
                  </div>

                   <div class="form-group col-md-4">
                    <label for="class_id"> Student Class Name <font style="color: red">*</font> </label>
                    <select name="class_id" id="class_id" class="form-control select2bs4">
                      <option value="">Select Class Name </option>
                      @foreach($classes as $class)
                      <option value="{{$class->id}}" {{(@$editdata->class_id==$class->id)?"selected":""}}>{{$class->name}}</option>
                      @endforeach
                    </select>
                  </div>


					<div class="form-group col-md-4">
                    <label for="group_id"> Student Group Name <font style="color: red">*</font></label>
                    <select name="group_id" id="group_id" class="form-control select2bs4">
                      <option value="">Select Group Name </option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}" {{(@$editdata->group_id==$group->id)?"selected":""}}>{{$group->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="section_id"> Student Setion Name <font style="color: red">*</font></label>
                    <select name="section_id" id="section_id" class="form-control select2bs4">
                      <option value="">Select Section Name </option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}" {{(@$editdata->section_id==$section->id)?"selected":""}}>{{$section->name}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                    <label  for="shift_id"> Student Shift <font style="color: red">*</font></label>
                    <select name="shift_id" id="shift_id" class="form-control select2bs4">
                      <option value="">Select Shift Name</option>
                      @foreach($shifts as $shift)
                      <option value="{{$shift->id}}" {{(@$editdata->shift_id==$shift->id)?"selected":""}}>{{$shift->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="year_id"> Student Session Year <font style="color: red">*</font></label>
                    <select name="year_id" id="year_id" class="form-control select2bs4">
                      <option value="">Select Session Year</option>
                      @foreach($years as $year)
                      <option value="{{$year->id}}" {{(@$editdata->year_id==$year->id)?"selected":""}}>{{$year->name}}</option>
                      @endforeach
                    </select>
                  </div>



                   <div class="form-group col-md-4">

                    <img id="showimage" src="{{(!empty($editdata['student']['image']))?url('public/upload/stimage/'.$editdata['student']['image']):url('public/upload/usernoimage.png')}}" style="width: 30px;height: 35px;border:1px solid #000;">
                        <label for="image"> Student Photo <font style="color: red">*</font></label>
                    <input  type="file" name="image" id="image"value="{{@$editdata->image}}" class="form-control">
                    <font style="color:red">{{($errors)->has('image')?($errors->first('image')):''}}</font>
                 </div> 

                 
              
                    
   
    

                  </div>
                
                <button type="submit"class="btn btn-block bg-gradient-danger float-right">{{(@$editdata)?'Student Promotion':' Student Registration'}}</button>

              </form>
</div> 
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
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

     
      name: {
        required: true,
        },
     
    fname: {
        required: true,
        },    

 mname: {
        required: true,
        },    

 mobile: {
        required: true,
        },    

 dob: {
        required: true,
        },    
 address: {
        required: true,
        }, 

 gender: {
        required: true,
        },    
 religion: {
        required: true,
        },    
 class_id: {
        required: true,
        },    
 year_id: {
        required: true,
        },    
 group_id: {
        required: true,
        },    
 shift_id: {
        required: true,
       },
 discount: {
        required: true,
        },

  section_id: {
        required: true,
        


      }
    },
    messages: {
     

      name: {
        required: "Please Enter Class Name",
        
      },

       fname: {
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
<script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection